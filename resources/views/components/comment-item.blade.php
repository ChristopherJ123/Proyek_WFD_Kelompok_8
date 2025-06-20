@props(['post', 'comment', 'depth' => 0])
@php
    $isBanned = \DB::table('topic_blocked_users')
        ->where('topic_id', $post->topic_id)
        ->where('user_id', $comment->author->id)
        ->exists();
@endphp

<div
    @class([
        "flex w-full",
        'border border-dashed border-brand-300 rounded-lg' => isset($newComment) && $newComment->id === $comment->id
    ])
>
    @if($depth > 0)
        <div class="flex ml-{{ $depth > 1 ? $depth * 8 : 0}} size-12 items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                 class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.49 12 3.75 3.75m0 0-3.75 3.75m3.75-3.75H3.74V4.499" />
            </svg>
        </div>
    @endif
    <div class="flex gap-2 w-full">
        @if(isset($comment->author->profile_picture_link))
            <img
                src="{{ asset('storage/'.$comment->author->profile_picture_link) }}"
                alt="{{ $comment->author->username }}"
                class="size-12 rounded-full"
            >
        @else
            <img
                src="{{ asset('storage/profile_default.jpg') }}"
                alt="{{ $comment->author->username }}"
                class="size-12 rounded-full"
            >
        @endif
        <div class="flex flex-col w-full">
            <div class="uppercase tracking-wider font-lazy-dog font-bold">
                <span>{{ $comment->author->username }}</span>
                @if($post->topic->blockedUsers()->where('user_id', '=', $comment->author->id)->exists())
                    <span class="bg-red-200 text-red-500 py-1 px-2 rounded-full sans normal-case font-sans text-sm">User has been banned from this topic</span>
                @endif
                @if($comment->reports()->exists() && auth()->check() && (auth()->user()->role_id == 2 || auth()->user()->moderatedTopics()->where('topic_id', $post->topic_id)->exists()))
                    <span class="bg-red-100 text-red-400 py-1 px-2 rounded-full sans normal-case font-sans text-sm">Has been reported {{ $comment->reports()->count() }} time(s)</span>
                @endif
            </div>
            <div>{{ $comment->message }}</div>
            @if ($comment->is_marked_answer)
                <span class="text-green-600 font-bold text-sm mt-1">✓ Marked as Answer</span>
            @endif
            @if(count($comment->images) > 0)
                <div
                    @class([
                        'grid grid-gap-1 max-w-sm mb-2',
                        'grid-cols-1' => count($comment->images) === 1,
                        'grid-cols-2' => count($comment->images) >= 2
                    ])>
                    @foreach($comment->images as $index => $image)
                        @if($index < 4)
                            <img
                                class="w-full h-full rounded-2xl"
                                src="{{ asset('storage/'.$image->image_link) }}"
                                alt="{{ $comment->title }}"
                            >
                        @endif
                    @endforeach
                </div>
            @endif
            <x-post-comment-buttons :post="$post" :comment="$comment"></x-post-comment-buttons>
            <form action="{{ route('topics.posts.comments.store', [$post->topic, $post]) }}" method="post" enctype="multipart/form-data"
                  class="comment-reply-form border-4 hidden border-brand-900 rounded-4xl p-2 relative mt-2">
                @csrf
                @if(!auth()->check())
                    <input class="w-full focus:outline-0 placeholder-transparent peer" type="text" name="message" id="message-{{ $comment->id }}" placeholder="Login to join the discussion" disabled>
                    <label class="absolute left-2 peer-placeholder-shown:text-gray-600 peer-placeholder-shown:visible peer-focus:invisible invisible cursor-text" for="message-{{ $comment->id }}">Login to join the discussion</label>
                @else
                    <input class="w-full focus:outline-0 placeholder-transparent peer" type="text" name="message" id="message-{{ $comment->id }}" placeholder="Join the discussion">
                    <label class="absolute left-2 peer-placeholder-shown:text-gray-600 peer-placeholder-shown:visible peer-focus:invisible invisible cursor-text" for="message-{{ $comment->id }}">Join the discussion<span class="text-red-500 font-bold">*</span></label>
                @endif

                <div class="comment-add-picture flex w-fit mt-4 items-center gap-2 p-2 rounded-4xl font-semibold bg-brand-900 text-brand-300 cursor-pointer">
                    <span class="bg-brand-300 rounded-full p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-white">
                            <path d="M9.97.97a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1-1.06 1.06l-1.72-1.72v3.44h-1.5V3.31L8.03 5.03a.75.75 0 0 1-1.06-1.06l3-3ZM9.75 6.75v6a.75.75 0 0 0 1.5 0v-6h3a3 3 0 0 1 3 3v7.5a3 3 0 0 1-3 3h-7.5a3 3 0 0 1-3-3v-7.5a3 3 0 0 1 3-3h3Z" />
                            <path d="M7.151 21.75a2.999 2.999 0 0 0 2.599 1.5h7.5a3 3 0 0 0 3-3v-7.5c0-1.11-.603-2.08-1.5-2.599v7.099a4.5 4.5 0 0 1-4.5 4.5H7.151Z" />
                        </svg>
                    </span>
                    <div>
                        Add Pictures
                    </div>
                </div>
                <input class="hidden images-input" type="file" name="images[]" id="images-{{ $comment->id }}" accept="image/*" multiple>
                <input type="hidden" name="parent_message_id" id="parent_message_id-{{ $comment->id }}" value="{{ $comment->id }}">
            </form>
        </div>
    </div>

    <div class="flex flex-1 justify-end items-center gap-2">
        @if(auth()->check() && auth()->id() === $comment->author_id)
            {{-- Tombol delete bagi owner --}}
            <form action="{{ route('topics.posts.comments.destroy', [$post->topic, $post, $comment]) }}" method="post" class="relative p-2 flex items-center justify-center">
                @csrf
                @method('delete')
                <button class="relative group size-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500 absolute top-0 cursor-pointer opacity-100 group-hover:opacity-0 transition-opacity">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-red-500 absolute top-0 cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
        @else
            {{-- Tombol Report --}}
            <button
                class="p-2 rounded-full cursor-pointer hover:bg-brand-900 hover:text-white report-comment-btn"
                title="Report Comment"
                data-comment-id="{{ $comment->id }}"
                data-post-id="{{ $post->id }}"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
                </svg>
            </button>
        @endif

        {{-- Tombol Ban (hanya admin atau moderator) --}}
        @if(auth()->check() && (auth()->user()->role_id == 2 || auth()->user()->moderatedTopics()->where('topic_id', $post->topic_id)->exists()))
            @if($isBanned)
                <button class="p-2 rounded-full cursor-pointer hover:bg-green-100 text-green-600 hover:text-green-800 unban-from-topic-btn"
                    title="Unban user from topic"
                    data-topic-id="{{ $post->topic_id }}"
                    data-user-id="{{ $comment->author->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            @else
                <button class="p-2 rounded-full cursor-pointer hover:bg-red-100 text-red-600 hover:text-red-800 ban-user-btn"
                    title="Ban user from topic"
                    data-topic-id="{{ $post->topic_id }}"
                    data-user-id="{{ $comment->author->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636a9 9 0 1 1-12.728 0M12 9v3.75"/>
                    </svg>
                </button>
            @endif
        @endif


        {{-- Tombol mark asnwer --}}
        @if (auth()->check() && auth()->id() === $post->author->id && !$comment->is_marked_answer)
            <form method="POST" action="{{ route('topics.posts.comments.mark-answer', [$post->topic, $post, $comment]) }}">
                @csrf
                <button class="text-sm text-green-600 hover:bg-green-600 rounded-full p-2 hover:text-white" title="Marked As Answer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </button>
            </form>
        @endif
    </div>
</div>

@foreach($comment->children as $child)
    <x-comment-item :post="$post" :comment="$child" :depth="$depth + 1"></x-comment-item>
@endforeach
