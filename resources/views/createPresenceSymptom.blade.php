@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Вказати симптом') }}</div>
        <div class="card-body">
          <form method="POST" action="/presence/{{ $presence->id }}/symptom">
            @csrf

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Назва') }}</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" description="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Опис') }}</label>

              <div class="col-md-6">
                  <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                   name="description" description="{{ old('description') }}" autocomplete="description" autofocus></textarea>

                  @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Кількість') }}</label>

              <div class="col-md-6">
                  <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                  @error('amount')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="unit_of_measure" class="col-md-4 col-form-label text-md-right">{{ __('Одиниця виміру') }}</label>

              <div class="col-md-6">
                  <input id="unit_of_measure" type="text" class="form-control @error('unit_of_measure') is-invalid @enderror" name="unit_of_measure" value="{{ old('unit_of_measure') }}" required autocomplete="unit_of_measure" autofocus>

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
                  <input id="date_plan" name="date_plan" type="datetime-local" class="form-control" />
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
                  <a href="/presence/{{ $presence->id }}/symptoms/show" class="btn btn-danger" role="button">
                    Cancel
                  </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
