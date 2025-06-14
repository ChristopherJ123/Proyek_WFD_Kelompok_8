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
                <div class="flex gap-2 text-2xl">
                    <button id="sortBy" class="flex cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75"/>
                        </svg>
                        <span>{{ $sort_by ?? 'Best' }}</span>
                    </button>
                    <button id="orderBy" class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                             stroke="currentColor"
                            @class([
                                'size-6 transition',
                                'desc' => $order_by === 'desc',
                                'asc rotate-180' => $order_by === 'asc',
                            ])>
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>
                </div>
                <hr class="border-1 mb-4">

                <ul class="flex flex-col gap-8">
                    @foreach($posts as $post)
                        <x-post-card :post="$post" :show-topic="false"></x-post-card>
                    @endforeach
                    {{ $posts->links() }}
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
