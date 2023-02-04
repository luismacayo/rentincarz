<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba de Rentincarz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container">


        <h1 class="mt-5" style="text-align: center;">Partidos para {{ $time_str }}</h1>

        <div class="row">
            <div class="col-3" style="text-align: center;">
                <a href="{{ route('today') }}" class="btn btn-primary">Hoy</a>
            </div>
            <div class="col-3" style="text-align: center;">
                <a href="{{ route('nextday') }}" class="btn btn-warning">Mañana</a>
            </div>
            <div class="col-3" style="text-align: center;">
                <a href="{{ route('week') }}" class="btn btn-danger">Semana</a>
            </div>
            <div class="col-3" style="text-align: center;">
                <a href="{{ route('past') }}" class="btn btn-secondary">Pasados</a>
            </div>
        </div>

        <table class="table">
            <thead>
              <tr>
                  <th scope="col">Fecha</th>
                  <th scope="col">Hora</th>
                  <th scope="col">Liga</th>
                <th scope="col">Equipo Home</th>
                <th scope="col">Equipo Visitante</th>
                <th scope="col">Resultado</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                <tr>
                    <th scope="row">{{ $result->match_date->format('d/m/Y') }}</th>
                    <th scope="row">{{ $result->match_date->format('h:m a') }}</th>
                    <td>
                        <img src="{{ $result->competition_emblem }}" width="25px" alt="emblema-liga" title="{{ $result->competition_name }}">
                    </td>
                    <td align="right">
                        {{ $result->hometeam_shortname }}
                        <img src="{{ $result->hometeam_crest }}" width="25px" alt="flag-hometeam" title="Bandera del {{ $result->hometeam_name }}">
                    </td>
                    <td>
                        <img src="{{ $result->awayteam_crest }}" width="25px" alt="flag-awayteam" title="Bandera del {{ $result->awayteam_name }}">
                        {{ $result->awayteam_shortname }}
                    </td>
                    <td>{{ $result->winner }}</td>
                </tr>                    
                @endforeach
            </tbody>
            <tfoot>
            </tfoot>
        </table>
        <div class="d-flex">
            {!! $results->links() !!}
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>