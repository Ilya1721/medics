@extends('layouts.homeLayout')
@section('main')
<div class="container">
  <h2 class="text-center mb-3">Статистика симптомів</h2>
  <h4>Популярність симптомів</h4>
  <table class="table table-light text-center mb-4">
    <thead class="thead-dark">
      <th scope="col">Симптом</th>
      <th scope="col">Кількість випадків</th>
    </thead>
    <tbody>
      @foreach($symptomsCount as $key => $symptomCount)
      <tr>
        <td>
          {{ $key }}
        </td>
        <td>
          {{ $symptomCount }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
