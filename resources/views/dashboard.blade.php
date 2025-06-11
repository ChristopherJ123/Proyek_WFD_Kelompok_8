@php use Illuminate\Support\Facades\Auth; @endphp

@extends('layouts.app')

@section('content')
    <div class="flex w-full m-4 gap-4 tracking-widest overflow-auto">
        <div class="flex flex-grow-1 flex-col">
            <div class="flex text-2xl">
                <div>Best</div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                          d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z"
                          clip-rule="evenodd"/>
                </svg>
            </div>
            <hr class="border border-1 mb-4">

            <ul class="flex flex-col gap-8">
                @if(Auth::check())
                    @if(isset($bestPosts))
                        @foreach($bestPosts as $post)
                            @php
                                // todo for multiple image per posts
                            @endphp
                            <li class="flex flex-col gap-2 text-white rounded-4xl bg-brand-300 p-4">
                                <div class="flex flex-col gap-3">
                                    <div class="flex gap-2 mx-8">
                                        <img class="size-8 object-cover rounded-full" src="{{ asset($post->topic->icon_image_link) }}"
                                             alt="{{ $post->topic->icon_image_link }}">
                                        <a
                                            href="{{ route('topics.show', $post->topic) }}"
                                            class="font-bold text-2xl">y/{{ $post['topic_name'] }}</a>
                                    </div>
                                    <a
                                        href="{{ route('topics.posts.show', [$post->topic, $post]) }}"
                                        class="font-sans tracking-normal mx-8 text-xl font-medium line-clamp-2">
                                        {{ $post['title'] }}
                                    </a>
                                    @if(count($post->images) > 0)
                                        <img class="max-h-96 mx-8 object-cover rounded-2xl"
                                             src="{{ asset('storage/'.$post->images[0]->image_link) }}"
                                             alt="{{ $post->images[0]->image_link }}">
                                    @endif
                                    <div class="flex gap-4">
                                        <div class="flex items-center p-2 px-3 gap-3 rounded-4xl bg-brand-900">
                                            <div id="post-{{ $post['id'] }}-{{ $post['comment_id'] ?? 'null' }}-upvote" class="font-sans font-semibold text-xl">{{ $post->votes()->where('is_upvote', '=', true)->count() }}</div>
                                            <button id="button-{{ $post['id'] }}-{{ $post['comment_id'] ?? 'null' }}-upvote" class="cursor-pointer" onclick="votePost({{ $post['id'] }}, null, 1)">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                     @class([
                                                        'size-6',
                                                        'text-red-300' => Auth::user()->votes()->where([['post_id', '=', $post['id']], ['is_upvote', '=', true]])->first()
                                                    ])
                                                     fill="currentColor">
                                                    <g>
                                                        <polygon
                                                            points="256,0 56,300 163.8,300 163.8,512 348.2,512 348.2,300 456,300  "/>
                                                    </g>
                                                </svg>
                                            </button>
                                            <div id="post-{{ $post['id'] }}-{{ $post['comment_id'] ?? 'null' }}-downvote" class="font-sans font-semibold text-xl">{{ $post->votes()->where('is_upvote', '=', false)->count() }}</div>
                                            <button id="button-{{ $post['id'] }}-{{ $post['comment_id'] ?? 'null' }}-downvote" class="cursor-pointer" onclick="votePost({{ $post['id'] }}, null, 0)">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                     @class([
                                                        'size-6 rotate-180',
                                                        'text-red-400' => Auth::user()->votes()->where([['post_id', '=', $post['id']], ['is_upvote', '=', false]])->first()
                                                    ])
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
                                </div>
                            </li>
                        @endforeach
                    @endif
                @endif
            </ul>

        </div>

        <div
            class="hidden lg:flex flex-col max-w-80 xl:max-w-sm bg-brand-500 rounded-4xl p-4 text-brand-900 text-xl gap-2 h-fit">
            <div class="font-bold">RECENT POSTS</div>
            <ul class="flex flex-col divide-y-2 divide-brand-900">
                @if(Auth::check())
                    @if(isset($recentPosts))
                        @foreach($recentPosts as $post)
                            <li class="py-4 first:pt-0 last:pb-0 break-words">
                                <div class="flex gap-2">
                                    <img class="size-8 object-cover rounded-full" src="{{ $post['image_link'] }}"
                                         alt="{{ $post['topic_name'] }}">
                                    <a
                                        href="{{ route('topics.show', $post->topic) }}"
                                        class="font-bold text-2xl">y/{{ $post['topic_name'] }}</a>
                                </div>
                                <a href="{{ route('topics.posts.show', [$post->topic, $post]) }}" class="font-sans tracking-tighter font-medium line-clamp-2">
                                    {{ $post['title'] }}
                                </a>
                                <div class="text-gray-900 tracking-normal">{{ $post->votes()->where('is_upvote', '=', true)->count() }}
                                    upvote {{ $post->votes()->where('is_upvote', '=', false)->count() }} downvote {{ $post->comments()->count() }} comments
                                </div>
                            </li>
                        @endforeach
                    @endif
                @endif
            </ul>
        </div>
    </div>

    <script>
        function votePost(postId, postCommentId, isUpvote) {
            $.ajax({
                url: `posts/${postId}/vote`,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    post_comment_id: postCommentId,
                    is_upvote: isUpvote,
                },
                success: function (response) {
                    let upvoteContainer = $(`#post-${postId}-${postCommentId}-upvote`)
                    let downvoteContainer = $(`#post-${postId}-${postCommentId}-downvote`)
                    let upvoteSvg = $(`#button-${postId}-${postCommentId}-upvote`).children('svg');
                    let downvoteSvg = $(`#button-${postId}-${postCommentId}-downvote`).children('svg');
                    if (isUpvote === 1) {
                        upvoteContainer.text(response.upvote_count);
                        downvoteContainer.text(response.downvote_count);
                        upvoteSvg.toggleClass('text-red-300');
                        downvoteSvg.removeClass('text-red-400');
                    } else {
                        upvoteContainer.text(response.upvote_count);
                        downvoteContainer.text(response.downvote_count);
                        downvoteSvg.toggleClass('text-red-400');
                        upvoteSvg.removeClass('text-red-300');
                    }
                },
                error: function (response) {
                    if (response.status === 401) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Unauthorized',
                            text: 'You must be logged in to vote.'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.responseJSON?.message || 'Something went wrong.'
                        });
                    }
                }
            });
        }

        function sortPosts(sortBy, orderBy) {
            const params = new URLSearchParams(window.location.search);
            const searchQuery = params.get('search');
        }
    </script>
@endsection
