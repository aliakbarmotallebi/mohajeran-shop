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
      [x-cloak] { display: none; }
    </style>
</head>
<body>
  <div 
    x-data="sidebar"
    class="flex min-h-screen bg-white text-gray-800"
    @resize.window="handleResize()" >
    <x-dashboard.sidebar />
    <div class="bg-neutral-100 w-full">
    @yield('content')
    </div>
  </div>
  @livewireScripts
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script>
    function sidebar() {
      const breakpoint = 1280
      return {
        open: {
          above: true,
          below: false,
        },
        isAboveBreakpoint: window.innerWidth > breakpoint,

        handleResize() {
          this.isAboveBreakpoint = window.innerWidth > breakpoint
        },

        isOpen() {
          if (this.isAboveBreakpoint) {
            return this.open.above
          }
          return this.open.below
        },
        handleOpen() {
          if (this.isAboveBreakpoint) {
            this.open.above = true
          }
          this.open.below = true
        },
        handleClose() {
          if (this.isAboveBreakpoint) {
            this.open.above = false
          }
          this.open.below = false
        },
        handleAway() {
          if (!this.isAboveBreakpoint) {
            this.open.below = false
          }
        },
      }
    }
  </script>
  @stack('scripts')
</body>
</html>