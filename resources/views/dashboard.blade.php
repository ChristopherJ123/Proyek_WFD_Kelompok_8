@php use Illuminate\Support\Facades\Auth; @endphp

@extends('layouts.app')

@section('content')
    <div class="flex w-full m-4 gap-4 tracking-widest overflow-auto">
        <div class="flex flex-grow-1 flex-col">
            <div class="flex gap-2 text-2xl">
                <button id="sortBy" class="flex cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                    </svg>
                    <span>Best</span>
                </button>
                <button id="orderBy" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="desc size-6 transition">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
            </div>
            <hr class="border border-1 mb-4">

            <ul id="posts" class="flex flex-col gap-8">
                @if(isset($bestPosts))
                    @foreach($bestPosts as $post)
                        <li class="flex flex-col gap-2 text-white rounded-4xl bg-brand-300 p-4">
                            <div class="flex flex-col gap-3">
                                <div class="flex gap-2 mx-8">
                                    <img class="size-8 object-cover rounded-full" src="{{ $post->topic->icon_image_link }}"
                                         alt="{{ $post->topic->icon_image_link }}">
                                    <a
                                        href="{{ route('topics.show', $post->topic) }}"
                                        class="font-bold text-2xl">y/{{ $post->topic->name }}</a>
                                </div>
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
                @else
                    <li class="flex flex-col gap-2 h-96 w-full justify-center items-center text-2xl text-gray-500">
                        <div>
                            Login to see your followed topics. Instead, see the popular page.
                        </div>
                        <a href="{{ route('login') }}" class="flex items-center justify-center min-w-48 gap-2 p-2 border-2 border-gray-400 bg-gray-50 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                            </svg>
                            <div>Login</div>
                        </a>
                        <a href="{{ route('login') }}" class="flex items-center justify-center min-w-48 gap-2 p-2 border-2 border-gray-400 bg-gray-50 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd"
                                      d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z"
                                      clip-rule="evenodd"/>
                            </svg>
                            <div>Popular</div>
                        </a>
                    </li>
                @endif
            </ul>

        </div>

        <div
            class="hidden lg:flex flex-col min-w-64 max-w-80 xl:max-w-sm bg-brand-500 rounded-4xl p-4 text-brand-900 text-xl gap-2 h-fit">
            <div class="font-bold">RECENT POSTS</div>
            <ul class="flex flex-col divide-y-2 divide-brand-900">
                @if(isset($recentPosts))
                    @foreach($recentPosts as $post)
                        <li class="py-4 first:pt-0 last:pb-0 break-words">
                            <div class="flex gap-2">
                                <img class="size-8 object-cover rounded-full" src="{{ asset('storage/'.$post->topic->icon_image_link) }}"
                                     alt="{{ $post->topic->name }}">
                                <a
                                    href="{{ route('topics.show', $post->topic) }}"
                                    class="font-bold text-2xl">y/{{ $post->topic->name }}</a>
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
            </ul>
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

        $('#sortBy').on('click', function () {
            let sortBy = $(this).children('span');
            let orderBy = $('#orderBy').children('svg')

            sortBy.text(sortBy.text() === 'Best' ? 'Popular' : sortBy.text() === 'Popular' ? 'Date' : 'Best');
            sortPosts(sortBy.text(), orderBy.hasClass('asc') ? 'asc' : orderBy.hasClass('desc') ? 'desc' : 'error');
        })

        $('#orderBy').on('click', function () {
            let orderBy = $(this).children('svg');

            if (orderBy.hasClass('desc')) {
                orderBy.removeClass('desc');
                orderBy.addClass('asc');
                orderBy.toggleClass('rotate-180');
                sortPosts($('#sortBy').children('span').text(), 'asc')
            } else if (orderBy.hasClass('asc')) {
                orderBy.removeClass('asc');
                orderBy.addClass('desc');
                orderBy.toggleClass('rotate-180');
                sortPosts($('#sortBy').children('span').text(), 'desc')
            }
        })

        function sortPosts(sortBy, orderBy) {
            const params = new URLSearchParams(window.location.search);
            const searchQuery = params.get('search') === null ? '' : params.get('search');
            const $postContainer = $('#posts');

            console.log(`${sortBy} ${orderBy} ${searchQuery}`)

            $.ajax({
                url: `api/dashboard/posts/${searchQuery}`,
                method: 'GET',
                data: {
                    sort_by: sortBy,
                    order_by: orderBy,
                },
                success: function (response) {
                    $postContainer.empty();
                    console.log(response);
                    $.each(response, function (key, value) {
                        // todo filter
                    })
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
                },
            })
        }
    </script>
@endsection
