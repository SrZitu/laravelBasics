<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>For Each Demonstration</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h1>Showing Foreach Data</h1>
                <ul>
                    @foreach ($users as $user)
                        <h1>Name is {{ $user['name'] }} and job is {{ $user['job'] }}</h1>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-md-6">
                <h1>Showing Asset(image)</h1>
                <img src="{{ asset('images/laravel10.jpg') }}" alt="asset image not found">
                <button class="btn btn-danger">Add</button>
            </div>
        </div>

    </div>



    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
