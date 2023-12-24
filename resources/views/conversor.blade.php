<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moneda</title>

    <!-- Si estás usando Bootstrap, incluye los estilos aquí -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <h1 class="mb-4">Conversor de Moneda</h1>

        <form action="{{ route('convertir') }}" method="post" class="mb-4">
            @csrf
            <div class="form-group">
                <label for="monto">Ingrese el monto en dólares:</label>
                <input type="text" name="monto" id="monto" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Convertir</button>
        </form>

        @if(isset($montoConvertido))
            <p class="lead">El monto convertido es: {{ $montoConvertido }} pesos.</p>
        @endif
    </div>

    <!-- Si estás usando Bootstrap, incluye los scripts aquí -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
