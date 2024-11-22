<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | {{ $title }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-full w-full">
    <x-header height='10vh'></x-header>


    {{-- conteúdo principal --}}
    <main class="h-[90vh] border flex flex-col items-center py-8 overflow-y-auto">
        @yield('content')
    </main>

</body>

</html>
