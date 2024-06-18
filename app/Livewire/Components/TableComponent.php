<?php

namespace App\Livewire\Components;

use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

abstract class TableComponent extends Component
{
    use WithPagination;

    protected static $pageName = 'pagina';

    public string $search = '';

    public function clearSearch(): void
    {
        $this->search = '';
    }

    #[On('resetFilters')]
    public function resetFilters(): void
    {
        $this->reset();
    }

    /**
     * @param  callable(): LengthAwarePaginator  $query
     * @return LengthAwarePaginator $result
     */
    protected function goToFirstPageIfResultIsEmpty(callable $query): LengthAwarePaginator
    {
        while (true) {
            $result = $query();

            if ($result->count() > 0 || $this->getPage(self::$pageName) === 1) {
                break;
            }
            $this->resetPage(self::$pageName);
        }
        return $result;
    }
}
