<?php

use App\Livewire\Tags\TagsTable;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

beforeEach(function () {
    $this->tags = Tag::factory()->count(10)->create();
    $this->user = User::factory()->create();

    $this->livewire = Livewire::actingAs($this->user)
        ->withoutLazyLoading()
        ->test(TagsTable::class);
});

it('renders tags', function () {
    $this->livewire
        ->assertOk()
        ->assertViewHas('tags', fn(LengthAwarePaginator $tags) => $tags->count() === 10)
        ->assertSee($this->tags->pluck('name')->first());
});

it('filters tags by search term', function () {
    $tag = Tag::factory()->create(['name' => 'Alakazam']);

    $this->livewire
        ->set('search', $tag->name)
        ->assertViewHas('tags', fn(LengthAwarePaginator $tags) => $tags->count() === 1)
        ->assertSee($tag->name);
});

it('shows crud buttons if user is at least superuser', function () {
    $this->user->role()->associate(Role::whereName(Role::$SUPERUSER)->first());
    assertTrue($this->user->isSuperUserOrAdmin());

    $this->livewire
        ->refresh()
        ->assertSee('data-update')
        ->assertSee('data-delete');
});

it('doesnt show crud buttons if user isnt at least superuser', function () {
    assertFalse($this->user->isSuperUserOrAdmin());

    $this->livewire
        ->assertDontSee('data-update')
        ->assertDontSee('data-delete');
});

it('doesnt allow to delete tags if user isnt at least superuser', function () {
    $this->livewire
        ->call('delete', $this->tags->first()->id)
        ->assertForbidden();
});

it('allows to delete tags if user is at least superuser', function () {
    $this->user->role()->associate(Role::whereName(Role::$SUPERUSER)->first());
    assertTrue($this->user->isSuperUserOrAdmin());
    $tagToDelete = $this->tags->first();

    $this->livewire
        ->call('delete', $tagToDelete->id)
        ->assertViewHas('tags', fn(LengthAwarePaginator $tags) => $tags->count() === 9)
        ->assertDontSee($tagToDelete->name);
});
