@extends('layouts.app')

@section('title', 'Topic')

@section('content')
    <div class="flex w-full">
        <div class="flex flex-col w-full relative overflow-y-auto">
            @if(isset($topic['banner_image_link']))
                <img class="max-h-60 w-full object-cover" src="{{ asset('storage/'.$topic['banner_image_link']) }}" alt="{{ $topic['name'] }}">
            @else
                <img class="max-h-60 w-full object-cover" src="{{ asset('storage/banner_default.jpg') }}" alt="{{ $topic['name'] }}">
            @endif
            <div class="flex w-full p-4 absolute top-30 tracking-widest">
                @if(isset($topic['icon_image_link']))
                    <img class="size-48 object-cover min-w-48 rounded-full border-8 border-white" src="{{ asset('storage/'.$topic['icon_image_link']) }}" alt="{{ $topic['name'] }}">
                @else
                    <img class="size-48 object-cover min-w-48 rounded-full border-8 border-white" src="{{ asset('storage/topic_default.jpg') }}" alt="{{ $topic['name'] }}">
                @endif
                <div class="flex w-full items-end p-4">
                    <div class="flex w-full flex-col">
                        <div class="flex justify-between font-bold text-4xl">
                            <div>y/{{ $topic->name }}</div>
                            <div class="flex">
                                <button id="bell" onclick="followTopic({{ $topic->id }})" class="cursor-pointer group">
                                    @if((auth()->check() && auth()->user()->topicFollowings()->where('topic_id', '=', $topic->id)->exists()))
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="following size-10 text-yellow-400">
                                            <path d="M5.85 3.5a.75.75 0 0 0-1.117-1 9.719 9.719 0 0 0-2.348 4.876.75.75 0 0 0 1.479.248A8.219 8.219 0 0 1 5.85 3.5ZM19.267 2.5a.75.75 0 1 0-1.118 1 8.22 8.22 0 0 1 1.987 4.124.75.75 0 0 0 1.48-.248A9.72 9.72 0 0 0 19.266 2.5Z" />
                                            <path fill-rule="evenodd" d="M12 2.25A6.75 6.75 0 0 0 5.25 9v.75a8.217 8.217 0 0 1-2.119 5.52.75.75 0 0 0 .298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 1 0 7.48 0 24.583 24.583 0 0 0 4.83-1.244.75.75 0 0 0 .298-1.205 8.217 8.217 0 0 1-2.118-5.52V9A6.75 6.75 0 0 0 12 2.25ZM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 0 0 4.496 0l.002.1a2.25 2.25 0 1 1-4.5 0Z" clip-rule="evenodd" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                             class="not-following size-10 group-hover:hidden">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="size-10 hidden group-hover:block text-yellow-400">
                                            <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z" clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                </button>
                                <a href="{{ route('topics.posts.create', $topic) }}" class="flex cursor-pointer group">
                                    <div class="relative size-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 absolute top-0 cursor-pointer opacity-100 group-hover:opacity-0 transition-opacity">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10 absolute top-0 cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity">
                                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="font-normal">create</span>
                                </a>
                                @if(auth()->check() && auth()->id() == $topic->owner_id)
                                    <a href="{{ route('topics.edit', $topic) }}" class="relative group size-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-lime-300 absolute top-0 cursor-pointer opacity-100 group-hover:opacity-0 transition-opacity">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10 text-lime-300 absolute top-0 cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity">
                                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('topics.destroy', $topic) }}" method="post" class="relative size-10">
                                        @csrf
                                        @method('delete')
                                        <button class="relative group size-10">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-red-500 absolute top-0 cursor-pointer opacity-100 group-hover:opacity-0 transition-opacity">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10 text-red-500 absolute top-0 cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity">
                                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>

                                @endif
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
                        <span>{{ $sortBy ?? 'Best' }}</span>
                    </button>
                    <button id="orderBy" class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                             stroke="currentColor"
                            @class([
                                'size-6 transition',
                                'desc' => $orderBy === 'desc' || empty($orderBy),
                                'asc rotate-180' => $orderBy === 'asc',
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
                @if(auth()->check() && auth()->user()->topicFollowings()->where('topic_id', '=', $topic->id)->exists())
                    <button onclick="followTopic({{ $topic->id }})" class="follow-topic-button bg-brand-900 font-semibold text-brand-300 p-1 px-2 rounded-4xl cursor-pointer">
                        Joined
                    </button>
                @else
                    <button onclick="followTopic({{ $topic->id }})" class="follow-topic-button bg-brand-900 font-semibold text-brand-100 p-1 px-2 rounded-4xl cursor-pointer">
                        Join
                    </button>
                @endif
            </div>
            <div>{{ $topic['description'] }}</div>
            <div class="font-lazy-dog tracking-widest font-bold text-gray-800">CREATED AT: {{ $topic['created_at']->format('d M Y') }}</div>
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
        function followTopic(topicId) {
            $.ajax({
                url: `/topics/${topicId}/follow`,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function (response) {
                    if (response.is_following === true) {
                        const html = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="following size-10 text-yellow-400">
                                            <path d="M5.85 3.5a.75.75 0 0 0-1.117-1 9.719 9.719 0 0 0-2.348 4.876.75.75 0 0 0 1.479.248A8.219 8.219 0 0 1 5.85 3.5ZM19.267 2.5a.75.75 0 1 0-1.118 1 8.22 8.22 0 0 1 1.987 4.124.75.75 0 0 0 1.48-.248A9.72 9.72 0 0 0 19.266 2.5Z" />
                                            <path fill-rule="evenodd" d="M12 2.25A6.75 6.75 0 0 0 5.25 9v.75a8.217 8.217 0 0 1-2.119 5.52.75.75 0 0 0 .298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 1 0 7.48 0 24.583 24.583 0 0 0 4.83-1.244.75.75 0 0 0 .298-1.205 8.217 8.217 0 0 1-2.118-5.52V9A6.75 6.75 0 0 0 12 2.25ZM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 0 0 4.496 0l.002.1a2.25 2.25 0 1 1-4.5 0Z" clip-rule="evenodd" />
                                        </svg>`
                        $('#bell').empty().append(html);
                        $('.follow-topic-button').text('Joined').removeClass('text-brand-100').addClass('text-brand-300');
                    } else if (response.is_following === false) {
                        const html = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                             class="not-following size-10 group-hover:hidden">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="size-10 hidden group-hover:block text-yellow-400">
                                            <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z" clip-rule="evenodd" />
                                        </svg>`
                        $('#bell').empty().append(html);
                        $('.follow-topic-button').text('Join').removeClass('text-brand-300').addClass('text-brand-100');
                    }
                },
                error: function (response) {
                    if (response.status === 401) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Unauthorized',
                            text: 'You must be logged in to follow topic.'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.responseJSON?.message || 'Something went wrong.'
                        });
                    }
                }
            })
        }

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

        $('.share-post-button').on('click', function () {
            let postId = $(this).data('post-id');
            let postUrl = $(this).data('url');

            // Copy to clipboard
            navigator.clipboard.writeText(postUrl).then(() => {
                // AJAX to increment share count
                $.ajax({
                    url: '/posts/' + postId + '/share',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#share-count-' + postId).text(response.share_count);
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Link copied to clipboard.'
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
