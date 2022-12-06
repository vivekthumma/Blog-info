
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voguish a Blogging Category Flat Bootstarp Responsive Website Template | Home :: w3layouts</title>
    <!-- google font -->
    @include('frontTheme.stayle')
</head>

<body>
    <!-- header -->
    @include('frontTheme.header')
    <!-- //header -->

    @yield('content')

    <!-- footer -->
    @include('frontTheme.footer')
    <!-- //footer -->

    <!-- Js scripts -->
    @include('frontTheme.script')
</body>

</html>