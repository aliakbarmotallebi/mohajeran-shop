<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>@yield('title')</title>
    @livewireStyles
</head>

<body>
    @yield('content') @livewireScripts
    <x-livewire-alert::scripts />
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>