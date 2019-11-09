@extends('layouts.app')

@section('content')
  <div class="row mx-4">
    <div class="col-2 text-left">
      <div class="my-3 ml-5">
        <img src="/storage/{{ $user->employee->image }}" />
      </div>
      <h4>{{ $user->employee->last_name }} {{ $user->employee->first_name }} {{ $user->employee->father_name }}</h4>
      <div class="btn-group-vertical" role="group">
        <a class="btn btn-outline-primary btn-lg" role="button" href="/home"><span class="mx-0">Особистий кабінет</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="#"><span class="mx-0">Статистика</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/innerData/show"><span class="mx-0">Внутрішні Данні</span></a>
      </div>
      <h5 class="mt-3">Ви увійшли як {{ $user->employee->job->name }}</h5>
    </div>
    <div class="col-8 ml-3 mt-3 container">
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
        <div class="row mt-2">
          <div class="col text-center">
            <a class="btn btn-primary my-3" role="button" href="/personalData/edit">
              Редагувати
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-2">

    </div>
  </div>
@endsection
