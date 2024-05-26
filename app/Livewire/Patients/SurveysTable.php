<?php

namespace App\Livewire\Patients;

use App\Models\Patient;
use Livewire\Attributes\Session;
use Livewire\Attributes\Url;

class SurveysTable extends \App\Livewire\Surveys\SurveysTable
{
    public ?Patient $patient;

    #[Url(as: 'prova', except: ''), Session(key: 'patients-surveys-table-search-{patient.id}')]
    public string $search = '';
}
