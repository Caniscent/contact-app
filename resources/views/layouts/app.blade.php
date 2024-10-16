<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @if(!Route::is('login','register'))
    @include('layouts.navbar')

    @include('layouts.sidebar')
    @endif

    <main class="flex-1 p-4">
        @yield('content')
    </main>

</body>
</html>
