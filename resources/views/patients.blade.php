@extends('layouts.homeLayout')
@section('main')
<div class="container">
  <h3>Пацієнти</h3>
  <form action="/patients/filter" method="GET" class="form-inline mb-2">
    @csrf
    <div class="input-group">
      <select name="category" class="form-control w-25">
        <option value="patients.last_name">Прізвище</option>
        <option value="patients.first_name">Ім`я</option>
        <option value="patients.father_name">По-батькові</option>
        <option value="presences.id">Номер картки</option>
      </select>
      <input id="search" name="search" class="form-control w-50 input-group-append" type="text" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-success" type="submit">Find<span class="glyphicon glyphicon-search"></span></button>
      </div>
    </div>
  </form>
  <table class="table table-light">
    <thead class="thead-dark">
      <th scope="col">№ картки</th>
      <th scope="col">Прізвище</th>
      <th scope="col">Ім`я</th>
      <th scope="col">По-батькові</th>
      <th scope="col"></th>
    </thead>
    <tbody>
      @foreach($patients as $patient)
      <tr>
        <td>{{ $patient->id }}</td>
        <td>{{ $patient->last_name }}</td>
        <td>{{ $patient->first_name }}</td>
        <td>{{ $patient->father_name }}</td>
        <td>
          <a href="/patient/{{ $patient->id }}/show" class="btn btn-primary">
            Детальніше
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
