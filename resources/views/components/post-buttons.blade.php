<div class="flex gap-4">
    <div class="flex items-center p-2 px-3 gap-3 rounded-4xl bg-brand-900">
        <div id="post-{{ $post->id }}-{{ $comment->id ?? 'null' }}-upvote" class="font-sans font-semibold text-xl">{{ $post->votes()->where('is_upvote', '=', true)->count() }}</div>
        <button id="button-{{ $post->id }}-{{ $comment->id ?? 'null' }}-upvote" class="cursor-pointer" onclick="votePost({{ $post->id }}, null, 1)">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                 @if(auth()->check())
                     @class([
                    'size-6',
                    'text-red-300' => Auth::user()->votes()->where([['post_id', '=', $post['id']], ['is_upvote', '=', true]])->first()
                    ])
                 @else
                     @class([
                    'size-6',
                    ])
                 @endif
                 fill="currentColor">
                <g>
                    <polygon
                        points="256,0 56,300 163.8,300 163.8,512 348.2,512 348.2,300 456,300  "/>
                </g>
            </svg>
        </button>
        <div id="post-{{ $post->id }}-{{ $comment->id ?? 'null' }}-downvote" class="font-sans font-semibold text-xl">{{ $post->votes()->where('is_upvote', '=', false)->count() }}</div>
        <button id="button-{{ $post->id }}-{{ $comment->id ?? 'null' }}-downvote" class="cursor-pointer" onclick="votePost({{ $post->id }}, null, 0)">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                 @if(auth()->check())
                     @class([
                    'size-6 rotate-180',
                    'text-red-400' => Auth::user()->votes()->where([['post_id', '=', $post->id], ['is_upvote', '=', false]])->first()
                    ])
                 @else
                     @class([
                    'size-6',
                    ])
                 @endif

                 fill="currentColor">
                <g>
                    <polygon
                        points="256,0 56,300 163.8,300 163.8,512 348.2,512 348.2,300 456,300  "/>
                </g>
            </svg>
        </button>
    </div>
    <a href="{{ route('topics.posts.show', [$post->topic, $post]) }}" class="flex items-center p-2 px-3 gap-3 rounded-4xl bg-brand-900">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
             fill="currentColor"
             class="size-6">
            <path fill-rule="evenodd"
                  d="M12 2.25c-2.429 0-4.817.178-7.152.521C2.87 3.061 1.5 4.795 1.5 6.741v6.018c0 1.946 1.37 3.68 3.348 3.97.877.129 1.761.234 2.652.316V21a.75.75 0 0 0 1.28.53l4.184-4.183a.39.39 0 0 1 .266-.112c2.006-.05 3.982-.22 5.922-.506 1.978-.29 3.348-2.023 3.348-3.97V6.741c0-1.947-1.37-3.68-3.348-3.97A49.145 49.145 0 0 0 12 2.25ZM8.25 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Zm2.625 1.125a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z"
                  clip-rule="evenodd"/>
        </svg>
        <div
            class="font-sans font-semibold text-xl">{{ $post->comments()->count() }}</div>
    </a>
    <div class="flex items-center p-2 px-3 gap-3 rounded-4xl bg-brand-900">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
             fill="currentColor"
             class="size-6">
            <path
                d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z"/>
        </svg>
        <div
            class="font-sans font-semibold text-xl">{{ $post['share_count'] }}</div>
    </div>
</div>
