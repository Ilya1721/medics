@extends('layouts.homeLayout')
@section('main')
<div class="container">
  <h2 class="text-center mb-3">Статистика кабінетів</h2>
  <h4>Популярність кабінетів</h4>
  <table class="table table-light text-center mb-4">
    <thead class="thead-dark">
      <th scope="col">Кабінет</th>
      <th scope="col">Кількість відвідувань</th>
    </thead>
    <tbody>
      @foreach($roomsCount as $key => $roomCount)
      <tr>
        <td>
          {{ $key }}
        </td>
        <td>
          {{ $roomCount }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
