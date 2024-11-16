<?php

namespace App\Livewire\Forms;

use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientForm extends Form
{
    public ?Patient $patient;

    #[Validate(['nullable'], as: 'Indirizzo')]
    public $address = null;

    #[Validate([
        'nullable', 'regex:/^[A-Z]{6}[0-9LMNPQRSTUV]{2}[A-EHLMPR-T][0-9LMNPQRSTUV]{2}[A-Z][0-9]{3}[A-Z]$/',
    ], as: 'Codice Fiscale')]
    public $codice_fiscale = null;

    #[Validate(['nullable', 'email', 'max:254'], as: 'Email')]
    public $email = null;

    #[Validate(['nullable', 'max:20', 'min:6'], as: 'Numero di telefono')]
    public $phone = null;

    #[Validate(['nullable', 'integer', 'min:10', 'max:255'], as: 'Peso')]
    public $weight = null;

    #[Validate(['nullable', 'integer', 'min:10', 'max:255'], as: 'Altezza')]
    public $height = null;

    #[Validate(['nullable'], as: 'Titolo di studio')]
    public $qualification = null;

    #[Validate(['nullable'], as: 'Lavoro')]
    public $job = null;

    #[Validate(['nullable'], as: 'Conviventi')]
    public $cohabitants = null;

    #[Validate(['nullable'], as: 'Farmaci')]
    public $drugs = null;

    #[Validate(['required'], as: 'Nome')]
    public $first_name = null;

    #[Validate(['required'], as: 'Cognome')]
    public $last_name = null;

    #[Validate(['nullable', 'in:Maschio,Femmina,Altro'], as: 'Genere')]
    public $gender = null;

    #[Validate(['nullable', 'date'], as: 'Data di nascita')]
    public $birth_date = null;

    #[Validate(['nullable'])]
    public $birth_place = null;

    #[Validate(['nullable', 'date'], as: 'Data di inizio terapia')]
    public $therapy_start_date = null;

    public function setPatient(Patient $patient): void
    {
        $this->patient = $patient;

        $this->first_name = $patient->first_name;
        $this->last_name = $patient->last_name;
        $this->email = $patient->email;
        $this->address = $patient->address;
        $this->therapy_start_date = $patient->therapy_start_date;
        $this->codice_fiscale = $patient->codice_fiscale;
        $this->phone = $patient->phone;
        $this->weight = $patient->weight;
        $this->height = $patient->height;
        $this->qualification = $patient->qualification;
        $this->job = $patient->job;
        $this->cohabitants = $patient->cohabitants;
        $this->drugs = $patient->drugs;
        $this->gender = $patient->gender;
        $this->birth_date = $patient->birth_date;
        $this->birth_place = $patient->birth_place;

        $this->resetValidation();
    }

    public function store(): Patient
    {
        $this->validate();

        return Auth::user()->patients()->create($this->all());
    }

    public function update(): Patient
    {
        $this->validate();

        $this->patient->update($this->all());

        return $this->patient;
    }
}
