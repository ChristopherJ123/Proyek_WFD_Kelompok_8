<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>@yield('title', 'Document')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: "Lazy Dog", sans-serif;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-[url('/public/logo.png')] bg-repeat bg-[length:75px_75px] bg-[position:top_left] bg-brand-300 backdrop-brightness-50">
    <div class="bg-brand-300 p-8 rounded-xl shadow-md w-full max-w-md">
        @yield('content')
    </div>
</body>
</html>
