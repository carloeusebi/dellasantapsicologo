<?php

use App\Livewire\Tags\TagsIndex;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertNotEquals;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->tags = Tag::factory(10)->create();

    $this->livewire = Livewire::actingAs($this->user)
        ->test(TagsIndex::class);
});

function setUserAsSuperUser(User $user)
{
    $user->role()->associate(Role::firstWhere('name', Role::SUPERUSER));
    $user->save();
}

it('doesnt render create tag it user isnt at least superuser', function () {
    assertFalse($this->user->isSuperUserOrAdmin());

    $this->livewire->assertDontSee('Crea nuovo Tag');
});

it('render create tag it user is at least superuser', function () {
    setUserAsSuperUser($this->user);

    $this->livewire
        ->refresh()
        ->assertSee('Crea nuovo Tag');
});

it('forbid to create tag if user isnt at least superuser', function () {
    assertFalse($this->user->isSuperUserOrAdmin());

    $this->livewire
        ->call('create')
        ->assertForbidden();

    Livewire::actingAs($this->user)
        ->test(TagsIndex::class)
        ->set('form.name', 'new tag')
        ->set('form.color', '#000000')
        ->call('save')
        ->assertForbidden();

    assertDatabaseMissing('tags', ['name' => 'new tag']);
});

it('allows to create tag if user is at least superuser', function () {
    setUserAsSuperUser($this->user);

    $this->livewire
        ->call('create')
        ->assertSet('tagModal', true);

    $this->livewire
        ->set('form.name', 'new tag')
        ->set('form.color', '#000000')
        ->call('save');

    assertDatabaseHas('tags', ['name' => 'new tag']);
});

it('doesnt allow a user to update a tag if it isnt at least superuser', function () {
    assertFalse($this->user->isSuperUserOrAdmin());
    $tag = $this->tags->first();

    $this->livewire
        ->call('edit', $tag->id)
        ->assertForbidden();

    Livewire::actingAs($this->user)
        ->test(TagsIndex::class)
        ->set('form.tag', $tag)
        ->set('form.name', 'new tag')
        ->set('form.color', '#000000')
        ->call('save')
        ->assertForbidden();

    assertNotEquals('new tag', $tag->refresh()->name);
});

it('allows a user to update a tag if it is at least superuser', function () {
    setUserAsSuperUser($this->user);
    $tag = $this->tags->first();

    $this->livewire
        ->call('edit', $tag->id)
        ->assertSet('tagModal', true);

    $this->livewire
        ->set('form.tag', $tag)
        ->set('form.name', 'new tag')
        ->set('form.color', '#000000')
        ->call('save');

    assertDatabaseHas('tags', ['name' => 'new tag']);
    assertEquals('new tag', $tag->refresh()->name);
});
