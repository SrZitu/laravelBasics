<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>For Each Demonstration</title>
</head>
<body>
    <h1>Showing Foreach Data</h1>
    <ul>
        @foreach ($users as $user )
        <h1>Name is {{$user['name']}} and job is {{$user['job']}}</h1>
        @endforeach
    </ul>
</body>
</html>
