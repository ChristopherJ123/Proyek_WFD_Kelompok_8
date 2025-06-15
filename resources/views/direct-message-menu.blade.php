@extends('layouts.app')

@section('content')
    <div class="ml-64 w-[calc(100%-16rem)] flex justify-start items-center min-h-screen pl-20">
        <div class="bg-brand-300 p-8 rounded-xl shadow-md w-full max-w-md -translate-y-32">
            <div class="text-2xl font-bold text-center">
                Start a Direct Message
            </div>
            @if (session('error'))
                <div class="mb-4 text-red-500">{{ session('error') }}</div>
            @endif

            <form action="{{ route('messages.start') }}" method="GET" class="flex bg-brand-500">
                <input type="text" name="username" placeholder="Enter username"
                    class="flex-1 border px-4 py-2 rounded" required>
                <button type="submit" class="bg-brand-700 text-white px-4 py-2 rounded">Start</button>
            </form>

            <h3 class="text-xl mb-3">Recent Conversations</h3>
            @if ($messagedUser->isEmpty())
                <p>You haven't messaged anyone yet.</p>
            @else
                <ul class="space-y-2">
                    @foreach ($messagedUser as $chatUser)
                        <li>
                            <a href="{{ route('messages.index', $chatUser->id) }}"
                            class="block p-2 rounded border hover:bg-brand-100">
                                {{ $chatUser->username }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection