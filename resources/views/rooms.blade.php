@extends('layouts.app')

@section('content')
  <div class="row mx-4">
    <div class="col-2">

    </div>
    <div class="col-8">
      <h3>Всі палати</h3>
      <a class="btn btn-primary" role="button" href="/rooms/create">Додати Запис</a>
      @foreach($rooms as $room)
        @if($count % 2 == 0)
          <div class="row mt-2">
        @endif
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title font-weight-bold">Номер палати:</h5>
              <p class="card-text">{{ $room->number }}</p>
              <p class="card-title font-weight-bold">Відділ:</p>
              <p class="card-text">{{ $room->department->name }}</p>
              <p class="card-title font-weight-bold">Вмістимість:</p>
              <p class="card-text">{{ $room->capacity }}</p>
              <a class="card-text btn btn-primary text-right" role="button" href="/rooms/{{ $room->id }}/edit">Редактувати</a>
            </div>
          </div>
        </div>
        @php($count++)
        @if($count % 2 == 0)
          </div>
        @endif
        @endforeach
    </div>
    <div class="col-2">

    </div>
  </div>
@endsection
