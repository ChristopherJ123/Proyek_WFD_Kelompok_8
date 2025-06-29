@php use App\Models\User; @endphp
@extends('layouts.app')

@section('title', 'Admin')

@section('content')
    <div class="flex justify-center items-center w-full font-sans">
        <div class="flex flex-col  gap-2 bg-brand-300 text-white p-4 text-lg rounded-2xl">
            <b>Admins</b>
            <hr class="border-2 border-white">
            <div class="p-4 bg-brand-500 rounded-2xl max-h-128 overflow-y-auto">
                @foreach($admins as $admin)
                    <form action="{{ route('admin.destroy', $admin) }}" method="post" class="flex gap-4 items-center justify-between">
                        @csrf
                        @method('delete')
                        <div>{{ $loop->iteration }}</div>
                        <div>{{ $admin->username }}</div>
                        <div>{{ $admin->email }}</div>
                        <button class="relative group size-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500 absolute top-0 cursor-pointer opacity-100 group-hover:opacity-0 transition-opacity">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-red-500 absolute top-0 cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity">
                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                @endforeach
            </div>
            <hr class="border-2 border-white">
            <b>Set User's role to admin</b>
            <form action="{{ route('admin.store') }}" method="post" class="flex gap-4 items-center">
                @csrf
                <input class="p-4 bg-brand-500 rounded-2xl" type="text" name="username" placeholder="Username" required>
            </form>
        </div>
    </div>
@endsection
