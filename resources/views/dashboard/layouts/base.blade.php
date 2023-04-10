<!doctype html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>پنل مدیریت - @yield('title')</title>
    @livewireStyles
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body>
  <div class="flex flex-row min-h-screen bg-gray-100 text-gray-800">
    <x-dashboard.sidebar />
    @yield('content')
  </div>
  @livewireScripts
  <script src="{{ asset('js/app.js') }}"></script>
  @stack('scripts')
</body>
</html>