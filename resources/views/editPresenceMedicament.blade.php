@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Edit medicament') }}</div>
        <div class="card-body">
          <form method="POST" action="/presence/{{ $presence->id }}/medicament/{{ $medicament->id }}">
            @csrf
            @method('PATCH')

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Назва') }}</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   name="name" value="{{ old('name') ?? $medicament->name }}"
                   required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Кількість') }}</label>

              <div class="col-md-6">
                  <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror"
                   name="amount" value="{{ old('amount') ?? $amount }}" required autocomplete="amount" autofocus>

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
                  <input id="unit_of_measure" type="text" class="form-control @error('unit_of_measure') is-invalid @enderror"
                   name="unit_of_measure" value="{{ old('unit_of_measure') ?? $medicament->unit_of_measure }}"
                   required autocomplete="unit_of_measure" autofocus>

                  @error('unit_of_measure')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                      {{ __('Submit') }}
                  </button>
                  <a href="/presence/{{ $presence->id }}/medicaments/show" class="btn btn-danger" role="button">
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
