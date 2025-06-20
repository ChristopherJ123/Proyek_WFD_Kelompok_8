@php use Illuminate\Support\Facades\Auth; @endphp

@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <div class="flex w-full m-4 gap-4 tracking-widest overflow-auto">
        <div class="flex flex-grow-1 flex-col">
            <div class="flex gap-2 text-2xl">
                <button id="sortBy" class="flex cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75"/>
                    </svg>
                    <span>{{ $sortBy ?? 'Best' }}</span>
                </button>
                <button id="orderBy" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor"
                        @class([
                            'size-6 transition',
                            'desc' => $orderBy === 'desc',
                            'asc rotate-180' => $orderBy === 'asc',
                        ])>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>
            </div>
            <hr class="border-1 mb-4">

            <ul id="posts" class="flex flex-col gap-8">
                @if(isset($posts))
                    @foreach($posts as $post)
                        <x-post-card :post="$post"></x-post-card>
                    @endforeach
                    {{ $posts->links() }}
                @else
                    <li class="flex flex-col gap-2 h-96 w-full justify-center items-center text-2xl text-gray-500">
                        <div>
                            Login to see your followed topics. Instead, see the popular page.
                        </div>
                        <a href="{{ route('login') }}"
                           class="flex items-center justify-center min-w-48 gap-2 p-2 border-2 border-gray-400 bg-gray-50 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25"/>
                            </svg>
                            <div>Login</div>
                        </a>
                        <a href="{{ route('popular') }}"
                           class="flex items-center justify-center min-w-48 gap-2 p-2 border-2 border-gray-400 bg-gray-50 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                 class="size-6">
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
            class="hidden lg:flex flex-col min-w-sm max-w-80 xl:max-w-sm bg-brand-500 rounded-4xl p-4 text-brand-900 text-xl gap-2 h-fit">
            <div class="font-bold">RECENT POSTS</div>
            <ul class="flex flex-col divide-y-2 divide-brand-900">
                @if(isset($recentPosts))
                    @foreach($recentPosts as $post)
                        <li class="py-4 first:pt-0 last:pb-0 break-words">
                            <div class="flex gap-2">
                                <img class="size-8 object-cover rounded-full"
                                     src="{{ asset('storage/'.$post->topic->icon_image_link) }}"
                                     alt="{{ $post->topic->name }}">
                                <a
                                    href="{{ route('topics.show', $post->topic) }}"
                                    class="font-bold text-2xl">y/{{ $post->topic->name }}</a>
                            </div>
                            <a href="{{ route('topics.posts.show', [$post->topic, $post]) }}"
                               class="font-sans tracking-tighter font-medium line-clamp-2">
                                {{ $post['title'] }}
                            </a>
                            <div
                                class="text-gray-900 tracking-normal">{{ $post->votes()->where('is_upvote', '=', true)->count() }}
                                upvote {{ $post->votes()->where('is_upvote', '=', false)->count() }}
                                downvote {{ $post->comments()->count() }} comments
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

        function changeQueryStringParams(key, value) {
            const url = new URL(window.location.href);
            url.searchParams.set(key, value);
            window.location.href = url.toString();
        }

        $('#sortBy').on('click', function () {
            let sortBy = $(this).children('span');

            let next = sortBy.text() === 'Best' ? 'Popular' : sortBy.text() === 'Popular' ? 'Date' : 'Best';
            changeQueryStringParams('sort_by', next);
        })

        $('#orderBy').on('click', function () {
            let orderIcon = $(this).children('svg');

            let nextOrder;
            if (orderIcon.hasClass('desc')) {
                orderIcon.removeClass('desc').addClass('asc').toggleClass('rotate-180');
                nextOrder = 'asc';
            } else {
                orderIcon.removeClass('asc').addClass('desc').toggleClass('rotate-180');
                nextOrder = 'desc';
            }

            changeQueryStringParams('order_by', nextOrder);
        })
    </script>
@endsection
