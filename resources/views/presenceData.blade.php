@extends('layouts.app')

@section('content')
  <div class="row mx-4">
    <div class="col-3">
      <h4>{{ $patient->last_name }} {{ $patient->first_name }} {{ $patient->father_name }}</h4>
      <div class="btn-group-vertical" role="group">
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/treatment/create">
          <span class="mx-5">Назначити лікування</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/procedure/create">
          <span class="mx-5">Назначити процедуру</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/symptom/create">
          <span class="mx-5">Вказати симптом</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/medicament/create">
          <span class="mx-4">Назначити медикамент</span>
        </a>
      </div>
    </div>
    <div class="col-6">
      <h3>Останні симптоми</h3>
      <div class="row w-100">
        <div class="col-4">
        </div>
        <div class="col-6 my-3">
          <form action="/patient/{{$patient->id}}/filter" method="GET" class="form-inline">
            @csrf
            <div class="input-group">
              <select name="category" class="form-control w-25">
                <option value="patient_data.name">Назва</option>
              </select>
              <input id="search" name="search" class="form-control w-50 input-group-append" type="text" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Find<span class="glyphicon glyphicon-search"></span></button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-4">
        </div>
      </div>
      @php($count = 0)
      @php($i = 0)
      @foreach($patient->patientData as $patientData)
        @if($count % 2 == 0)
          <div class="row mt-2">
        @endif
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $patientData->name }}</h5>
              <p class="card-text">{{ $patientData->value }} {{ $patientData->unit_of_measure }}</p>
              <p class="card-text">Дата призначення: {{ $date_plan[$i]->date_plan }}</p>
              <a class="card-text btn btn-primary text-right" role="button"
               href="/patient/{{ $patient->id }}/data/{{ $patientData->id}}/edit">
               Редактувати
              </a>
            </div>
          </div>
        </div>
        @php($count++)
        @php($i++)
        @if($count % 2 == 0 || $count == count($patient->patientData))
          </div>
        @endif
        @endforeach
    </div>
    <div class="col-3">
      <h4 class="mt-2">Данні</h4>
      <div class="btn-group-vertical" role="group">
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/treatments/show">
          <span class="mx-5">Лікування</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/procedures/show">
          <span class="mx-5">Процедури</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/symptoms/show">
          <span class="mx-5">Симптоми</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/medicaments/show">
          <span class="mx-5">Медикаменти</span>
        </a>
      </div>
    </div>
  </div>
@endsection
