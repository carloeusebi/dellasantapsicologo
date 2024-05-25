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

class SurveysTable extends TableComponent
{
    use WithPagination;

    public ?Patient $patient = null;

    #[Url(as: 'ordina')]
    public array $sortBy = ['column' => 'created_at', 'direction' => 'desc'];

    #[Url(as: 'stato')]
    public string $state = 'tutti';

    #[Url(as: 'cerca')]
    public string $search = '';

    #[Url(as: 'stato_paziente')]
    public string $patientState = '';

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $surveys = $this->goToFirstPageIfResultIsEmpty(function () {
            return Survey::userScope()
                ->when($this->patient, function (Builder $query, Patient $patient) {
                    $query->whereRelation('patient', 'id', $patient->id);
                })
                ->with('patient')
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
                ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
                ->paginate(
                    $this->patient ? 5 : 10,
                    pageName: self::$pageName
                )->withQueryString();
        });

        return view('livewire.surveys.table', compact('surveys'));
    }
}
