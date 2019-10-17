@extends('layouts.app')

@section('content')
  <div class="row mx-4">
    <div class="col">

    </div>
    <div class="col-6">
      <h3>Всі хвороби</h3>
      <a class="btn btn-primary" role="button" href="#">Додати Запис</a>
      @foreach($diseases as $disease)
        @if($count % 2 == 0)
          <div class="row mt-2">
        @endif
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title font-weight-bold">{{ $disease->name }}</h5>
              <p class="card-title font-weight-bold">Симптоми:</p>
              <p class="card-text">Кашель, висока температура, головний біль</p>
              <p class="card-title font-weight-bold">Лікування</p>
              <p class="card-text">Гарячий чай, Іммунал, Постільний режим</p>
              <a class="card-text btn btn-primary text-right" role="button" href="#">Редактувати</a>
            </div>
          </div>
        </div>
      @php($count++)
      @if($count % 2 == 0)
        </div>
      @endif
      @endforeach
    </div>
    <div class="col">

    </div>
  </div>
@endsection
