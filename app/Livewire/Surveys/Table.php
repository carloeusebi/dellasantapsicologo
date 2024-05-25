<?php

namespace App\Livewire\Surveys;

use App\Livewire\TableComponent;
use App\Models\Patient;
use App\Models\Survey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Table extends TableComponent
{
    use WithPagination;

    protected static $pageName = 'pagina';

    public ?Patient $patient = null;

    #[Url(as: 'ordina')]
    public string $column = 'created_at';

    #[Url(as: 'direzione')]
    public string $direction = 'desc';

    #[Url(as: 'stato')]
    public string $state = 'tutti';

    #[Url(as: 'cerca')]
    public string $search = '';

    #[Url(as: 'stato_paziente')]
    public string $patientState = '';

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        while (true) {
            $surveys = Survey::userScope()
                ->when($this->patient, function (Builder $query, Patient $patient) {
                    $query->whereRelation('patient', 'id', $patient->id);
                })
                ->with('patient')
                ->when($this->search, function (Builder $query, string $search) {
                    collect(explode(' ', $search))->each(function (string $term) use ($query) {
                        $query->where(function (Builder $query) use ($term) {
                            $query->where('title', 'like', "%$term%")
                                ->orWhereRelation('patient', 'first_name', 'LIKE', "%$term%")
                                ->orWhereRelation('patient', 'last_name', 'LIKE', "%$term%");
                        });
                    });
                })
                ->when($this->state === 'completati', function (Builder $query) {
                    $query->where('completed', true);
                })
                ->when($this->state === 'non_completati', function (Builder $query) {
                    $query->where('completed', false)
                        ->orwherenull('completed');
                })
                ->when($this->patientState === 'archiviati', function (Builder $query) {
                    $query->whereRelation('patient', 'archived_at', '<>');
                })
                ->when($this->patientState === 'attuali', function (Builder $query) {
                    $query->whereRelation('patient', 'archived_at');
                })
                ->orderBy($this->column, $this->direction)
                ->paginate(
                    $this->patient ? 5 : 10,
                    pageName: self::$pageName
                );

            if ($surveys->count() > 0 || $this->getPage(self::$pageName) === 1) {
                break;
            }
            $this->resetPage(self::$pageName);
        }

        return view('livewire.surveys.table', compact('surveys'));
    }
}
