<?php

namespace App\Livewire\Surveys\Components;

use App\Models\Survey;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy]
class OtherSurveys extends Component
{
    use WithPagination;

    public Survey $survey;

    #[Computed]
    public function surveys()
    {
        return $this->survey->patient->surveys()
            ->where('id', '!=', $this->survey->id)
            ->latest()->paginate(3, pageName: 'pagina_valutazioni');
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
     <x-card :title="'Altre valutazioni di ' . $survey->patient->full_name ">
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
