@extends('layouts.homeLayout')
@section('main')
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
@endsection
