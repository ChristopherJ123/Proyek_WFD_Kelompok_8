@extends('layouts.app')

@section('content')
    <div class="flex w-full">
        <div class="flex flex-col w-full relative overflow-y-auto">
            <img class="max-h-60 w-full object-cover" src="{{ asset('storage/'.$topic['banner_image_link']) }}" alt="{{ $topic['name'] }}">
            <div class="flex w-full p-4 absolute top-30 tracking-widest">
                <img class="size-48 object-cover min-w-48 rounded-full border-8 border-white" src="{{ asset('storage/'.$topic['icon_image_link']) }}" alt="{{ $topic['name'] }}">
                <div class="flex w-full items-end p-4">
                    <div class="flex w-full flex-col">
                        <div class="flex justify-between font-bold text-4xl">
                            <div>y/{{ $topic['name'] }}</div>
                            <div class="flex">
                                <button class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                    </svg>
                                </button>
                                <button class="flex cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
                                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="font-normal">create</span>
                                </button>
                            </div>
                        </div>
                        <div class="font-bold text-gray-700 uppercase">{{ $topic->genre->name }}</div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col absolute top-82 w-full px-8">
                <div class="flex text-2xl">
                    <div>Best</div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <hr class="border-1 mb-4">

                <ul class="flex flex-col gap-8">
                    @foreach($bestPosts as $post)
                        <li class="flex flex-col gap-2 text-white rounded-4xl bg-brand-300 p-4">
                            <div class="flex flex-col gap-3">
                                <a
                                    href="{{ route('topics.posts.show', [$post->topic, $post]) }}"
                                    class="font-sans tracking-normal mx-8 text-xl font-medium line-clamp-2">
                                    {{ $post['title'] }}
                                </a>
                                @foreach($post->images as $image)
                                    @php //Ini perlu di update jadi kek twitter image viewer @endphp
                                    <img class="max-h-96 mx-8 object-cover rounded-2xl"
                                         src="{{ asset('storage/'.$image->image_link) }}"
                                         alt="{{ $topic->name }}">
                                @endforeach
                                <div class="flex gap-4">
                                    <div class="flex items-center p-2 px-3 gap-3 rounded-4xl bg-brand-900">
                                        <div id="post-{{ $post['id'] }}-{{ $post['comment_id'] ?? 'null' }}-upvote" class="font-sans font-semibold text-xl">{{ $post->votes()->where('is_upvote', '=', true)->count() }}</div>
                                        <button id="button-{{ $post['id'] }}-{{ $post['comment_id'] ?? 'null' }}-upvote" class="cursor-pointer" onclick="votePost({{ $post->id }}, null, 1)">
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
                                        <button id="button-{{ $post['id'] }}-{{ $post['comment_id'] ?? 'null' }}-downvote" class="cursor-pointer" onclick="votePost({{ $post->id }}, null, 0)">
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

                </ul>

            </div>
        </div>

        <div class="flex flex-col gap-2 bg-brand-500 p-4 min-w-sm max-w-sm font-sans">
            <div class="flex items-center gap-2">
                <div class="text-2xl font-bold text-gray-800 font-lazy-dog tracking-widest">y/{{ $topic['name'] }}</div>
                <button class="bg-brand-900 font-semibold text-brand-100 p-1 px-2 rounded-4xl">
                    Joined
                </button>
            </div>
            <div>{{ $topic['description'] }}</div>
            <div class="font-lazy-dog tracking-widest font-bold text-gray-800">CREATED AT {{ $topic['created_at']->format('Y-m-d') }}</div>
            <hr class="border border-gray-800">

            @foreach($topic->rules as $rule)
                <div class="rule cursor-pointer flex space-x-4 items-center">
                    <span class="text-xl">{{ $rule->order }}</span>
                    <div class="flex justify-between w-full font-semibold">
                        <span>{{ $rule->title }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                             stroke="currentColor" class="size-6 transition">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
                <div>
                    {{ $rule->description }}
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function votePost(postId, postCommentId, isUpvote) {
            $.ajax({
                url: `/posts/${postId}/vote`,
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

        $('.rule').on("click", function () {
            $(this).next().slideToggle();
            $(this).children('div').children('svg').first().toggleClass('rotate-180');
        });
    </script>
@endsection
