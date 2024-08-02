<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel 10: Task List App</title>
    @yield('styles')
</head>

<body>
    <h1>@yield('title')</h1>
    @if (session()->has('success'))
        <div>{{ session('success') }}</div>
    @endif
    <div>
        @yield('content')
    </div>
</body>

</html>
