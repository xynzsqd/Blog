<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} - @yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body class="d-flex flex-column min-vh-100">
    @include('partials.header')
    <main class="flex-grow-1">
        @yield('main')
    </main>
    @include('partials.footer')
</body>

</html>
