<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Medics</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </head>
    <body>
      <nav class="navbar navbar-light bg-light navbar-expand-lg">
        <div id="header" class="container">
          <div class="row w-100">
            <div class="col">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link text-secondary" href="/doctors">Лікарі <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link text-secondary" href="/clinics">Клініки <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link text-secondary" href="/welcome">Головна сторінка <span class="sr-only">(current)</span></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col">
              <form action="/clinics/filter" method="GET" class="form-inline">
                @csrf
                <div class="input-group">
                  <select name="category" class="form-control w-25">
                    <option value="name">Назва</option>
                    <option value="city">Місто</option>
                    <option value="type">Тип</option>
                  </select>
                  <input id="search" name="search" class="form-control w-50 input-group-append" type="text" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Find<span class="glyphicon glyphicon-search"></span></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </nav>
      <div class="container mt-3">
        <h3 class="text-center">Клініки</h3>
        @foreach($clinics as $clinic)
        <div class="card mt-3">
          <div class="row mt-2">
            <div class="col-2">
              <img src="/img/noImage.png" style="width: 125px; height: 150px;" />
            </div>
            <div class="col-6">
              <h4>
                {{ $clinic->name}}
              </h4>
              <p>{{ $clinic->type}}</p>
            </div>
            <div class="col-2">
              <p>{{ $clinic->street }}, {{ $clinic->house }}, {{ $clinic->city->name }}</p>
              <p>{{ $clinic->phone_number }}</p>
              <p>Пн - Пт: <span class="font-weight-bold">{{ $clinic->schedule }}</span></p>
            </div>
          </div>
        </div>
        @endforeach
        <div class="row mt-3">
          <div class="col-12 d-flex justify-content-center">
            {{ $clinics->links() }}
          </div>
        </div>
      </div>
    </body>
</html>
