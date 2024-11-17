<?php

namespace App\Livewire\Patients\Components;

use App\Livewire\Components\TableComponent;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Session;
use Livewire\Attributes\Url;

#[Lazy]
/**
 * @property Collection<User> $doctors
 */
class PatientTable extends TableComponent
{
    const string ARCHIVED_STATE = 'archiviati';

    const string ALL_STATE = 'tutti';

    const string ACTIVE_STATE = 'attivi';

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
    public ?int $user_id = null;

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application {
        $patients = $this->goToFirstPageIfResultIsEmpty(function () {
            return Patient::select([
                'id', 'first_name', 'last_name', 'birth_date', 'email', 'therapy_start_date', 'user_id', 'archived_at',
            ])
                ->userScope()
                ->when(Auth::user()->isAdmin(), function (Builder $query) {
                    $query->with('user:id,name')
                        ->when($this->user_id, function (Builder $query, int $id) {
                            $query->whereRelation('user', 'id', $id);
                        });
                })
                ->withCount([
                    'surveys as pending_surveys' => function (Builder $query) {
                        $query->where('completed', false)
                            ->orWhereNull('completed');
                    },
                ])
                ->filterByName($this->search)
                ->when($this->state === self::ALL_STATE, function (Builder $query) {
                    // @phpstan-ignore-next-line
                    $query->withArchived();
                })
                ->when($this->state === self::ARCHIVED_STATE, function (Builder $query) {
                    // @phpstan-ignore-next-line
                    $query->onlyArchived();
                })
                ->when($this->sortBy['column'] === 'birth_date', function (Builder $query) {
                    $query->orderByRaw('birth_date is NULL');
                })
                ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
                ->paginate(10, pageName: self::$pageName)
                ->withQueryString();
        });

        return view('livewire.patients.components.patient-table', compact('patients'));
    }

    #[Computed]
    public function doctors(): array
    {
        return User::all()->toArray();
    }
}
