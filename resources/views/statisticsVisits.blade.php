@extends('layouts.homeLayout')
@section('main')
<div class="container">
  <h2 class="text-center mb-3">Статистика візитів</h2>
  <h4>Статистика відвідування за останній тиждень</h4>
  <table class="table table-light text-center mb-4">
    <thead class="thead-dark">
      <th scope="col">День</th>
      <th scope="col">Кількість відвідувань</th>
    </thead>
    <tbody>
      @foreach($daysCount as $key => $dayCount)
      <tr>
        <td>
          {{ $key }}
        </td>
        <td>
          {{ $dayCount }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <h4>Статистика відвідування за останній місяць</h4>
  <table class="table table-light text-center">
    <thead class="thead-dark">
      <th scope="col">Місяць</th>
      <th scope="col">Кількість відвідувань</th>
    </thead>
    <tbody>
      @foreach($monthsCount as $key => $monthCount)
      <tr>
        <td>
          {{ $key }}
        </td>
        <td>
          {{ $monthCount }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
