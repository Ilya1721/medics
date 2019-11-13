@extends('layouts.homeLayout')
@section('main')
<div class="container">
  <h3>Всі лікування</h3>
  <a class="btn btn-primary" role="button" href="/treatment/create">Додати Запис</a>
  <div class="row w-100">
    <div class="col-4">
    </div>
    <div class="col-6 my-3">
      <form action="/treatments/filter" method="GET" class="form-inline">
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
  <table class="table table-light">
    <thead class="thead-dark">
      <th scope="col">Назва</th>
      <th scope="col">Опис</th>
      <th scope="col"></th>
    </thead>
    <tbody>
      @foreach($treatments as $treatment)
      <tr>
        <td>{{ $treatment->name }}</td>
        <td>{{ $treatment->description }}</td>
        <td>
          <div class="d-flex inline">
            <a class="btn btn-primary" role="button"
             href="/treatments/{{ $treatment->id }}/edit">
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
      {{ $treatments->links() }}
    </div>
  </div>
</div>
@endsection
