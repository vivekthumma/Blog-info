<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    {{-- style --}}
      @include('adminTheme.style')
      @yield('style')
    {{-- style --}}
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    {{-- header --}}
      @include('adminTheme.header')
    {{-- header --}}

    {{-- sidebar  --}}
      @include('adminTheme.sidebar')
    {{-- sidebar  --}}

    {{-- content  --}}
      <div class="content-wrapper">
        @yield('content')
      </div>
    {{-- content  --}}

    {{-- footer --}}
      @include('adminTheme.footer')
    {{-- footer --}}

    {{-- script --}}
      @include('adminTheme.script')
      @yield('script')
    {{-- script --}}
</body>
</html>
