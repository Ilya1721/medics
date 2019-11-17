@extends('layouts.homeLayout')
@section('main')
<div class="container">
  <h2 class="text-center mb-3">Статистика візитів</h2>
  <form action="/statistics/visits/filter" method="GET" class="form-inline mb-3">
    @csrf
    <div class="input-group">
      <select name="category" class="form-control w-25">
        <option value="7">Тиждень</option>
        <option value="30">Місяць</option>
        <option value="365">Рік</option>
        <option value="all">Весь час</option>
      </select>
      <div class="input-group-append">
        <button class="btn btn-success" type="submit">Filter By<span class="glyphicon glyphicon-search"></span></button>
      </div>
    </div>
  </form>
  <h4>Статистика відвідування {{ $label }}</h4>
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
  <h4>Статистика відвідування {{ $label }} по місяцях</h4>
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
  <h4>Статистика відвідування {{ $label }} по часу візиту</h4>
  <table class="table table-light text-center">
    <thead class="thead-dark">
      <th scope="col">Час візиту</th>
      <th scope="col">Кількість відвідувань</th>
    </thead>
    <tbody>
      @foreach($timesCount as $key => $timeCount)
      <tr>
        <td>
          {{ $key }}
        </td>
        <td>
          {{ $timeCount }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
