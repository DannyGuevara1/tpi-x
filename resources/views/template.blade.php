<!DOCTYPE html>
<html>
<head>
    <title>Shop - @yield('titlePage')</title>
    <!-- CSS only -->
    @vite(['resources/css/message.css'])
    @yield('head')
</head>
<body>
   
    @yield('content')

    @stack('customjs')
</body>
</html>