<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game Web</title>
    @stack('styles')
</head>
<body>
    <h1 style="margin-bottom: 30px">Day la header</h1>

    <div class="main">
        @yield('main')
    </div>

    <h1 style="margin-top: 30px">Day la footer</h1>

    @stack('script')
</body>
</html>