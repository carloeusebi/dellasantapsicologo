<?php

namespace App\Livewire\Surveys\Components;

use App\Livewire\Components\TableComponent;
use App\Models\Survey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Session;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Lazy]
class SurveysTable extends TableComponent
{
    use WithPagination;

    const string COMPLETED = 'completati';
    const string NOT_COMPLETED = 'non_completati';
    const string ALL = 'tutti';
    const string ARCHIVED = 'archiviati';
    const string CURRENT = 'attuali';

    #[Url(as: 'ordina', except: ['column' => 'created_at', 'direction' => 'desc']), Session]
    public array $sortBy = ['column' => 'created_at', 'direction' => 'desc'];

    #[Url(as: 'stato', except: 'tutti'), Session]
    public string $state = 'tutti';

    #[Url(as: 'cerca', except: ''), Session]
    public string $search = '';

    #[Url(as: 'stato_paziente', except: ''), Session]
    public string $patientState = '';

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $surveys = $this->goToFirstPageIfResultIsEmpty(function () {
            return Survey::query()
                ->userScope()
                ->with('patient:id,first_name,last_name,archived_at')
                ->has('patient')
                ->when($this->search, function (Builder $query, string $search) {
                    collect(explode(' ', $search))->each(function (string $term) use ($query) {
                        $query->where(function (Builder $query) use ($term) {
                            $query->where('title', 'like', "%$term%")
                                ->orWhereRelation('patient', 'first_name', 'LIKE', "%$term%")
                                ->orWhereRelation('patient', 'last_name', 'LIKE', "%$term%");
                        });
                    });
                })
                ->when($this->state === self::COMPLETED, function (Builder $query) {
                    $query->where('completed', true);
                })
                ->when($this->state === self::NOT_COMPLETED, function (Builder $query) {
                    $query->where(function (Builder $query) {
                        $query->where('completed', false)
                            ->orwherenull('completed');
                    });
                })
                ->when($this->patientState === self::ARCHIVED, function (Builder $query) {
                    $query->whereRelation('patient', 'archived_at', '<>');
                })
                ->when($this->patientState === self::CURRENT, function (Builder $query) {
                    $query->whereRelation('patient', 'archived_at');
                })
                ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
                ->paginate(10, pageName: self::$pageName);
        });

        return view('livewire.surveys.components.surveys-table', compact('surveys'));
    }
}
