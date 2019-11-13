@extends('layouts.homeLayout')
@section('main')
<div class="container">
  <h2 class="text-center mb-3">Статистика діагнозів</h2>
  <h4>Популярність діагнозів</h4>
  <table class="table table-light text-center mb-4">
    <thead class="thead-dark">
      <th scope="col">Діагноз</th>
      <th scope="col">Кількість випадків</th>
    </thead>
    <tbody>
      @foreach($diseasesCount as $key => $diseaseCount)
      <tr>
        <td>
          {{ $key }}
        </td>
        <td>
          {{ $diseaseCount }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
