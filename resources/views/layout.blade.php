<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('blog.title') }}</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    @yield('header')
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    @yield('footer')
</body>
</html>