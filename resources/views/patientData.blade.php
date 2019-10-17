@extends('layouts.app')

@section('content')
  <div class="row mx-4">
    <div class="col">
      <h4>Іванов Іван Іванович</h4>
      <div class="btn-group-vertical" role="group">
        <a class="btn btn-outline-primary btn-lg" role="button" href="#"><span class="mx-5">Назначити лікування</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="#"><span class="mx-5">Назначити процедури</span></a>
      </div>
    </div>
    <div class="col-6">
      <h3>Останні показники</h3>
      @for($i = 0; $i < 2; $i++)
        <div class="row mt-2">
        @for($j = 0; $j < 3; $j++)
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Вага</h5>
              <p class="card-text">-- кг</p>
              <a class="card-text btn btn-primary text-right" role="button" href="#">Редактувати</a>
            </div>
          </div>
        </div>
        @endfor
      </div>
      @endfor
    </div>
    <div class="col">

    </div>
  </div>
@endsection
