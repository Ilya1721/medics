@extends('layouts.app')

@section('content')
  <div class="row mx-4">
    <div class="col-2">

    </div>
    <div class="col-8">
      <h3>Всі процедури</h3>
      <a class="btn btn-primary" role="button" href="/procedures/create">Додати Запис</a>
      @foreach($procedures as $procedure)
        @if($count % 2 == 0)
          <div class="row mt-2">
        @endif
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title font-weight-bold">{{ $procedure->name }}</h5>
              <p class="card-title font-weight-bold">Одиниця вимірювання:</p>
              <p class="card-text">{{ $procedure->unit_of_measure }}</p>
              <a class="card-text btn btn-info text-right" role="button" href="/procedures/{{ $procedure->id }}/edit">Редактувати</a>
              <a class="card-text btn btn-danger text-right" role="button" href="#">Видалити</a>
            </div>
          </div>
        </div>
        @php($count++)
        @if($count % 2 == 0 || $count == count($procedures))
          </div>
        @endif
        @endforeach
        <div class="row mt-3">
          <div class="col-12 d-flex justify-content-center">
            {{ $procedures->links() }}
          </div>
        </div>
    </div>
    <div class="col-2">

    </div>
  </div>
@endsection
