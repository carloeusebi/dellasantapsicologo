<?php

namespace App\Livewire\Patients;

use App\Models\Patient;
use Illuminate\Pagination\LengthAwarePaginator;
use LaravelIdea\Helper\App\Models\_IH_Survey_C;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy]
class SurveysTable extends Component
{
    use WithPagination;

    public Patient $patient;

    #[Computed]
    public function surveys(
    ): \Illuminate\Contracts\Pagination\LengthAwarePaginator|array|_IH_Survey_C|LengthAwarePaginator
    {
        return $this->patient->surveys()->latest()->paginate(3, pageName: 'pagina_valutazioni');
    }

    public function render(): string
    {
        return <<<'blade'
<div>
 @php
      $headers = [
        ['key' => 'title', 'label' => 'Titolo'],
        ['key' => 'created_at', 'label' => 'Creato']
       ];
        $rowDecoration = [
          'table-success' => fn (App\Models\Survey $survey) => $survey->completed,
          'table-error' => fn (App\Models\Survey $survey) => !$survey->completed,
        ];
      @endphp
      <x-card title="Valutazioni">
        <x-app-hr target="previousPage,gotoPage,nextPage"/>
        @if($this->surveys->isEmpty())
          <div class="text-base-content/60 my-5 text-center">Nessuna valutazione</div>
        @else
          <x-table
              :$headers :$rowDecoration with-pagination
              :rows="$this->surveys" link="/valutazioni/{id}?tab=dettagli"
          >
            @scope('cell_created_at', $survey)
            <div>{{ $survey->created_at->diffForHumans() }}</div>
            @endscope
          </x-table>
        @endif
      </x-card>
</div>
blade;
    }
}
