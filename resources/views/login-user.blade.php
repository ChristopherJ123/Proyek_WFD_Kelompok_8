@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="flex items-center justify-center gap-4">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12 w-12">
        <h1 class="text-6xl">Login Page</h1>
    </div>
    <div>
        <form action="{{ route('login.store') }}" method="POST" class="text-2xl">
            @csrf
            <div>
                <label class="block" for="email">Email / Username</label>
                <input class="border border-brand-500 rounded-md w-full px-4 py-2 bg-brand-500" type="email" name="email" placeholder="placeholder@gmail.com" required>
            </div>
            <div>
                <label class="block" for="password">Password</label>
                <input id="password" class="border border-brand-500 rounded-md w-full px-4 py-2 bg-brand-500" type="password" name="password" required>
            </div>
            <div>
                <input class="scale-125" onclick="togglePassword()" type="checkbox" name="checkbox">
                <label for="checkbox">Show Password</label>
            </div>
            <div class="flex justify-center items-center py-3">
                <button class="w-full bg-white py-2 rounded-md font-bold text-3xl cursor-pointer hover:bg-brand-700" type="submit">Login</button>
            </div>
        </form>
        <p class="text-center text-xl mt-4">
                Don't have an account?
                <a href="{{ route('register-user') }}" class="text-brand-700 hover:underline">Register</a>
        </p>
    </div>

    <script>
        function togglePassword() {
            const pass1 = document.getElementById('password');
            // const pass2 = document.getElementById('confirm_password');
            const toggle = pass1.type === 'password';

            pass1.type = toggle ? 'text' : 'password';
            // pass2.type = toggle ? 'text' : 'password';
        }
    </script>
@endsection
