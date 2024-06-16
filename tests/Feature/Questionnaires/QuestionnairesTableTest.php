<?php

use App\Livewire\Questionnaires\QuestionnairesTable;
use App\Models\Questionnaire;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use function PHPUnit\Framework\assertEquals;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->questionnaires = Questionnaire::factory(3)
        ->recycle($this->user)
        ->create();

    $this->livewire = Livewire::actingAs($this->user)
        ->withoutLazyLoading()
        ->test(QuestionnairesTable::class);
});

it('renders the questionnaires', function () {
    $this->livewire
        ->assertOk()
        ->assertViewHas('questionnaires',
            fn(LengthAwarePaginator $questionnaires) => $questionnaires->count() === 3)
        ->assertSee($this->questionnaires->pluck('title')->toArray());
});

it('filters questionnaires by title', function () {
    $questionnaire = Questionnaire::factory()->recycle($this->user)->create([
        'title' => 'Alakazam',
    ]);

    $this->livewire
        ->set('search', $questionnaire->title)
        ->assertViewHas('questionnaires',
            fn(LengthAwarePaginator $questionnaires) => $questionnaires->count() === 1)
        ->assertSee($questionnaire->title)
        ->assertDontSee($this->questionnaires->skip(1)->first()->title);
});

it('filters questionnaires by tag', function () {
    $tag = Tag::factory()->create();
    $questionnaire = Questionnaire::factory()->recycle($this->user)->create();
    $questionnaire->tags()->attach($tag);

    $this->livewire
        ->set('tagsFilter', [$tag->name])
        ->assertViewHas('questionnaires',
            fn(LengthAwarePaginator $questionnaires) => $questionnaires->count() === 1)
        ->assertSee($questionnaire->title)
        ->assertSee($tag->name)
        ->assertDontSee($this->questionnaires->skip(1)->first()->title);
});

it('show other users questionnaires if visible', function () {
    $otherUser = User::factory()->create();
    $questionnaire = Questionnaire::factory()->recycle($otherUser)->visible()->create();

    $this->livewire
        ->refresh()
        ->assertViewHas('questionnaires', fn(LengthAwarePaginator $questionnaires) => $questionnaires->count() === 4)
        ->assertSee($questionnaire->title);
});

it('doesnt show other users questionnaires if not visible', function () {
    $otherUser = User::factory()->create();
    $questionnaire = Questionnaire::factory()->recycle($otherUser)->notVisible()->create([
        'title' => 'Alakazam',
    ]);

    assertEquals($questionnaire->title, 'Alakazam');

    $this->livewire
        ->refresh()
        ->assertViewHas('questionnaires', fn(LengthAwarePaginator $questionnaires) => $questionnaires->count() === 3)
        ->assertDontSee($questionnaire->title);
});
