@extends('layouts.app')

@section('content')
  <div class="row mx-4">
    <div class="col-2">

    </div>
    <div class="col-8">
      <h3>Всі процедури</h3>
      <a class="btn btn-primary" role="button" href="/procedures/create">Додати Запис</a>
      <div class="row w-100">
        <div class="col-4">
        </div>
        <div class="col-6 my-3">
          <form action="/procedures/filter" method="GET" class="form-inline">
            @csrf
            <div class="input-group">
              <select name="category" class="form-control w-25">
                <option value="name">Назва</option>
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
