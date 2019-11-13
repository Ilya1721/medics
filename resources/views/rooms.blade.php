@extends('layouts.homeLayout')
@section('main')
<div class="container">
  <h3>Всі палати</h3>
  <a class="btn btn-primary" role="button" href="/rooms/create">Додати Запис</a>
  <div class="row w-100">
    <div class="col-4">
    </div>
    <div class="col-6 my-3">
      <form action="/rooms/filter" method="GET" class="form-inline">
        @csrf
        <div class="input-group">
          <select name="category" class="form-control w-25">
            <option value="rooms.number">Номер</option>
            <option value="rooms.capacity">Вмістимість</option>
            <option value="departments.name">Відділення</option>
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
      <th scope="col">Номер палати</th>
      <th scope="col">Відділ</th>
      <th scope="col">Вмістимість</th>
      <th scope="col"></th>
    </thead>
    <tbody>
      @foreach($rooms as $room)
      <tr>
        <td>{{ $room->number }}</td>
        <td>{{ $room->department->name }}</td>
        <td>{{ $room->capacity }}</td>
        <td>
          <div class="d-flex inline">
            <a class="btn btn-primary" role="button"
             href="/rooms/{{ $room->id }}/edit">
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
      {{ $rooms->links() }}
    </div>
  </div>
</div>
@endsection
