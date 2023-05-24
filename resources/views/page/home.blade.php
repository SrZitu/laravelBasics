<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blade Learning</title>
</head>

<body>
    @if ($result == 100)
        <h1>Result is 100</h1>
    @elseif ($result == 1000)
        <h1>result is 1000</h1>
    @elseif ($result == 100000)
        <h1>result is 1 lackh</h1>
    @else
        <h1>No match found</h1>
    @endif
    <h1>{{ $result }}</h1>

    <h1>Result From Switch Statement</h1>
    @switch($result)
        @case(100)
            <h1>Result is 100</h1>
        @break

        @case(1000)
            <h1>Result is 1000</h1>
        @break

        @case(100000)
            <h1>Result is 1 lakh</h1>
        @break

        @default
            <h1>No match found</h1>
    @endswitch
</body>

</html>
