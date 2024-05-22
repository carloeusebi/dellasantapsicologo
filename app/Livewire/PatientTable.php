<?php

namespace App\Livewire;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Responsive;

final class PatientTable extends PowerGridComponent
{
    public bool $showFilters = true;

    public string $sortField = 'therapy_start_date';
    public string $sortDirection = 'desc';

    public function setUp(): array
    {
        $this->persist(
            tableItems: ['columns'],
            prefix: Auth::id()
        );

        return [
            Header::make()
                ->showToggleColumns()
                ->showSearchInput(),

            Footer::make()
                ->showPerPage()
                ->showRecordCount(),

            Responsive::make()
                ->fixedColumns('first_name', 'therapy_start_date'),

        ];
    }

    public function datasource(): Builder
    {
        return Patient::query()
            ->withArchived();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('first_name')
            ->add('last_name')
            ->add('age', fn(Patient $patient) => $patient->age)
            ->add('therapy_start_date_formatted',
                fn(Patient $patient) => $patient->therapy_start_date->translatedFormat('d F Y'))
            ->add('email')
            ->add('archived_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Nome', 'first_name')
                ->sortable()
                ->searchable(),

            Column::make('Cognome', 'last_name')
                ->sortable()
                ->searchable(),

            Column::make('Età', 'age', 'birth_date')
                ->sortable(),

            Column::make('Email', 'email')
                ->searchable(),

            Column::make('Inizio Terapia', 'therapy_start_date_formatted', 'therapy_start_date')
                ->sortable(),

            Column::make('Stato', 'archived_at')
                ->hidden(),

            Column::action('')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('therapy_start_date'),

            Filter::boolean('archived_at')->label('Attuali', 'Archiviati')
                ->builder(function (Builder $query, string $value) {
                    return $query->when(filter_var($value, FILTER_VALIDATE_BOOLEAN),
                        function (Builder $query) {
                            return $query->withoutArchived();
                        },
                        function (Builder $query) {
                            return $query->onlyArchived();
                        },
                    );
                })
        ];
    }

    public function actions(Patient $patient): array
    {
        return [
            Button::add('edit')
                ->slot('Modifica')
                ->class('pg-btn-white')
                ->route('patients.edit', ['patient' => $patient])
        ];
    }

    public function actionRules(): array
    {
        return [
            Rule::rows()
                ->when(fn(Patient $patient) => $patient->isArchived())
                ->setAttribute('class', '!bg-red-100'),
        ];
    }

    protected function queryString(): array
    {
        return [
            'page' => ['except' => 1, 'as' => 'pagina'],
            'search' => ['except' => '', 'as' => 'cerca'],
            ...$this->powerGridQueryString(),
            'filters.boolean.archived_at' => ['as' => 'stato'],
            'filters.date.therapy_start_date' => ['except' => '', 'as' => 'data'],
        ];
    }
    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
