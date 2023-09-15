<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {};
        window.Laravel.request_shift_post_url = "{{ route('api.create_request_shift') }}";
        window.Laravel.request_shift_get_url = "{{ route('api.get_request_shift') }}";
        window.Laravel.confirm_shift_get_url = "{{ route('api.get_confirm_shift') }}";
        window.Laravel.confirm_shift_post_url = "{{ route('api.create_confirm_shift') }}";
        
    </script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('resources')


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div id="app">
        @component('components.header')
        @endcomponent

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
