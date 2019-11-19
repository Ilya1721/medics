@extends('layouts.homeLayout')
@section('main')
  <div class="card">
    <div class="card-header">Особиста інформація</div>
    <div class="row mt-2 ml-2">
      <div class="col text-center">
        <span class="font-weight-bold pr-1">Фото:</span> <img src="/storage/{{ $user->employee->image }}" />
        <p class="pt-1">
          <span class="font-weight-bold">ПІБ:</span> {{ $user->employee->last_name }} {{ $user->employee->first_name }} {{ $user->employee->father_name }}
        </p>
      </div>
      <div class="col">
        <span class="font-weight-bold">Про себе:</span> {{ $user->employee->about }}
      </div>
    </div>
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
@endsection
