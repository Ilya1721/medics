@extends('layouts.homeLayout')
@section('main')
  <div class="container">
    <h2 class="text-center mt-3">Статистика</h2>
    <table class="table text-center table-light">
      <thead class="thead-dark">
        <th scope="col"></th>
      </thead>
      <tbody>
        <tr>
          <td>
            <a href="/statistics/visits/show" class="btn btn-link">Візити</a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="/statistics/diseases/show" class="btn btn-link">Діагнози</a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="/statistics/symptoms/show" class="btn btn-link">Симптоми</a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="/statistics/medicaments/show" class="btn btn-link">Медикаменти</a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="/statistics/treatments/show" class="btn btn-link">Схеми лікувань</a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="/statistics/procedures/show" class="btn btn-link">Процедури</a>
          </td>
        </tr>
        <tr>
          <td>
            <a href="/statistics/rooms/show" class="btn btn-link">Палати</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection
