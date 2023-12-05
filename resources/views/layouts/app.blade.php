<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title-block')</title>
    <link rel="icon" type="image/x-icon" href="https://static.cdninstagram.com/rsrc.php/v3/yI/r/VsNE-OHk_8a.png">
    @yield('myCss')
    @vite(['resources/sass/Scrollbar.scss'])
</head>

<body>
    @yield('content')
    @yield('myjsfile')
</body>
</html>