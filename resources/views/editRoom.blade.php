@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Edit Room') }}</div>
        <div class="card-body">
          <form method="POST" action="/rooms/{{ $room->id }}">
            @csrf
            @method('PATCH')

            <div class="form-group row">
              <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Номер палати') }}</label>

              <div class="col-md-6">
                  <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number"
                   value="{{ old('number') ?? $room->number }}" required autocomplete="number" autofocus>

                  @error('number')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="capacity" class="col-md-4 col-form-label text-md-right">{{ __('Вмістимість') }}</label>

              <div class="col-md-6">
                  <input id="capacity" type="text" class="form-control @error('capacity') is-invalid @enderror"
                   name="capacity" value="{{ old('capacity') ?? $room->capacity }}"
                   required autocomplete="capacity" autofocus>

                  @error('capacity')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="department_id" class="col-md-4 col-form-label text-md-right">{{ __('Відділ') }}</label>
              <div class="col-md-6">
                  <select id="department_id" class="form-control" @error('department_id') is-invalid @enderror name="department_id" required autofocus>
                    @foreach($departments as $department)
                    <option value={{ $department->id }}>{{ $department->name }}</option>
                    @endforeach
                  </select>
                  @error('department_id')
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
                  <a href="/rooms/show" class="btn btn-danger" role="button">
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
