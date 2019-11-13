@extends('layouts.noFooterLayout')
@section('content')
<div class="container mt-3">
  <h3 class="text-center">Клініки</h3>
  <div class="col text-center">
    <form action="/clinics/filter" method="GET" class="form-inline">
      @csrf
      <div class="input-group">
        <select name="category" class="form-control w-25">
          <option value="clinics.name">Назва</option>
          <option value="cities.name">Місто</option>
          <option value="clinics.type">Тип</option>
        </select>
        <input id="search" name="search" class="form-control w-50 input-group-append" type="text" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-success" type="submit">Find<span class="glyphicon glyphicon-search"></span></button>
        </div>
      </div>
    </form>
  </div>
  @foreach($clinics as $clinic)
  <div class="card mt-3">
    <div class="row mt-2">
      <div class="col-2">
        <img src="/img/noImage.png" style="width: 125px; height: 150px;" />
      </div>
      <div class="col-6">
        <h4>
          {{ $clinic->name}}
        </h4>
        <p>{{ $clinic->type}}</p>
      </div>
      <div class="col-2">
        <p>{{ $clinic->street }}, {{ $clinic->house }}, {{ $clinic->city->name }}</p>
        <p>{{ $clinic->phone_number }}</p>
        <p>Пн - Пт: <span class="font-weight-bold">{{ $clinic->schedule }}</span></p>
      </div>
    </div>
  </div>
  @endforeach
  <div class="row mt-3">
    <div class="col-12 d-flex justify-content-center">
      {{ $clinics->links() }}
    </div>
  </div>
</div>
@endsection
