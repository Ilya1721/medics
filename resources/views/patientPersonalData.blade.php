@extends('layouts.patientLayout')
@section('main')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h3>Картка пацієнта</h3>
      <div class="card rounded-0 mt-3">
        <div class="row">
          <div class="col-12">
            <div class="card border-top-0 border-left-0 border-right-0 rounded-0 container">
              <div class="card-body">
                №{{ $patient->id }}
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card border-top-0 border-right-0 border-left-0 rounded-0 container">
              <div class="card-body">
                <h3>Пацієнт</h3>
                <p><h5>ПІБ:</h5> {{ $patient->last_name}} {{$patient->first_name}} {{ $patient->father_name }}</p>
                <p><h5>Адреса:</h5> м.{{ $patient->city->name}}
                       вул.{{ $patient->street}} {{ $patient->house}}
                       кв. {{ $patient->flat }}</p>
                <p><h5>Телефон:</h5> {{ $patient->phone_number }}</p>
                <a href="/patient/{{ $patient->id }}/edit" class="btn btn-primary" role="button">
                  Редагувати
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
