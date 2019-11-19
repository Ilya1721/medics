@extends('layouts.presenceLayout')
@section('main')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h3>Дані візиту</h3>
        <div class="card rounded-0 mt-3">
          <div class="row">
            <div class="col pr-0">
              <div class="card border-top-0 border-left-0 rounded-0 container">
                <div class="card-body">
                  №{{ $presence->id }}
                </div>
              </div>
            </div>
            <div class="col px-0">
              <div class="card border-top-0 border-left-0 border-right-0 rounded-0 container">
                <div class="card-body">
                  Початок: {{ $presence->arrived_at }}
                </div>
              </div>
            </div>
            <div class="col pl-0">
              <div class="card border-top-0 border-right-0 rounded-0 container">
                <div class="card-body">
                  Кінець: {{ $presence->departure_at }}
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col pr-0">
              <div class="card rounded-0 container border-left-0 border-bottom-0 border-top-0 border-right-1">
                <div class="card-body">
                  <h3>Пацієнт</h3>
                  <p><h5>ПІБ:</h5> {{ $presence->patient->last_name}} {{$presence->patient->first_name}} {{ $presence->patient->father_name }}</p>
                  <p><h5>Адреса:</h5> м.{{ $presence->patient->city->name}}
                         вул.{{ $presence->patient->street}} {{ $presence->patient->house}}
                         кв. {{ $presence->patient->flat }}</p>
                  <p><h5>Телефон:</h5> {{ $presence->patient->phone_number }}</p>
                </div>
              </div>
            </div>
            <div class="col pl-0">
              <div class="card rounded-0 container border-0">
                <div class="card-body">
                  <h3>Прийом</h3>
                  <p><h5>Заклад:</h5>{{ $presence->room->department->clinic->name }}</p>
                  <p><h5>Кабінет:</h5>{{ $presence->room->number }}</p>
                  <div class="pt-0">
                    <a href="/presence/{{ $presence->id }}/edit" class="btn btn-info" role="button">
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
  </div>
</div>
@endsection
