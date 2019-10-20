@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Register') }}</div>
        <div class="card-body">
          <form method="POST" action="/disease">
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
              <label for="symptom_array" class="col-md-4 col-form-label text-md-right">{{ __('Симптоми') }}</label>
              <div class="col-md-6">
                <div id="symptoms">
                  <input id="symptom_array" type="text" class="form-control @error('symptom_array') is-invalid @enderror"
                  name="symptom_array[]" required value="{{ old('symptom_array') }}" autocomplete="symptom_array" autofocus>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <button class="btn btn-info" onClick="moreSymptoms()">Більше симптомів</button>
                  </div>
                  <div class="col">
                    <button class="btn btn-danger ml-1" onClick="lessSymptoms()">Менше симптомів</button>
                  </div>
                </div>
                @error('symptom_array')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="treatment_id_array" class="col-md-4 col-form-label text-md-right">{{ __('Лікування') }}</label>
              <div class="col-md-6">
                  <select multiple id="treatment_id_array" class="form-control" @error('treatment_id_array') is-invalid @enderror name="treatment_id_array[]" required autofocus>
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
<script>
  function moreSymptoms()
  {
    var input = document.createElement('input');
    input.className = "form-control @error('symptom_array') is-invalid @enderror";
    input.id = "symptom_array";
    input.type = "text";
    input.setAttribute("name", "symptom_array[]");
    input.setAttribute("required", "required");
    input.setAttribute("value", "{{ old('symptom_array') }}");
    input.setAttribute("autocomplete", "symptom_array");
    input.setAttribute("autofocus", "autofocus");

    var div = document.getElementById('symptoms')
    div.appendChild(input);
  }

  function lessSymptoms()
  {
    var input = document.getElementById('symptom_array');
    input.remove();
  }
</script>
@endsection
