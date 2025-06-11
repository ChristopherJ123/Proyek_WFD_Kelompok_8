@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <div class="flex items-center justify-center gap-4">
        <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" class="h-12 w-12">
        <h1 class="text-6xl">Register Page</h1>
    </div>
    <div>
        <form action="{{ route('register.store') }}" method="POST" class="text-2xl">
            @csrf
            {{-- Username --}}
            <div>
                <label class="block" for="username">Username</label>
                <input class="border border-brand-500 rounded-md w-full px-4 py-2 bg-brand-500" name="username" type="text" required placeholder="username">
            </div>
            {{-- Email --}}
            <div>
                <label class="block" for="email">Email</label>
                <input class="border border-brand-500 rounded-md w-full px-4 py-2 bg-brand-500" type="email" name="email" placeholder="placeholder@gmail.com" required>
            </div>
            {{-- birth date --}}
            <div>
                <label class="block" for="birth_date">Birth Date</label>
                <input class="border border-brand-500 rounded-md w-full px-4 py-2 bg-brand-500" type="date" name="birth_date" required id="birth_date">
            </div>
            {{-- favorite genre --}}
            <div>
                <label for="">Favorite Genre(s)</label>
                <select  name="genres[]" id="genres" multiple >
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- password --}}
            <div class="relative">
                <label class="block" for="password">Password</label>
                <input id="password" class="border border-brand-500 rounded-md w-full px-4 py-2 bg-brand-500" type="password" name="password" required>
                <span class="absolute right-3 top-[3.6rem] transform -translate-y-1/2 cursor-pointer" onclick="togglePassword()">
                    {{-- Eye icon --}}
                    <svg id="eye-show" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>

                    {{-- Hidden Eye Icon --}}
                    <svg id="eye-hide" class="h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                </span>
            </div>
            <div class="flex justify-center items-center py-3">
                <button class="w-full bg-white py-2 rounded-md font-bold text-3xl cursor-pointer hover:bg-brand-700" type="submit">Register</button>
            </div>
        </form>
        <p class="text-center text-xl mt-4">
                Already have an account?
                <a href="{{ route('login') }}" class="text-brand-700 hover:underline">Log in</a>
        </p>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const eyeShow = document.getElementById('eye-show');
            const eyeHide = document.getElementById('eye-hide');

            if (password.type === 'password') {
                password.type = 'text';
                eyeShow.classList.add('hidden');
                eyeHide.classList.remove('hidden');
            } else {
                password.type = 'password';
                eyeShow.classList.remove('hidden');
                eyeHide.classList.add('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            new TomSelect('#genres', {
                plugins: ['remove_button'],
                placeholder: 'Select your favorite genres...',
            });
        });
    </script>
@endsection
