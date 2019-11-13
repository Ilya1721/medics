@extends('layouts.homeLayout')
@section('main')
<div class="container">
  <h2 class="text-center mb-3">Статистика Схем лікувань</h2>
  <h4>Популярність схем лікувань</h4>
  <table class="table table-light text-center mb-4">
    <thead class="thead-dark">
      <th scope="col">Схема лікувань</th>
      <th scope="col">Кількість призначень</th>
    </thead>
    <tbody>
      @foreach($treatmentsCount as $key => $treatmentCount)
      <tr>
        <td>
          {{ $key }}
        </td>
        <td>
          {{ $treatmentCount }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
