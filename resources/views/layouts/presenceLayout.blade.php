@extends('layouts.app')
@section('content')
  <div class="row mx-4">
    <div class="col-2">
      <div class="btn-group-vertical" role="group">
        <a class="btn btn-outline-primary btn-lg" role="button" href="/presence/{{ $presence->id }}/show">
          <span class="mx-5">Дані візиту</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/presence/{{ $presence->patient->id }}/symptoms/show">
          <span class="mx-5">Симптоми</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/presence/{{ $presence->patient->id }}/treatments/show">
          <span class="mx-5">Лікування</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/presence/{{ $presence->patient->id }}/procedures/show">
          <span class="mx-5">Процедури</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/presence/{{ $presence->patient->id }}/medicaments/show">
          <span class="mx-5">Медикаменти</span>
        </a>
        <a class="btn btn-outline-primary btn-lg" role="button" href="/presence/{{ $presence->patient->id }}/diseases/show">
          <span class="mx-5">Діагнози</span>
        </a>
      </div>
    </div>
    <div class="col-8 ml-4">
      <main class="py-4">
          @yield('main')
      </main>
    </div>
    <div class="col-2">

    </div>
  </div>
@endsection
