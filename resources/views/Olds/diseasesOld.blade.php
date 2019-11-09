@extends('layouts.app')

@section('content')
  <div class="row mx-4">
    <div class="col-2">

    </div>
    <div class="col-8">
      <h3>Всі хвороби</h3>
      <a class="btn btn-primary" role="button" href="/disease/create">Додати Запис</a>
      <div class="row w-100">
        <div class="col-4">
        </div>
        <div class="col-6 my-3">
          <form action="/diseases/filter" method="GET" class="form-inline">
            @csrf
            <div class="input-group">
              <select name="category" class="form-control w-25">
                <option value="name">Назва</option>
                <option value="symptom">Симптом</option>
                <option value="treatment">Лікування</option>
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
      @php($count = 0)
      @foreach($diseases as $disease)
        @if($count % 2 == 0)
          <div class="row mt-2">
        @endif
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title font-weight-bold">{{ $disease->name }}</h5>
              <p class="card-title font-weight-bold">Симптоми:</p>
              <p class="card-text">
                @foreach($disease->symptoms as $symptom)
                  {{ $symptom->name }},
                @endforeach
              </p>
              <p class="card-title font-weight-bold">Лікування:</p>
              <p class="card-text">
                @foreach($disease->treatments as $treatment)
                  {{ $treatment->name }},
                @endforeach
              </p>
              <a class="card-text btn btn-info text-right" role="button" href="/diseases/{{ $disease->id }}/edit">Редактувати</a>
              <a class="card-text btn btn-danger text-right" role="button" href="#">Видалити</a>
            </div>
          </div>
        </div>
      @php($count++)
      @if($count % 2 == 0 || $count == count($diseases))
        </div>
      @endif
      @endforeach
      <div class="row mt-3">
        <div class="col-12 d-flex justify-content-center">
          {{ $diseases->links() }}
        </div>
      </div>
    </div>
    <div class="col-2">

    </div>
  </div>
@endsection
