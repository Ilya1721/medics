@extends('layouts.presenceLayout')
@section('main')
<div class="container">
  <h3>Останні процедури</h3>
  <a class="btn btn-primary mb-3" role="button" href="/patient/{{ $patient->id }}/procedure/create">
    Додати процедуру
  </a>
  <table class="table table-light text-center">
    <thead class="thead-dark">
      <th scope="col">Назва</th>
      <th scope="col">Опис</th>
      <th scope="col">Кількість</th>
      <th scope="col">Одиниця виміру</th>
      <th scope="col">Дата призначення</th>
      <th scope="col"></th>
    </thead>
    <tbody>
      @php($i = 0)
      @foreach($patient->procedures as $procedure)
      <tr>
        <td align="center">{{ $procedure->name }}</td>
        <td align="center">{{ $procedure->description }}</td>
        <td align="center">{{ $amount[$i]->amount }}</td>
        <td align="center">{{ $procedure->unit_of_measure }}</td>
        <td align="center">{{ $date_plan[$i]->date_plan }}</td>
        <td>
          <div class="d-flex inline">
            <a class="btn btn-primary mr-2" role="button"
             href="/patient/{{ $patient->id }}/procedure/{{ $procedure->id}}/edit">
             Редактувати
            </a>
            <a class="btn btn-danger" role="button"
             href="/patient/{{ $patient->id }}/procedure/{{ $procedure->id}}/delete">
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
      {{ $procedures->links() }}
    </div>
  </div>
</div>
@endsection
