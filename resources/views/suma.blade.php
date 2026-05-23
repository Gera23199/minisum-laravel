<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MiniSum Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">MiniSum Laravel</h3>
            <small>Sistema básico con Laravel, MVC, ORM, CSRF, validaciones y Bootstrap</small>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    <br>
                    Hola {{ session('nombre') }}, el resultado de tu suma es:
                    <strong>{{ session('resultado') }}</strong>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Revisa los datos:</strong>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('suma.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Número 1</label>
                    <input type="number" name="numero_uno" class="form-control" value="{{ old('numero_uno') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Número 2</label>
                    <input type="number" name="numero_dos" class="form-control" value="{{ old('numero_dos') }}">
                </div>

                <button type="submit" class="btn btn-primary">
                    Calcular suma
                </button>
            </form>

        </div>
    </div>

    <div class="card shadow mt-4">
        <div class="card-header">
            <h5 class="mb-0">Últimas operaciones registradas</h5>
        </div>

        <div class="card-body">

            @if($operaciones->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Número 1</th>
                            <th>Número 2</th>
                            <th>Resultado</th>
                            <th>Fecha</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($operaciones as $operacion)
                            <tr>
                                <td>{{ $operacion->nombre }}</td>
                                <td>{{ $operacion->numero_uno }}</td>
                                <td>{{ $operacion->numero_dos }}</td>
                                <td>{{ $operacion->resultado }}</td>
                                <td>{{ $operacion->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted">Todavía no hay operaciones registradas.</p>
            @endif

        </div>
    </div>

</div>

</body>
</html>