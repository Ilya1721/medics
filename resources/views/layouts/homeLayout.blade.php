@extends('layouts.app')
@section('content')
<div class="row mx-4">
  <div class="col-2 text-left">
    <div class="my-3 ml-5">
      <img src="/storage/{{ $user->employee->image }}" />
    </div>
    <hr/>
    <h5 class="mt-3" style="font-size: 1.1rem;">Ви увійшли як {{ $user->employee->job->name }}</h5>
    <hr/>
    <h4>{{ $user->employee->last_name }} {{ $user->employee->first_name }} {{ $user->employee->father_name }}</h4>
    <div class="btn-group-vertical" role="group">
      <a class="btn btn-outline-primary btn-lg" role="button" href="/home"><span class="mx-0">Кабінет</span></a>
      <a class="btn btn-outline-primary btn-lg" role="button" href="/personalData/show"><span class="mx-0">Особисті дані</span></a>
      <a class="btn btn-outline-primary btn-lg" role="button" href="/statistics/show"><span class="mx-5">Статистика</span></a>
      <a class="btn btn-outline-primary btn-lg" role="button" href="/innerData/show"><span class="mx-0">Внутрішні дані</span></a>
      <a class="btn btn-outline-primary btn-lg" role="button" href="/patients/show"><span class="mx-0">Пацієнти</span></a>
    </div>
  </div>
  <div class="col-8 mt-3 ml-4">
    <main class="py-4">
        @yield('main')
    </main>
  </div>
  <div class="col-2">

  </div>
</div>
@endsection
