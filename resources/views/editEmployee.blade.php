@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Edit Employee') }}</div>
        <div class="card-body">
          <form method="POST" action="/home/{{ $employee->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group row">
              <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Прізвище') }}</label>

              <div class="col-md-6">
                  <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name')  ?? $employee->last_name }}" required autocomplete="last_name" autofocus>

                  @error('last_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Імя') }}</label>

              <div class="col-md-6">
                  <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') ?? $employee->first_name }}" required autocomplete="first_name" autofocus>

                  @error('first_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="father_name" class="col-md-4 col-form-label text-md-right">{{ __('По-батькові') }}</label>

              <div class="col-md-6">
                  <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') ?? $employee->father_name }}" required autocomplete="father_name" autofocus>

                  @error('father_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="city_id" class="col-md-4 col-form-label text-md-right">{{ __('Місто') }}</label>
              <div class="col-md-6">
                  <select id="city_id" class="form-control" @error('city_id') is-invalid @enderror name="city_id" required autofocus>
                    @foreach($cities as $city)
                    <option value={{ $city->id }}>{{ $city->name }}</option>
                    @endforeach
                  </select>
                  @error('city_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Вулиця') }}</label>

              <div class="col-md-6">
                  <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') ?? $employee->street }}" required autocomplete="street" autofocus>

                  @error('street')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="house" class="col-md-4 col-form-label text-md-right">{{ __('Будинок') }}</label>

              <div class="col-md-6">
                  <input id="house" type="text" class="form-control @error('house') is-invalid @enderror" name="house" value="{{ old('house') ?? $employee->house }}" required autocomplete="house" autofocus>

                  @error('house')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="flat" class="col-md-4 col-form-label text-md-right">{{ __('Квартира') }}</label>

              <div class="col-md-6">
                  <input id="flat" type="text" class="form-control @error('flat') is-invalid @enderror" name="flat" value="{{ old('flat') ?? $employee->flat }}" required autocomplete="flat" autofocus>

                  @error('flat')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Номер телефону') }}</label>

              <div class="col-md-6">
                  <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') ?? $employee->phone_number }}" required autocomplete="phone_number" autofocus>

                  @error('phone_number')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="job_id" class="col-md-4 col-form-label text-md-right">{{ __('Посада') }}</label>
              <div class="col-md-6">
                  <select id="job_id" class="form-control" @error('job_id') is-invalid @enderror name="job_id" required autofocus>
                    @foreach($jobs as $job)
                    <option value={{ $job->id }}>{{ $job->name }}</option>
                    @endforeach
                  </select>
                  @error('job_id')
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

            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Фото') }}</label>

                <div class="col-md-6">
                    <input id="image" type="file" class="form-control-file" name="image">

                    @error('image')
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
