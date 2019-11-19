@extends('layouts.presenceLayout')
@section('main')
<div class="container">
  <h3>Останні діагнози</h3>
  <a class="btn btn-primary mb-3" role="button" href="/presence/{{ $presence->id }}/disease/create">
    Додати діагноз
  </a>
  <table class="table text-center table-light">
    <thead class="thead-dark">
      <th scope="col">Назва</th>
      <th scope="col">Опис</th>
      <th scope="col">Дата призначення</th>
      <th scope="col"></th>
    </thead>
    <tbody>
      @php($i = 0)
      @foreach($diseases as $disease)
      <tr>
        <td align="center">{{ $disease->name }}</td>
        <td align="center">{{ $disease->description }}</td>
        <td align="center">{{ date('d-m-Y H:i', strtotime($date_plan[$i]->date_scheduled)) }}</td>
        <td>
          <div class="d-flex inline">
            <a class="btn btn-primary mr-2" role="button"
             href="/presence/{{ $presence->id }}/disease/{{ $disease->id}}/edit">
             Редагувати
            </a>
            <a class="btn btn-danger" role="button"
             href="/presence/{{ $presence->id }}/disease/{{ $disease->id}}/delete">
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
      {{ $diseases->links() }}
    </div>
  </div>
</div>
@endsection
