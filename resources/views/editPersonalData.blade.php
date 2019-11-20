@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Редагувати Особисту інформацію') }}</div>
        <div class="card-body">
          <form method="POST" action="/personalData" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Login') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                     value="{{ old('name') ?? $user->name  }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Прізвище') }}</label>

                <div class="col-md-6">
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                     name="last_name" value="{{ old('last_name') ?? $user->employee->last_name }}" required autocomplete="last_name" autofocus>

                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Ім`я') }}</label>

                <div class="col-md-6">
                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                     name="first_name" value="{{ old('first_name') ?? $user->employee->first_name }}" required autocomplete="first_name" autofocus>

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
                    <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror"
                     name="father_name" value="{{ old('father_name') ?? $user->employee->father_name }}" required autocomplete="father_name" autofocus>

                    @error('father_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="about" class="col-md-4 col-form-label text-md-right">{{ __('Про себе') }}</label>

                <div class="col-md-6">
                    <textarea id="about" type="text" class="form-control @error('about') is-invalid @enderror"
                     name="about" autocomplete="about" autofocus>{{ old('about') ?? $user->employee->about }}
                    </textarea>

                    @error('about')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Місто') }}</label>

                <div class="col-md-6">
                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                     name="city" value="{{ old('city') ?? $user->employee->city->name }}" required autocomplete="city" autofocus>

                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Країна') }}</label>

                <div class="col-md-6">
                    <input id="country" type="text" class="form-control @error('country') is-invalid @enderror"
                     name="country" value="{{ old('city') ?? $user->employee->city->country->name }}" required autocomplete="country" autofocus>

                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Вулиця') }}</label>

                <div class="col-md-6">
                    <input id="street" type="text" class="form-control @error('street') is-invalid @enderror"
                     name="street" value="{{ old('street') ?? $user->employee->street }}" required autocomplete="street" autofocus>

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
                    <input id="house" type="text" class="form-control @error('house') is-invalid @enderror"
                     name="house" value="{{ old('house') ?? $user->employee->house }}" required autocomplete="house" autofocus>

                    @error('house')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="flat" class="col-md-4 col-form-label text-md-right">{{ __('Номер квартири') }}</label>

                <div class="col-md-6">
                    <input id="flat" type="text" class="form-control @error('flat') is-invalid @enderror"
                     name="flat" value="{{ old('flat') ?? $user->employee->flat }}" required autocomplete="flat" autofocus>

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
                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror"
                     name="phone_number" value="{{ old('phone_number') ?? $user->employee->phone_number }}" required autocomplete="phone_number" autofocus>

                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
              <label for="clinic_id" class="col-md-4 col-form-label text-md-right">{{ __('Клініка') }}</label>
              <div class="col-md-6">
                  <select id="clinic_id" class="form-control" @error('clinic_id') is-invalid @enderror name="clinic_id" required autofocus>
                    @foreach($clinics as $clinic)
                    <option value={{ $clinic->id }}>{{ $clinic->name }}</option>
                    @endforeach
                  </select>
                  @error('clinic_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
                <label for="job" class="col-md-4 col-form-label text-md-right">{{ __('Посада') }}</label>

                <div class="col-md-6">
                    <input id="job" type="text" class="form-control @error('job') is-invalid @enderror"
                     name="job" value="{{ old('job') ?? $user->employee->job->name }}" required autocomplete="job" autofocus>

                    @error('job')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Відділ') }}</label>

                <div class="col-md-6">
                    <input id="department" type="text" class="form-control @error('department') is-invalid @enderror"
                     name="department" value="{{ old('department') ?? $user->employee->department->name }}" required autocomplete="department" autofocus>

                    @error('department')
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
                  <a href="/personalData/show" class="btn btn-danger" role="button">
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
