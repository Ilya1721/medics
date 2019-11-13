@extends('layouts.homeLayout')
@section('main')
<div class="container">
  <h2 class="text-center mb-3">Статистика медикаментів</h2>
  <h4>Популярність медикаментів</h4>
  <table class="table table-light text-center mb-4">
    <thead class="thead-dark">
      <th scope="col">Медикамент</th>
      <th scope="col">Кількість призначень</th>
    </thead>
    <tbody>
      @foreach($medicamentsCount as $key => $medicamentCount)
      <tr>
        <td>
          {{ $key }}
        </td>
        <td>
          {{ $medicamentCount }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
