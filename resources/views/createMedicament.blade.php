@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Register Medicament') }}</div>
        <div class="card-body">
          <form method="POST" action="/medicaments">
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
              <label for="manufactor" class="col-md-4 col-form-label text-md-right">{{ __('Виробник') }}</label>

              <div class="col-md-6">
                <div id="manufactors">
                  <input id="manufactor" type="text" class="form-control @error('manufactor') is-invalid @enderror"
                   name="manufactor[]" description="{{ old('manufactor') }}" required autocomplete="manufactor" autofocus>
                  <input id="country" type="text" class="mt-2 form-control @error('country') is-invalid @enderror"
                   name="country[]" description="{{ old('country') }}" required autocomplete="country" autofocus placeholder="Країна">
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <button class="btn btn-info" onClick="moreManufactors()" type="button">Більше виробників</button>
                  </div>
                  <div class="col">
                    <button class="btn btn-danger" onClick="lessManufactors()" type="button">Менше виробників</button>
                  </div>
                </div>
                  @error('name')
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
                  <a href="/medicaments/show" class="btn btn-danger" role="button">
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
<script>
  function moreManufactors()
  {
    var manufactor = document.createElement('input');
    manufactor.className = "form-control @error('manufactor') is-invalid @enderror mt-2";
    manufactor.id = "manufactor";
    manufactor.type = "text";
    manufactor.setAttribute("name", "manufactor[]");
    manufactor.setAttribute("required", "required");
    manufactor.setAttribute("value", "{{ old('manufactor') }}");
    manufactor.setAttribute("autocomplete", "manufactor");
    manufactor.setAttribute("autofocus", "autofocus");

    var country = document.createElement('input');
    country.className = "form-control @error('country') is-invalid @enderror mt-2";
    country.id = "country";
    country.type = "text";
    country.setAttribute("name", "country[]");
    country.setAttribute("required", "required");
    country.setAttribute("value", "{{ old('country') }}");
    country.setAttribute("autocomplete", "country");
    country.setAttribute("autofocus", "autofocus");
    country.setAttribute("placeholder", "Країна");

    var div = document.getElementById('manufactors')
    div.appendChild(manufactor);
    div.appendChild(country);
  }

  function lessManufactors()
  {
    if(document.getElementById('manufactors').childElementCount / 2 > 1)
    {
      var country = document.getElementById('manufactors').lastChild;
      country.remove();
      var manufactor = document.getElementById('manufactors').lastChild;
      manufactor.remove();
    }
  }
</script>
@endsection
