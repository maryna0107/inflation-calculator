<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,200..700,0..1,-50..200" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body class="homepage-style">

<section class="main">
    <div class="container py-5">
        <form method="POST" action="{{ route('homepage.calculate') }}">
            @csrf
            <div class="row py-5">
                <div class="col-lg-6 pt-10 text-center">
                    <h1>Suma
                        <input id="suma" type="text" name="suma" value="{{ old('suma') }}">
                    </h1>
                </div>
            </div>

            <div class="row py-5">
                <div class="col-lg-6 pt-10 text-center">
                    <h1>Inflation
                        <input id="inflation" type="text" name="inflation" value="{{ old('inflation') }}">
                    </h1>
                </div>
            </div>

            <div class="row py-5">
                <div class="col-lg-6 pt-10 text-center">
                    <button id="calculate" type="submit" class="btn btn-primary">Calculate</button>
                </div>
            </div>
        </form>

        @if (!empty($results) && !isset($results['error']))
        <div class="container py-5">
            <div class="table">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Year</th>
                        <th>Suma (Adjusted)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($results as $year => $adjustedSuma)
                    <tr>
                        <td>{{ $year }}</td>
                        <td>{{ number_format($adjustedSuma, 2) }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @elseif (isset($results['error']))
        <div class="alert alert-danger">
            {{ $results['error'] }}
        </div>
        @endif

    </div>
</section>

</body>
</html>
