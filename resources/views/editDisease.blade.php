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
              <label for="symptom_array" class="col-md-4 col-form-label text-md-right">{{ __('Симптоми') }}</label>
              <div class="col-md-6">
                <div id="symptoms">
                  @foreach($symptoms as $symptom)
                  <input id="symptom_array" type="text" class="mt-2 form-control @error('symptom_array') is-invalid @enderror"
                  name="symptom_array[]" required value="{{ old('symptom_array') ?? $symptom->name }}" autocomplete="symptom_array" autofocus>
                  <input id="unit_of_measure" type="text" class="mt-2 form-control @error('unit_of_measure') is-invalid @enderror"
                   name="unit_of_measure[]" value="{{ old('unit_of_measure') ?? $symptom->unit_of_measure }}"
                   required autocomplete="unit_of_measure" autofocus placeholder="Одиниця вимірювання">
                   @endforeach
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <button class="btn btn-info" onClick="Symptom.moreSymptoms()">Більше симптомів</button>
                  </div>
                  <div class="col">
                    <button class="btn btn-danger" onClick="Symptom.lessSymptoms()">Менше симптомів</button>
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
                <div id="treatments">
                  @foreach($treatments as $treatment)
                  <input id="treatment_array" type="text" class="mt-2 form-control @error('treatment_array') is-invalid @enderror"
                  name="treatment_array[]" required value="{{ old('treatment_array') ?? $treatment->name }}"
                  autocomplete="treatment_array" autofocus>
                  @endforeach
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <button class="btn btn-info" onClick="Treatment.moreTreatments()">Більше лікувань</button>
                  </div>
                  <div class="col">
                    <button class="btn btn-danger" onClick="Treatment.lessTreatments()">Менше лікувань</button>
                  </div>
                </div>
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
<script>
class Symptom
{
  constructor(count)
  {
    this.count = 0;
  }

  static moreSymptoms()
  {
    var input = document.createElement('input');
    input.className = "form-control @error('symptom_array') is-invalid @enderror mt-2";
    input.id = "symptom_array";
    input.type = "text";
    input.setAttribute("name", "symptom_array[]");
    input.setAttribute("required", "required");
    input.setAttribute("value", "{{ old('symptom_array') }}");
    input.setAttribute("autocomplete", "symptom_array");
    input.setAttribute("autofocus", "autofocus");

    var unit = document.createElement('input');
    unit.className = "form-control @error('unit_of_measure') is-invalid @enderror mt-2";
    unit.id = "unit_of_measure";
    unit.type = "text";
    unit.setAttribute("name", "unit_of_measure[]");
    unit.setAttribute("required", "required");
    unit.setAttribute("value", "{{ old('unit_of_measure') }}");
    unit.setAttribute("autocomplete", "unit_of_measure");
    unit.setAttribute("autofocus", "autofocus");
    unit.setAttribute("placeholder", "Одиниця вимірювання");

    var div = document.getElementById('symptoms')
    div.appendChild(input);
    div.appendChild(unit);

    this.count++;
  }

  static lessSymptoms()
  {
    var input = document.getElementById('symptom_array');
    var unit = document.getElementById('unit_of_measure');
    input.remove();
    unit.remove();

    if(this.count != 0)
    {
      this.count--;
    }
  }
}

class Treatment
{
  constructor(count)
  {
    this.count = 0;
  }

  static moreTreatments()
  {
    var input = document.createElement('input');
    input.className = "form-control @error('treatment_array') is-invalid @enderror mt-2";
    input.id = "treatment_array";
    input.type = "text";
    input.setAttribute("name", "treatment_array[]");
    input.setAttribute("required", "required");
    input.setAttribute("value", "{{ old('treatment_array') }}");
    input.setAttribute("autocomplete", "treatment_array");
    input.setAttribute("autofocus", "autofocus");

    var div = document.getElementById('treatments')
    div.appendChild(input);
    this.count++;
  }

  static lessTreatments()
  {
    var input = document.getElementById('treatment_array');
    input.remove();
    if(this.count != 0)
    {
      this.count--;
    }
  }
}
</script>
@endsection
