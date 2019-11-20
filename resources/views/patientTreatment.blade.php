@extends('layouts.patientLayout')
@section('main')
<div class="container">
  <h3>Останні лікування</h3>
  <table class="table text-center table-light">
    <thead class="thead-dark">
      <th align="center" scope="col">Назва</th>
      <th scope="col">Опис</th>
      <th scope="col">Дата призначення</th>
    </thead>
    <tbody>
      @php($i = 0)
      @foreach($treatments as $treatment)
      <tr>
        <td align="center">{{ $treatment->name }}</td>
        <td align="center">{{ $treatment->description }}</td>
        <td align="center">{{ date('d-m-Y H:i', strtotime($date_plan[$i]->date_plan)) }}</td>
      </tr>
      @php($i++)
      @endforeach
    </tbody>
  </table>
  <div class="row mt-3">
    <div class="col-12 d-flex justify-content-center">
      {{ $treatments->links() }}
    </div>
  </div>
</div>
@endsection
