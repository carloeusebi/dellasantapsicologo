<?php

namespace App\Livewire\Patients;

use App\Livewire\TableComponent;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Url;

class PatientTable extends TableComponent
{
    #[Url(as: 'ordina')]
    public array $sortBy = [
        'column' => 'therapy_start_date',
        'direction' => 'desc',
    ];

    #[Url(as: 'stato')]
    public string $state = 'attivi';

    #[Url(as: 'cerca')]
    public string $search = '';

    #[Url]
    public int|null $user_id = null;

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $doctors = User::doctors()->get()->toArray();

        $patients = $this->goToFirstPageIfResultIsEmpty(function () {
            return Patient::userScope()
                ->when(Auth::user()->isAdmin(), function (Builder $query) {
                    $query->with('user');
                    $query->when($this->user_id, function (Builder $query, int $id) {
                        $query->whereRelation('user', 'id', $id);
                    });
                })
                ->withCount([
                    'surveys as pending_surveys' => function (Builder $query) {
                        $query->where('completed', false)
                            ->orWhereNull('completed');
                    }
                ])
                ->when($this->search, function (Builder $query, string $search) {
                    collect(explode(' ', $search))->each(function (string $term) use ($query) {
                        $query->where(function (Builder $query) use ($term) {
                            $query->where('first_name', 'LIKE', "%$term%")
                                ->orwhere('last_name', 'LIKE', "%$term%");
                        });
                    });
                })
                ->when($this->state === 'tutti', function (Builder $query) {
                    $query->withArchived();
                })
                ->when($this->state === 'archiviati', function (Builder $query) {
                    $query->onlyArchived();
                })
                ->when($this->sortBy['column'] === 'birth_date', function (Builder $query) {
                    $query->orderByRaw('birth_date is NULL');
                })
                ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
                ->paginate(10, pageName: self::$pageName)
                ->withQueryString();
        });


        return view('livewire.patients.table', compact('patients', 'doctors'));
    }
}
