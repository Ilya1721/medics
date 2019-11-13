@extends('layouts.app')

@section('content')
  <div class="row mx-4">
    <div class="col-2 text-left">
      <div class="my-3 ml-5">
        <img src="/storage/{{ $user->employee->image }}" />
      </div>
      <h4>{{ $user->employee->last_name }} {{ $user->employee->first_name }} {{ $user->employee->father_name }}</h4>
      <div class="btn-group-vertical" role="group">
        <a class="btn btn-outline-primary btn-lg" role="button" href="/personalData/show"><span class="mx-0">Особиста інформація</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/statistics/show"><span class="mx-5">Статистика</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/innerData/show"><span class="mx-0">Внутрішні Данні</span></a>
      </div>
      <h5 class="mt-3">Ви увійшли як {{ $user->employee->job->name }}</h5>
    </div>
    <div class="col-8 mt-3 ml-4">
      <div class="container">
        <h2 class="text-center mt-3">Візити</h2>
        <a class="btn btn-primary text-right" role="button" href="/presence/create">Додати Запис</a>
        <div class="row w-100">
          <div class="col-4">
          </div>
          <div class="col-6 my-3">
            <form action="/presences/filter" method="GET" class="form-inline">
              @csrf
              <div class="input-group">
                <select name="category" class="form-control w-25">
                  <option value="patients.last_name">Прізвище</option>
                  <option value="patients.first_name">Ім`я</option>
                  <option value="patients.father_name">По-батькові</option>
                  <option value="rooms.number">Кабінет</option>
                  <option value="patients.street">Вулиця</option>
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
        @foreach($presences as $presence)
        <div class="card mt-3 container">
          <div class="row font-weight-bold">
            <div class="col text-center">
              <div class="card-body">
                {{ $presence->patient->last_name }} {{$presence->patient->first_name }} {{ $presence->patient->father_name }}
              </div>
            </div>
          </div>
          <div class="row my-3 font-weight-bold">
            <div class="col text-center">
              Номер кабінету: {{ $presence->room->number }}
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
              Адреса: {{ $presence->patient->street }} {{ $presence->patient->house }} кв.{{ $presence->patient->flat}} м.{{ $presence->patient->city->name }}
            </div>
            <div class="col">
              Номер телефону: {{ $presence->patient->phone_number }}
            </div>
          </div>
          <div class="row my-3 text-center">
            <div class="col">
              <a class="btn btn-info mx-1" href="/presence/{{ $presence->id }}/edit">Редагувати</a>
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
    </div>
    <div class="col-2">

    </div>
  </div>
@endsection
