<ul>
  @if(auth()->user()->isAdmin())
    <li>
      <span class="font-bold">Dottore</span>:
      <span>{{ $patient->user->name }}</span>
    </li>
  @endif
  <li>
    <span class="font-bold">Creato:</span>
    {!! get_formatted_date($patient->created_at) !!}
  </li>
  @unless($patient->created_at->isSameSecond($patient->updated_at))
    <li>
      <span class="font-bold">Ultima modifica:</span>
      {!! get_formatted_date($patient->updated_at) !!}
    </li>
  @endunless
  @if($patient->therapy_start_date)
    <li>
      <span class="font-bold">Data di inizio terapia</span>:
      {!! get_formatted_date($patient->therapy_start_date) !!}
    </li>
  @endif
  @if ($patient->isArchived())
    <li>
      <span class="font-bold">Data di fine Terapia:</span>
      {!! get_formatted_date($patient->archived_at) !!}
    </li>
  @endif
  @if($patient->gender)
    <li>
      <span class="font-bold">Genere</span>:
      <span>{{ $patient->gender }}</span>
    </li>
  @endif
  @if($patient->age)
    <li>
      <span class="font-bold">Età</span>:
      <span>{{ $patient->age }}</span>
    </li>
  @endif
  @if($patient->birth_date)
    <li>
      <span class="font-bold">Data di nascita</span>:
      <span>{{ $patient->birth_date->translatedFormat('d F Y') }}</span>
    </li>
  @endif
  @if($patient->birth_date)
    <li>
      <span class="font-bold">Luogo di nascita</span>:
      <span>{{ $patient->birth_place }}</span>
    </li>
  @endif
  @if($patient->address)
    <li>
      <span class="font-bold">Indirizzo</span>:
      <span>{{ $patient->address }}</span>
    </li>
  @endif
  @if($patient->codice_fiscale)
    <li>
      <span class="font-bold">Codice Fiscale</span>:
      <span>{{ $patient->codice_fiscale }}</span>
    </li>
  @endif
  @if($patient->email)
    <li>
      <span class="font-bold">Email</span>:
      <span>{{ $patient->email }}</span>
    </li>
  @endif
  @if($patient->phone)
    <li>
      <span class="font-bold">Numero di telefono</span>:
      <span>{{ $patient->phone}}</span>
    </li>
  @endif
  @if($patient->weight)
    <li>
      <span class="font-bold">Peso</span>:
      <span>{{ $patient->weight }}kg</span>
    </li>
  @endif
  @if($patient->height)
    <li>
      <span class="font-bold">Altezza</span>:
      <span>{{ $patient->height }}cm</span>
    </li>
  @endif
  @if($patient->qualification)
    <li>
      <span class="font-bold">Titolo di studio</span>:
      <span>{{ $patient->qualification }}</span>
    </li>
  @endif
  @if($patient->job)
    <li>
      <span class="font-bold">Occupazione</span>:
      <span>{{ $patient->job }}</span>
    </li>
  @endif
  @if($patient->cohabitants)
    <li>
      <span class="font-bold">Conviventi</span>:
      <span>{{ $patient->cohabitants }}</span>
    </li>
  @endif
  @if($patient->drugs)
    <li>
      <span class="font-bold">Farmaci</span>:
      <span>{{ $patient->drugs }}</span>
    </li>
  @endif
</ul>
