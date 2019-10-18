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
              <p class="card-text">{{ $medicament->manufactor->name}},  {{ $medicament->manufactor->country->name}}</p>
              <a class="card-text btn btn-primary text-right" role="button" href="/medicaments/{{ $medicament->id }}/edit">Редактувати</a>
            </div>
          </div>
        </div>
      @php($count++)
      @if($count % 2 == 0)
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
