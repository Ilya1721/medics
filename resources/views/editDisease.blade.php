@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Register') }}</div>
        <div class="card-body">
          <form method="POST" action="/diseases/{{ $disease->id }}">
            @csrf
            @method('PATCH')

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Назва') }}</label>

              <div class="col-md-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $disease->name }}" required autocomplete="name" autofocus>

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
                  <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>

                  @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="symptom_id_array" class="col-md-4 col-form-label text-md-right">{{ __('Симптом') }}</label>
              <div class="col-md-6">
                  <select multiple id="symptom_id_array" class="form-control" @error('symptom_id_array') is-invalid @enderror name="symptom_id_array[]" autofocus>
                    @foreach($symptoms as $symptom)
                    <option value={{ $symptom->id }}>{{ $symptom->name }}</option>
                    @endforeach
                  </select>
                  @error('symptom_id_array')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="treatment_id_array[]" class="col-md-4 col-form-label text-md-right">{{ __('Лікування') }}</label>
              <div class="col-md-6">
                  <select multiple id="treatment_id_array" class="form-control" @error('treatment_id_array') is-invalid @enderror name="treatment_id_array[]" autofocus>
                    @foreach($treatments as $treatment)
                    <option value={{ $treatment->id }}>{{ $treatment->name }}</option>
                    @endforeach
                  </select>
                  @error('treatment_id_array')
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
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
