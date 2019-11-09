@extends('layouts.app')

@section('content')
  <div class="row mx-4">
    <div class="col-2 text-left">
      <div class="my-3 ml-5">
        <img src="/storage/{{ $user->employee->image }}" />
      </div>
      <h4>{{ $user->employee->last_name }} {{ $user->employee->first_name }} {{ $user->employee->father_name }}</h4>
      <div class="btn-group-vertical" role="group">
        <a class="btn btn-outline-primary btn-lg" role="button" href="/presence/show"><span class="mx-5">Пацієнти</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/diseases/show"><span class="mx-5">Хвороби</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/medicaments/show"><span class="mx-5">Медикаменти</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/procedures/show"><span class="mx-5">Процедури</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/rooms/show"><span class="mx-5">Палати</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/symptoms/show"><span class="mx-5">Симптоми</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/treatments/show"><span class="mx-5">Лікування</span></a>
      </div>
    </div>
    <div class="col-8 mt-3 ml-3">
      <div class="card">
        <div class="card-header">Особиста інформація</div>
        <div class="row mt-2 ml-2">
          <div class="col">
            <div class="card-text"><span class="font-weight-bold">Адреса: </span>
              м.{{ $user->employee->city->name }} вул.{{ $user->employee->street }}
              {{ $user->employee->house }}
              кв.{{ $user->employee->flat }}
            </div>
          </div>
          <div class="col">
            <div class="card-text"><span class="font-weight-bold">Номер телефону: </span>
              {{ $user->employee->phone_number }}
            </div>
          </div>
        </div>
        <div class="row mt-2 ml-2">
          <div class="col">
            <div class="card-text"><span class="font-weight-bold">Посада: </span>
              {{ $user->employee->job->name }}
            </div>
          </div>
          <div class="col">
            <div class="card-text"><span class="font-weight-bold">Відділ: </span>
              {{ $user->employee->department->name }}
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col justify-content-left ml-2 mb-3">
            <a class="btn btn-info" role="button" href="/home/{{ $user->employee->id }}/edit">Редактувати</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-2">

    </div>
  </div>
@endsection
