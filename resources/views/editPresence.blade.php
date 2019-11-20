@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Edit Presence') }}</div>
        <div class="card-body">
          <form method="POST" action="/presence/{{ $presence->id }}">
            @csrf
            @method('PATCH')

            <div class="form-group row">
              <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Прізвище') }}</label>

              <div class="col-md-6">
                  <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                   name="last_name" value="{{ old('last_name') ?? $presence->patient->last_name }}" required autocomplete="last_name" autofocus>

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
                   name="first_name" value="{{ old('first_name') ?? $presence->patient->first_name }}" required autocomplete="first_name" autofocus>

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
                   name="father_name" value="{{ old('father_name') ?? $presence->patient->father_name }}" required autocomplete="father_name" autofocus>

                  @error('father_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="room_id" class="col-md-4 col-form-label text-md-right">{{ __('Номер палати') }}</label>
              <div class="col-md-6">
                  <select id="room_id" class="form-control" @error('room_id') is-invalid @enderror name="room_id" required autofocus>
                    @foreach($rooms as $room)
                    <option value={{ $room->id }}>{{ $room->number }}</option>
                    @endforeach
                  </select>
                  @error('room_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="doctor_id" class="col-md-4 col-form-label text-md-right">{{ __('Доктор') }}</label>
              <div class="col-md-6">
                  <select id="doctor_id" class="form-control" @error('doctor_id') is-invalid @enderror name="doctor_id" required autofocus>
                    @foreach($doctors as $doctor)
                    <option value={{ $doctor->id }}>{{ $doctor->last_name }} {{ $doctor->first_name }} {{ $doctor->father_name }}</option>
                    @endforeach
                  </select>
                  @error('doctor_id')
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
                  <input id="street" type="text" class="form-control @error('street') is-invalid @enderror"
                   name="street" value="{{ old('street') ?? $presence->patient->street }}" required autocomplete="street" autofocus>

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
                   name="house" value="{{ old('house') ?? $presence->patient->house }}" required autocomplete="house" autofocus>

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
                     name="flat" value="{{ old('flat') ?? $presence->patient->flat }}" required autocomplete="flat" autofocus>

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
                   name="phone_number" value="{{ old('phone_number') ?? $presence->patient->phone_number }}"
                   required autocomplete="phone_number" autofocus>

                  @error('phone_number')
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
                  <a href="/home" class="btn btn-danger" role="button">
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
