<div class="flex gap-4 text-white">
    <div class="flex items-center px-3 gap-2 rounded-4xl bg-brand-900">
        <div id="post-{{ $post->id }}-{{ $comment->id ?? 'null' }}-upvote" class="font-sans font-semibold">{{ $comment->votes()->where('is_upvote', '=', true)->count() }}</div>
        <button id="button-{{ $post->id }}-{{ $comment->id ?? 'null' }}-upvote" class="cursor-pointer" onclick="votePost({{ $post->id }}, {{ $comment->id }}, 1)">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                 @if(auth()->check())
                     @class([
                    'size-4',
                    'text-red-300' => Auth::user()->votes()->where([['post_id', '=', $post->id], ['post_comment_id', '=', $comment->id], ['is_upvote', '=', true]])->first()
                    ])
                 @else
                     @class([
                    'size-4',
                    ])
                 @endif
                 fill="currentColor">
                <g>
                    <polygon
                            points="256,0 56,300 163.8,300 163.8,512 348.2,512 348.2,300 456,300  "/>
                </g>
            </svg>
        </button>
        <div id="post-{{ $post->id }}-{{ $comment->id ?? 'null' }}-downvote" class="font-sans font-semibold">{{ $comment->votes()->where('is_upvote', '=', false)->count() }}</div>
        <button id="button-{{ $post->id }}-{{ $comment->id ?? 'null' }}-downvote" class="cursor-pointer" onclick="votePost({{ $post->id }}, {{ $comment->id }}, 0)">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                 @if(auth()->check())
                     @class([
                    'size-4 rotate-180',
                    'text-red-400' => Auth::user()->votes()->where([['post_id', '=', $post->id], ['post_comment_id', '=', $comment->id], ['is_upvote', '=', false]])->first()
                    ])
                 @else
                     @class([
                    'size-4',
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
    <button data-post-id="{{ $post->id }}" data-comment-id="{{ $comment->id ?? 'null' }}" class="comment-reply-button flex items-center px-3 gap-2 rounded-4xl bg-brand-900 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.49 12 3.75 3.75m0 0-3.75 3.75m3.75-3.75H3.74V4.499" />
        </svg>
        <span class="font-sans font-semibold">Reply</span>
    </button>
</div>
