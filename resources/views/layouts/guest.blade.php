<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="{{ asset('storage/images/logo.png') }}" type="image/png">

    {{-- Tom Select CSS--}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>@yield('title', 'Document')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* TOM SELECT IS CSS OVERRIDE */

        .ts-wrapper.single .ts-control,
        .ts-wrapper.multi .ts-control {
            font-size: 1.75rem !important; /* ~text-xl */
            padding: 0.5rem 0.75rem;
            background-color: #b2935b !important
        }

        .ts-dropdown .option {
            font-size: 1.25rem !important;
        }

        .ts-wrapper .item {
            font-size: 1.1rem !important;
            padding: 0.25rem 0.5rem;
            border: none
        }

        .ts-wrapper ::placeholder {
            font-size: 1.25rem
        }

        body {
            font-family: "Lazy Dog", sans-serif;
        }
    </style>
</head>
<body style="background-image: url('{{ asset('storage/logo.png') }}');" class="flex items-center justify-center min-h-screen bg-repeat bg-[length:75px_75px] bg-[position:top_left] bg-brand-300 backdrop-brightness-50">
    @if($errors->any())
        <script>
            Swal.fire({
                title: "Error",
                text: "{{ $errors->first() }}",
                icon: "error"
            });
        </script>
    @endif

    <div class="bg-brand-300 p-8 rounded-xl shadow-md w-full max-w-md">
        @yield('content')
    </div>
    {{-- Tom Select JS --}}
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
</body>
</html>
