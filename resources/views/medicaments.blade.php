@extends('layouts.app')

@section('content')
  <div class="row mx-4">
    <div class="col-2">

    </div>
    <div class="col-8">
      <h3>Всі медикаменти</h3>
      <a class="btn btn-primary" role="button" href="/medicaments/create">Додати Запис</a>
      @foreach($medicaments as $medicament)
        @if($count % 2 == 0)
          <div class="row mt-2">
        @endif
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title font-weight-bold">{{ $medicament->name }}</h5>
              <p class="card-title font-weight-bold">Одиниця вимірювання:</p>
              <p class="card-text">{{ $medicament->unit_of_measure }}</p>
              <p class="card-title font-weight-bold">Виробник:</p>
              @foreach($medicament->manufactors as $manufactor)
              <p class="card-text">{{ $manufactor->name}},  {{ $manufactor->country->name}}</p>
              @endforeach
              <a class="card-text btn btn-info text-right" role="button" href="/medicaments/{{ $medicament->id }}/edit">Редактувати</a>
              <a class="card-text btn btn-danger text-right" role="button" href="#">Видалити</a>
            </div>
          </div>
        </div>
      @php($count++)
      @if($count % 2 == 0 || $count == count($medicaments))
        </div>
      @endif
      @endforeach
      <div class="row mt-3">
        <div class="col-12 d-flex justify-content-center">
          {{ $medicaments->links() }}
        </div>
      </div>
    </div>
    <div class="col-2">

    </div>
  </div>
@endsection
