@extends('layouts.app')

@section('content')
<div class="container">
  <h2 class="text-center mt-3">Пацієнти</h2>
  <a class="btn btn-primary text-right" role="button" href="/presence/create">Додати Запис</a>
  @foreach($presences as $presence)
  <div class="card mt-3">
    <div class="row font-weight-bold">
      <div class="col text-center">
        <div class="card-body">
          {{ $presence->patient->last_name }} {{$presence->patient->first_name }} {{ $presence->patient->father_name }}
        </div>
      </div>
    </div>
    <div class="row my-3 font-weight-bold">
      <div class="col text-center">
        Номер палати: {{ $presence->room->number }}
      </div>
      <div class="col text-center">
        Заклад: {{ $presence->room->department->clinic->name }}
      </div>
      <div class="col text-center">
        Доктор: {{ $presence->doctor->last_name }} {{ $presence->doctor->first_name }} {{ $presence->doctor->father_name }}
      </div>
      <div class="col">
        <a class="btn btn-primary" role="button" href="/patient/{{ $presence->patient->id }}/show">
          <span class="mx-5">Детальніше</span>
        </a>
      </div>
    </div>
    <div class="row my-3 font-weight-bold">
      <div class="col text-center">
        Дата прибуття: {{ $presence->arrived_at }}
      </div>
      <div class="col text-center">
        Дата виписки: {{ $presence->departure_at }}
      </div>
      <div class="col text-center">
        Адреса: {{ $presence->patient->street }} {{ $presence->patient->house }} кв.{{ $presence->patient->flat}} м.{{ $presence->patient->city->name }}
      </div>
      <div class="col">
        Номер телефону: {{ $presence->patient->phone_number }}
      </div>
    </div>
    <div class="row my-3 text-center">
      <div class="col">
        <a class="btn btn-info mx-1" href="/presence/{{ $presence->id }}/edit">Редагувати</a>
        <a class="btn btn-danger mx-1" href="#">Видалити</a>
      </div>
    </div>
  </div>
  @endforeach
  <div class="row mt-3">
    <div class="col-12 d-flex justify-content-center">
      {{ $presences->links() }}
    </div>
  </div>
</div>
@endsection
