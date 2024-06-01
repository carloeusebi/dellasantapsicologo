<?php

namespace App\Livewire\Patients;

use App\Livewire\TableComponent;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Session;
use Livewire\Attributes\Url;

#[Lazy]
class PatientTable extends TableComponent
{
    #[Url(as: 'ordina', except: ['column' => 'therapy_start_date', 'direction' => 'desc']), Session]
    public array $sortBy = [
        'column' => 'therapy_start_date',
        'direction' => 'desc',
    ];

    #[Url(as: 'stato', except: 'attivi'), Session]
    public string $state = 'attivi';

    #[Url(as: 'cerca', except: ''), Session]
    public string $search = '';

    #[Url, Session]
    public int|null $user_id = null;

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $patients = $this->goToFirstPageIfResultIsEmpty(function () {
            return Patient::select([
                'id', 'first_name', 'last_name', 'birth_date', 'email', 'therapy_start_date', 'user_id', 'archived_at'
            ])
                ->userScope()
                ->when(Auth::user()->isAdmin(), function (Builder $query) {
                    $query->with(['user' => fn(BelongsTo $query) => $query->select('id', 'name')]);
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
                ->filterByName($this->search)
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


        return view('livewire.patients.table', compact('patients'));
    }

    #[Computed(cache: true)]
    public function doctors(): array
    {
        return User::doctors()->get()->toArray();
    }
}
