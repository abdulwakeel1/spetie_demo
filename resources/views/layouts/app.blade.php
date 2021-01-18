<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.meta-css')
</head>
<body>
    <div id="app">
        @include('includes.nav-bar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>