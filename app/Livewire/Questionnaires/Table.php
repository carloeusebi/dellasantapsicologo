<?php

namespace App\Livewire\Questionnaires;

use App\Livewire\TableComponent;
use App\Models\Questionnaire;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\Url;

class Table extends TableComponent
{
    #[Url(as: 'ordina')]
    public string $column = 'title';

    #[Url(as: 'ordina')]
    public string $direction = 'asc';

    #[Url(as: 'cerca')]
    public string $search = '';

    /** @var array<string> $tags @ */
    #[Url]
    public array $tags = [];

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        while (true) {
            $questionnaires = Questionnaire::query()
                ->paginate(10, self::$pageName);

            if ($questionnaires->count() > 0 || $this->getPage(self::$pageName) === 1) {
                break;
            }
            $this->resetPage(self::$pageName);
        }
        return view('livewire.questionnaires.table');
    }
}
