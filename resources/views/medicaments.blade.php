@extends('layouts.homeLayout')
@section('main')
<div class="container">
  <h3>Всі медикаменти</h3>
  <a class="btn btn-primary" role="button" href="/medicaments/create">Додати Запис</a>
  <div class="row w-100">
    <div class="col-4">
    </div>
    <div class="col-6 my-3">
      <form action="/medicaments/filter" method="GET" class="form-inline">
        @csrf
        <div class="input-group">
          <select name="category" class="form-control w-25">
            <option value="name">Назва</option>
            <option value="manufactor">Виробник</option>
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
  <table class="table text-center table-light">
    <thead class="thead-dark">
      <th scope="col">Назва</th>
      <th scope="col">Одиниця вимірювання</th>
      <th scope="col">Виробник</th>
      <th scope="col"></th>
    </thead>
    <tbody>
      @foreach($medicaments as $medicament)
      <tr>
        <td>{{ $medicament->name }}</td>
        <td>{{ $medicament->unit_of_measure }}</td>
        <td>
          @foreach($medicament->manufactors as $manufactor)
            {{ $manufactor->name }}, {{ $manufactor->country->name }},
          @endforeach
        </td>
        <td>
          <div class="d-flex inline">
            <a class="btn btn-primary" role="button"
             href="/medicaments/{{ $medicament->id }}/edit">
             Редагувати
            </a>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="row mt-3">
    <div class="col-12 d-flex justify-content-center">
      {{ $medicaments->links() }}
    </div>
  </div>
</div>
@endsection
