@extends('layouts.noFooterLayout')
@section('content')
<div class="container">
  <h2 class="text-center mt-3">Лікарі</h2>
  <div class="col text-center">
    <form action="/doctors/filter" method="GET" class="form-inline">
      @csrf
      <div class="input-group">
        <select name="category" class="form-control w-25">
          <option value="employees.last_name">Прізвище</option>
          <option value="employees.first_name">Ім`я</option>
          <option value="employees.father_name">По-батькові</option>
          <option value="jobs.name">Посада</option>
          <option value="departments.name">Відділення</option>
        </select>
        <input id="search" name="search" class="form-control w-50 input-group-append" type="text" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-success" type="submit">Find<span class="glyphicon glyphicon-search"></span></button>
        </div>
      </div>
    </form>
  </div>
  @foreach($doctors as $doctor)
  <div class="card mt-3">
    <div class="row font-weight-bold">
      <div class="col-2 text-left">
        <img src="/storage/{{ $doctor->image }}" />
      </div>
      <div class="col-8 text-left">
        <div class="card-body text-left">
          {{ $doctor->last_name }} {{$doctor->first_name }} {{ $doctor->father_name }}
          <p class="font-weight-normal">{{ $doctor->about }}</p>
        </div>
      </div>
    </div>
    <div class="row my-3 font-weight-bold">
      <div class="col text-center">
        {{ $doctor->job->name }}
      </div>
      <div class="col text-center">
        {{ $doctor->department->clinic->name }}
      </div>
      <div class="col text-center">
        {{ $doctor->department->name }} відділ
      </div>
      <div class="col">
        {{ $doctor->phone_number }}
      </div>
    </div>
  </div>
  @endforeach
  <div class="row mt-3">
    <div class="col-12 d-flex justify-content-center">
      {{ $doctors->links() }}
    </div>
  </div>
</div>
@endsection
