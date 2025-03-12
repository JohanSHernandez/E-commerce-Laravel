<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        @if (@isset($header))
            <header class="bg-white shadow">
                <div class= "max-w-7x1 mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
                        
        @endif

        <main>
            @yield('content')
        </main>
        @include('layouts.footer')
    </div>

    @if (@session('success'))
        <div id='flash-message' class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementByID('flash-message').style.display ='none';
            }, 3000);
        </script>        
    @endif    
</body>
</html>