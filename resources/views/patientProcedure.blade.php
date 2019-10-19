@extends('layouts.app')

@section('content')
  <div class="row mx-4">
    <div class="col-3">
      <h4>{{ $patient->last_name }} {{ $patient->first_name }} {{ $patient->father_name }}</h4>
      <div class="btn-group-vertical" role="group">
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/treatment/create">
          <span class="mx-5">Назначити лікування</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/procedure/create"><span class="mx-5">Назначити процедуру</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/data/create"><span class="mx-5">Назначити показник</span></a>
      </div>
    </div>
    <div class="col-6">
      <h3>Останні лікування</h3>
      @foreach($patient->procedures as $procedure)
        @if($count % 2 == 0)
          <div class="row mt-2">
        @endif
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $procedure->name }}</h5>
              <p class="card-text">{{ $procedure->description }}</p>
              <p class="card-text">{{ $amount }} {{ $procedure->unit_of_measure }}</p>
              <p class="card-text">Дата призначення: {{ $date_plan }}</p>
              <a class="card-text btn btn-primary text-right" role="button"
               href="/patient/{{ $patient->id }}/procedure/{{ $procedure->id}}/edit">
               Редактувати
              </a>
            </div>
          </div>
        </div>
        @php($count++)
        @if($count % 2 == 0 || $count == count($patient->procedures))
          </div>
        @endif
        @endforeach
    </div>
    <div class="col-3">
      <h4 class="mt-2">Данні</h4>
      <div class="btn-group-vertical" role="group">
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/show">
          <span class="mx-5">Показники</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/treatments/show">
          <span class="mx-5">Лікування</span>
        </a>
      </div>
    </div>
  </div>
@endsection
