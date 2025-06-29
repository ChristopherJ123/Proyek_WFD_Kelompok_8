<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>@yield('title', 'Document')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/png">
    <style>
        body {
            font-family: "Lazy Dog", sans-serif;
        }
    </style>
</head>
<body class="flex flex-col h-screen">

    @if($errors->any())
        <script>
            Swal.fire({
                title: "Error",
                text: "{{ $errors->first() }}",
                icon: "error"
            });
        </script>
    @endif

    @if(session()->has('warning'))
        <script>
            Swal.fire({
                title: "Error",
                text: "{{ session('warning') }}",
                icon: "warning"
            });
        </script>
    @endif

    @if(session()->has('success'))
        <script>
            Swal.fire({
                title: "Success",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif

    @include('components.top-navbar')

    <div class="flex h-full">
        @include('components.left-navbar')

        @yield('content')
    </div>
</body>
</html>
