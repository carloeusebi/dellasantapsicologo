<?php

namespace App\Livewire\Patients;

use App\Models\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    #[Url(as: 'ordina')]
    public string $column = 'therapy_start_date';

    #[Url(as: 'direzione')]
    public string $direction = 'desc';

    #[Url(as: 'stato')]
    public string $state = 'tutti';

    #[Url(as: 'cerca')]
    public string $search = '';

    public function sort(string $column): void
    {
        if ($this->column === $column) {
            $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->direction = 'asc';
        }
        $this->column = $column;
    }

    public function clearSearch(): void
    {
        $this->search = '';
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $patients = Patient::query()
            ->when($this->search, function (Builder $query, string $search) {
                collect(explode(' ', $search))->each(function (string $term) use ($query) {
                    $query->where(function (Builder $query) use ($term) {
                        $query->where('first_name', 'LIKE', "%{$term}%")
                            ->orwhere('last_name', 'LIKE', "%{$term}%");
                    });
                });
            })
            ->when($this->state === 'tutti', function (Builder $query) {
                $query->withArchived();
            })
            ->when($this->state === 'archiviati', function (Builder $query) {
                $query->onlyArchived();
            })
            ->when($this->column === 'birth_date', function (Builder $query) {
                $query->orderByRaw('birth_date is NULL');
            })
            ->orderBy($this->column, $this->direction)
            ->paginate(10, pageName: 'pagina');

        return view('livewire.patients.table', compact('patients'));
    }
}
