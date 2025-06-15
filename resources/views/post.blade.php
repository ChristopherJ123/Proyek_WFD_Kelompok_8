@extends('layouts.app')

@section('content')
    <div class="flex gap-4 w-full font-sans">
        <div class="flex flex-col w-full gap-4 p-4 overflow-y-auto">
            <div class="flex gap-2 font-lazy-dog tracking-widest">
                <img class="size-16 object-cover rounded-full" src="{{ asset('storage/'.$topic->icon_image_link) }}" alt="{{ $topic->name }}">
                <div>
                    <a href="{{ route('topics.show', $topic) }}" class="font-bold text-4xl">y/{{ $topic->name }}</a>
                    <div class="font-bold text-gray-700 uppercase">{{ $post->author->username }}</div>
                </div>
            </div>
            <div class="text-3xl font-extrabold">
                {{ $post->title }}
            </div>
            <div class="text-lg">
                {{ $post->description }}
            </div>
            <div>
                @foreach($post->images as $image)
                    <img class="max-h-96" src="{{ asset('storage/'.$image->image_link) }}" alt="{{ $topic->name }}">
                @endforeach
            </div>
            <div class="flex gap-4 text-white">
                <div class="flex items-center p-2 px-3 gap-3 rounded-4xl bg-brand-900">
                    <div class="font-sans font-semibold text-xl">{{ $post->votes()->where('is_upvote', '=', true)->count() }}</div>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-6" fill="currentColor">
                            <g>
                                <polygon points="256,0 56,300 163.8,300 163.8,512 348.2,512 348.2,300 456,300  "/>
                            </g>
                        </svg>
                    </button>
                    <div class="font-sans font-semibold text-xl">{{ $post->votes()->where('is_upvote', '=', false)->count() }}</div>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-6 rotate-180" fill="currentColor">
                            <g>
                                <polygon points="256,0 56,300 163.8,300 163.8,512 348.2,512 348.2,300 456,300  "/>
                            </g>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center p-2 px-3 gap-3 rounded-4xl bg-brand-900">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M12 2.25c-2.429 0-4.817.178-7.152.521C2.87 3.061 1.5 4.795 1.5 6.741v6.018c0 1.946 1.37 3.68 3.348 3.97.877.129 1.761.234 2.652.316V21a.75.75 0 0 0 1.28.53l4.184-4.183a.39.39 0 0 1 .266-.112c2.006-.05 3.982-.22 5.922-.506 1.978-.29 3.348-2.023 3.348-3.97V6.741c0-1.947-1.37-3.68-3.348-3.97A49.145 49.145 0 0 0 12 2.25ZM8.25 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Zm2.625 1.125a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" />
                    </svg>
                    <div class="font-sans font-semibold text-xl">{{ $post->comments()->count() }}</div>
                </div>
                <div class="flex items-center p-2 px-3 gap-3 rounded-4xl bg-brand-900">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                    </svg>
                    <div class="font-sans font-semibold text-xl">{{ $post->share_count }}</div>
                </div>
            </div>
            <form action="{{ route('topics.posts.store', [$topic, $post]) }}" class="border-4 border-brand-900 rounded-4xl p-2 relative">
                <input class="w-full focus:outline-0 placeholder-transparent peer" type="text" name="comment" id="comment" placeholder="Join the discussion">
                <label class="absolute left-2 peer-placeholder-shown:text-gray-600 peer-placeholder-shown:visible peer-focus:invisible invisible cursor-text" for="comment">Join the discussion<span class="text-red-500 font-bold">*</span></label>
                <button class="flex mt-4 items-center gap-2 p-2 rounded-4xl font-semibold bg-brand-900 text-brand-300">
                    <span class="bg-brand-300 rounded-full p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-white">
                            <path d="M9.97.97a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1-1.06 1.06l-1.72-1.72v3.44h-1.5V3.31L8.03 5.03a.75.75 0 0 1-1.06-1.06l3-3ZM9.75 6.75v6a.75.75 0 0 0 1.5 0v-6h3a3 3 0 0 1 3 3v7.5a3 3 0 0 1-3 3h-7.5a3 3 0 0 1-3-3v-7.5a3 3 0 0 1 3-3h3Z" />
                            <path d="M7.151 21.75a2.999 2.999 0 0 0 2.599 1.5h7.5a3 3 0 0 0 3-3v-7.5c0-1.11-.603-2.08-1.5-2.599v7.099a4.5 4.5 0 0 1-4.5 4.5H7.151Z" />
                        </svg>
                    </span>
                    Add Pictures
                </button>
            </form>

            @foreach($post->comments as $comment)
                <div class="flex w-full">
                    <div class="flex flex-1 gap-2">
                        <img
                            src="{{ asset('storage/'.$comment->author->profile_picture_link) }}"
                            alt="{{ $comment->author->username }}"
                            class="size-12 rounded-full"
                        >
                        <div class="flex flex-col">
                            <div class="uppercase tracking-wider font-lazy-dog font-bold">{{ $comment->author->username }}</div>
                            <div>{{ $comment->message }}</div>
                            <div class="flex gap-4 text-white">
                                <div class="flex items-center px-3 gap-2 rounded-4xl bg-brand-900">
                                    <div class="font-sans font-semibold">{{ $comment->votes()->where('is_upvote', '=', true)->count() }}</div>
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4" fill="currentColor">
                                            <g>
                                                <polygon points="256,0 56,300 163.8,300 163.8,512 348.2,512 348.2,300 456,300  "/>
                                            </g>
                                        </svg>
                                    </button>
                                    <div class="font-sans font-semibold">{{ $comment->votes()->where('is_upvote', '=', false)->count() }}</div>
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 rotate-180" fill="currentColor">
                                            <g>
                                                <polygon points="256,0 56,300 163.8,300 163.8,512 348.2,512 348.2,300 456,300  "/>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex items-center px-3 gap-2 rounded-4xl bg-brand-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.49 12 3.75 3.75m0 0-3.75 3.75m3.75-3.75H3.74V4.499" />
                                    </svg>
                                    <div class="font-sans font-semibold">Reply</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-1 justify-end items-center">
                        <button class="p-2 rounded-full cursor-pointer hover:bg-brand-900 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="flex flex-col gap-2 bg-brand-500 p-4 min-w-sm max-w-sm font-sans">
            <div class="flex items-center gap-2">
                <div class="text-2xl font-bold text-gray-800 font-lazy-dog tracking-widest">y/{{ $topic->name }}</div>
                <button class="bg-brand-900 font-semibold text-brand-100 p-1 px-2 rounded-4xl">
                    Joined
                </button>
            </div>
            <div>
                {{ $topic->description }}
            </div>
            <div class="font-lazy-dog tracking-widest font-bold text-gray-800">CREATED AT: 23-3-2024</div>
            <hr class="border border-gray-800">

            @foreach($topic->rules as $rule)
                <x-rule-card :rule="$rule"></x-rule-card>
            @endforeach
        </div>
    </div>

    <script>
        $('.rule').on("click", function () {
            $(this).next().slideToggle();
            $(this).children('div').children('svg').first().toggleClass('rotate-180');
        });
    </script>
@endsection
