@extends('layouts.homeLayout')
@section('main')
<div class="container">
  <h2 class="text-center mb-3">Статистика процедур</h2>
  <h4>Популярність процедур</h4>
  <table class="table table-light text-center mb-4">
    <thead class="thead-dark">
      <th scope="col">Процедура</th>
      <th scope="col">Кількість призначень</th>
    </thead>
    <tbody>
      @foreach($proceduresCount as $key => $procedureCount)
      <tr>
        <td>
          {{ $key }}
        </td>
        <td>
          {{ $procedureCount }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
