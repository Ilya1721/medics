@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Вказати показник') }}</div>
        <div class="card-body">
          <form method="POST" action="/patient/{{ $patient->id }}/data">
            @csrf

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Назва') }}</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="value" class="col-md-4 col-form-label text-md-right">{{ __('Значення') }}</label>

              <div class="col-md-6">
                  <input id="value" type="name" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ old('value') }}" required autocomplete="value" autofocus>

                  @error('value')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="unit_of_measure" class="col-md-4 col-form-label text-md-right">{{ __('Одиниця вимірювання') }}</label>

              <div class="col-md-6">
                  <input id="unit_of_measure" type="name" class="form-control @error('unit_of_measure') is-invalid @enderror" name="unit_of_measure" value="{{ old('unit_of_measure') }}" required autocomplete="unit_of_measure" autofocus>

                  @error('unit_of_measure')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="date_plan" class="col-md-4 col-form-label text-md-right">{{ __('Дата назначення') }}</label>
              <div class="col-md-6">
                  <input id="date_plan" name="date_plan" type="datetime-local" value="2019-10-12T13:45:00" class="form-control" />
                  @error('date_plan')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      {{ __('Register') }}
                  </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
