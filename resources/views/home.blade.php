@extends('layouts.homeLayout')
@section('main')
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
            <option value="presences.id">Номер картки</option>
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
              <a href="/presence/{{ $presence->id }}/show" class="btn btn-primary" role="button">
                Детальніше
              </a>
            </div>
          </div>
        </div>
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
