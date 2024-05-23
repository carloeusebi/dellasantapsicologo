<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

abstract class TableComponent extends Component
{
    use WithPagination;

    protected static $pageName = 'pagina';
    
    public string $column;
    public string $direction;
    public string $search;

    public function clearSearch(): void
    {
        $this->search = '';
    }

    public function sort(string $column): void
    {
        if ($this->column === $column) {
            $this->direction = $this->direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->direction = 'asc';
        }
        $this->column = $column;
    }
}
