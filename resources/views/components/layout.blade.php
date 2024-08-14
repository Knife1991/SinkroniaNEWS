<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SinkroniaTask</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen">

    <x-navbar :categories="$categories"/>

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <x-footer/>
</body>
</html>
