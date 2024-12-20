<?php

namespace App\Livewire\Surveys\Tabs;

use App\Models\Answer;
use App\Models\Survey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Mary\Traits\Toast;

class CommentsTab extends Component
{
    use Toast;

    #[Url]
    public ?string $comment_id = null;

    public Survey $survey;

    public function removeComment(int $id): void
    {
        $answer = Answer::find($id);

        $this->authorize('update', $answer);

        $answer->update(['comment' => null]);

        $this->dispatch('removedComment');

        $this->success('Successo', 'Commento eliminato con successo.');
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application {
        return view('livewire.surveys.tabs.comments-tab');
    }

    #[Computed]
    public function comments(): Collection
    {
        return $this->survey->comments()
            ->with('question.questionnaire', 'choice')
            ->get();
    }
}
