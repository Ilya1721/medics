@extends('layouts.app')

@section('content')
  <div class="row mx-4">
    <div class="col-3">
      <h4>{{ $patient->last_name }} {{ $patient->first_name }} {{ $patient->father_name }}</h4>
      <div class="btn-group-vertical" role="group">
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/treatment/create">
          <span class="mx-4">Назначити лікування</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/symptom/create">
          <span class="mx-4">Назначити процедуру</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/medicament/create">
          <span class="mx-4">Назначити медикамент</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/symptom/create">
          <span class="mx-4">Вказати симптом</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/disease/create">
          <span class="mx-4">Вказати діагноз</span>
        </a>
      </div>
    </div>
    <div class="col-6">
      <h3>Останні симптоми</h3>
      <table class="table text-center table-light">
        <thead class="thead-dark">
          <th scope="col">Назва</th>
          <th scope="col">Частота</th>
          <th scope="col">Одиниця виміру</th>
          <th scope="col">Дата призначення</th>
          <th scope="col"></th>
        </thead>
        <tbody>
          @php($i = 0)
          @foreach($symptoms as $symptom)
          <tr>
            <td align="center">{{ $symptom->name }}</td>
            <td align="center">{{ $amount[$i]->amount }}</td>
            <td align="center">{{ $symptom->unit_of_measure }}</td>
            <td align="center">{{ $date_plan[$i]->date_plan }}</td>
            <td>
              <div class="d-flex inline">
                <a class="btn btn-primary mr-2" role="button"
                 href="/patient/{{ $patient->id }}/symptom/{{ $symptom->id}}/edit">
                 Редактувати
                </a>
                <a class="btn btn-danger" role="button"
                 href="/patient/{{ $patient->id }}/symptom/{{ $symptom->id}}/delete">
                 Видалити
                </a>
              </div>
            </td>
          </tr>
          @php($i++)
          @endforeach
        </tbody>
      </table>
      <div class="row mt-3">
        <div class="col-12 d-flex justify-content-center">
          {{ $symptoms->links() }}
        </div>
      </div>
    </div>
    <div class="col-3">
      <h4 class="mt-2">Данні</h4>
      <div class="btn-group-vertical" role="group">
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/treatments/show">
          <span class="mx-5">Лікування</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/procedures/show">
          <span class="mx-5">Процедури</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/medicaments/show">
          <span class="mx-5">Медикаменти</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/patient/{{ $patient->id }}/diseases/show">
          <span class="mx-5">Діагнози</span>
        </a>
      </div>
    </div>
  </div>
@endsection
