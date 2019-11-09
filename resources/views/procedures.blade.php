@extends('layouts.app')

@section('content')
  <div class="row mx-4">
    <div class="col-3 text-left">
      <div class="my-3 ml-5">
        <img src="/storage/{{ $user->employee->image }}" />
      </div>
      <h4>{{ $user->employee->last_name }} {{ $user->employee->first_name }} {{ $user->employee->father_name }}</h4>
      <div class="btn-group-vertical" role="group">
        <a class="btn btn-outline-primary btn-lg" role="button" href="/home"><span class="mx-0">Особистий кабінет</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/personalData/show"><span class="mx-0">Особиста інформація</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="#"><span class="mx-0">Статистика</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/innerData/show"><span class="mx-0">Внутрішні Данні</span></a>
      </div>
      <h5 class="mt-3">Ви увійшли як {{ $user->employee->job->name }}</h5>
    </div>
    <div class="col-6">
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
      <table class="table table-light">
        <thead class="thead-dark">
          <th scope="col">Назва</th>
          <th scope="col">Одиниця виміру</th>
          <th scope="col"></th>
        </thead>
        <tbody>
          @foreach($procedures as $procedure)
          <tr>
            <td>{{ $procedure->name }}</td>
            <td>{{ $procedure->unit_of_measure }}</td>
            <td>
              <div class="d-flex inline">
                <a class="btn btn-primary" role="button"
                 href="/procedures/{{ $procedure->id }}/edit">
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
          {{ $procedures->links() }}
        </div>
      </div>
    </div>
    <div class="col-3">

    </div>
  </div>
@endsection
