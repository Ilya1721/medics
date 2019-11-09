@extends('layouts.app')

@section('content')
  <div class="row mx-4">
    <div class="col-3 text-left">
      <div class="my-3 ml-5">
        <img src="/storage/{{ $user->employee->image }}" />
      </div>
      <h4>{{ $user->employee->last_name }} {{ $user->employee->first_name }} {{ $user->employee->father_name }}</h4>
      <div class="btn-group-vertical" role="group">
        <a class="btn btn-outline-primary btn-lg" role="button" href="/personalData/show"><span class="mx-0">Особиста інформація</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="#"><span class="mx-0">Статистика</span></a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/home"><span class="mx-0">Особистий кабінет</span></a>
      </div>
      <h5 class="mt-3">Ви увійшли як {{ $user->employee->job->name }}</h5>
    </div>
    <div class="col-6 mt-3 ml-4">
      <div class="container">
        <h2 class="text-center mt-3">Внутрішні Данні Системи</h2>
        <table class="table table-light">
          <thead class="thead-dark">
            <th scope="col"></th>
            <th scope="col"></th>
          </thead>
          <tbody>
            <tr>
              <td>
                <a href="/diseases/show" class="btn btn-link">Хвороби</a>
              </td>
              <td>{{ $diseaseCount }}</td>
            </tr>
            <tr>
              <td>
                <a href="/symptoms/show" class="btn btn-link">Симптоми</a>
              </td>
              <td>{{ $symptomCount }}</td>
            </tr>
            <tr>
              <td>
                <a href="/medicaments/show" class="btn btn-link">Медикаменти</a>
              </td>
              <td>{{ $medicamentCount }}</td>
            </tr>
            <tr>
              <td>
                <a href="/treatments/show" class="btn btn-link">Схеми лікувань</a>
              </td>
              <td>{{ $treatmentCount }}</td>
            </tr>
            <tr>
              <td>
                <a href="/procedures/show" class="btn btn-link">Процедури</a>
              </td>
              <td>{{ $procedureCount }}</td>
            </tr>
            <tr>
              <td>
                <a href="/rooms/show" class="btn btn-link">Палати</a>
              </td>
              <td>{{ $roomCount }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-3">

    </div>
  </div>
@endsection
