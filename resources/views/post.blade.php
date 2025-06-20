@extends('layouts.app')

@section('title', 'Post')

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
            <div class="flex justify-between items-center">
                <div class="flex flex-col gap-1">
                    <div class="text-3xl font-extrabold">
                        {{ $post->title }}
                    </div>
                    <div class="text-gray-500 tracking-wider text-sm">
                        CREATED AT: {{ $post->created_at->format('d-m-Y') }}
                    </div>
                </div>
                <div class="flex gap-2">
                    @if(auth()->check() && auth()->id() === $post->author_id)
                        <a href="{{ route('topics.posts.edit', [$topic, $post]) }}" class="relative group size-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-lime-300 absolute top-0 cursor-pointer opacity-100 group-hover:opacity-0 transition-opacity">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10 text-lime-300 absolute top-0 cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity">
                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                            </svg>
                        </a>
                        <form action="{{ route('topics.posts.destroy', [$topic, $post]) }}" method="post" class="relative size-10">
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
                    <div class="relative">
                        <button id="post-options-toggle" class="text-gray-700 hover:text-black focus:outline-none rounded-full hover:bg-gray-200 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                            </svg>
                        </button>
                        <div id="post-options-menu" class="hidden absolute right-0 z-10 mt-2 w-36 bg-white border border-gray-300 rounded shadow-md">
                            <button class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 report-post-btn" data-post-id="{{ $post->id }}">
                                Report
                            </button>
                            @if(auth()->check() && (auth()->user()->role_id === 2 || auth()->user()->moderatedTopics()->where('topic_id', $topic->id)->exists()))
                                <button class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 ban-from-topic-btn"
                                        data-post-id="{{ $post->id }}"
                                        data-topic-id="{{ $topic->id }}"
                                        data-user-id="{{ $post->author->id }}">
                                    Ban from Topic
                                </button>
                                <button class="block w-full text-left px-4 py-2 text-sm text-green-600 hover:bg-gray-100 unban-from-topic-btn"
                                        data-topic-id="{{ $topic->id }}"
                                        data-user-id="{{ $post->author->id }}">
                                    Unban from Topic
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-lg">
                {{ $post->description }}
            </div>
            <div>
                @foreach($post->images as $image)
                    <img class="max-h-96" src="{{ asset('storage/'.$image->image_link) }}" alt="{{ $topic->name }}">
                @endforeach
            </div>
            <x-post-buttons :post="$post"></x-post-buttons>
            <form action="{{ route('topics.posts.comments.store', [$topic, $post]) }}" method="post" enctype="multipart/form-data" class="border-4 border-brand-900 rounded-4xl p-2 relative">
                @if(!auth()->check())
                    <form class="border-4 border-brand-900 rounded-4xl p-2 relative">
                        <input class="w-full focus:outline-0 placeholder-transparent peer"
                            type="text" name="message" id="message" placeholder="Login to join the discussion" disabled>
                        <label class="absolute left-2 peer-placeholder-shown:text-gray-600 peer-placeholder-shown:visible peer-focus:invisible invisible cursor-text" for="message">Login to join the discussion</label>
                    </form>
                @elseif($isBanned)
                    <form class="border-4 border-red-900 bg-red-50 rounded-4xl p-4">
                        <div class="text-red-800 font-semibold">You are banned from commenting in this topic.</div>
                    </form>
                @else
                    <form action="{{ route('topics.posts.comments.store', [$topic, $post]) }}" method="post" enctype="multipart/form-data" class="border-4 border-brand-900 rounded-4xl p-2 relative">
                        @csrf
                        <input class="w-full focus:outline-0 placeholder-transparent peer"
                            type="text" name="message" id="message" placeholder="Join the discussion">
                        <label class="absolute left-2 peer-placeholder-shown:text-gray-600 peer-placeholder-shown:visible peer-focus:invisible invisible cursor-text" for="message">Join the discussion<span class="text-red-500 font-bold">*</span></label>

                        <div class="comment-add-picture flex w-fit mt-4 items-center gap-2 p-2 rounded-4xl font-semibold bg-brand-900 text-brand-300 cursor-pointer">
                            <span class="bg-brand-300 rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-white">
                                    <path d="M9.97.97a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1-1.06 1.06l-1.72-1.72v3.44h-1.5V3.31L8.03 5.03a.75.75 0 0 1-1.06-1.06l3-3ZM9.75 6.75v6a.75.75 0 0 0 1.5 0v-6h3a3 3 0 0 1 3 3v7.5a3 3 0 0 1-3 3h-7.5a3 3 0 0 1-3-3v-7.5a3 3 0 0 1 3-3h3Z" />
                                    <path d="M7.151 21.75a2.999 2.999 0 0 0 2.599 1.5h7.5a3 3 0 0 0 3-3v-7.5c0-1.11-.603-2.08-1.5-2.599v7.099a4.5 4.5 0 0 1-4.5 4.5H7.151Z" />
                                </svg>
                            </span>
                            <div>Add Pictures</div>
                        </div>
                        <input class="hidden images-input" type="file" name="images[]" id="images" accept="image/*" multiple>
                    </form>
                @endif
            </form>

            <div class="flex flex-col gap-4 overflow-x-auto min-h-fit">
                @foreach($comments as $comment)
                    <x-comment-item :post="$post" :comment="$comment" :newComment="$newComment ?? null"></x-comment-item>
                @endforeach
            </div>

        </div>

        <div class="flex flex-col gap-2 bg-brand-500 p-4 min-w-sm max-w-sm font-sans">
            <div class="flex items-center gap-2">
                <div class="text-2xl font-bold text-gray-800 font-lazy-dog tracking-widest">y/{{ $topic->name }}</div>
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
            <div>
                {{ $topic->description }}
            </div>
            <div class="font-lazy-dog tracking-widest font-bold text-gray-800">CREATED AT: {{ $topic['created_at']->format('d M Y') }}</div>
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

        $('.comment-add-picture').on('click', function () {
            $(this).siblings('input[type="file"]').click();
            $(this).children('div').text()
        });

        $('.images-input').on('change', function () {
            const imagesCount = countImages(this.files)
            console.log(imagesCount)
            $(this).siblings('.comment-add-picture').children('div').text(`${imagesCount} image(s) selected`)
        })

        function countImages(files) {
            let imageCount = 0;

            $.each(files, function (i, file) {
                if (!file.type.startsWith('image/')) return;
                imageCount++;
            });
            return imageCount;
        }

        $('.comment-reply-button').on('click', function () {
            $(this).parent().parent().children('.comment-reply-form').toggle();
        })

        // SCRIPT TAMBAHAN UNTUK REPORT COMMENT VIA AJAX
         $('.report-comment-btn').on('click', function () {
            const postId = $(this).data('post-id');
            const commentId = $(this).data('comment-id');

            Swal.fire({
                title: 'Report Comment',
                input: 'text',
                inputLabel: 'Reason',
                inputPlaceholder: 'Enter the reason for reporting...',
                inputAttributes: {
                    'aria-label': 'Reason'
                },
                showCancelButton: true,
                confirmButtonText: 'Report',
                preConfirm: (reason) => {
                    if (!reason) {
                        Swal.showValidationMessage('You must provide a reason!');
                    }
                    return reason;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/report/comment/${commentId}`,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            post_id: postId,
                            post_comment_id: commentId,
                            reason: result.value,
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Reported',
                                text: response.message || 'Comment has been reported.'
                            });
                        },
                        error: function (response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: response.responseJSON?.message || 'Could not report comment.'
                            });
                        }
                    });
                }
            });
        });

        // dropdown tiga titik
        $('#post-options-toggle').on('click', function () {
            $('#post-options-menu').toggle();
        });

        // report post
        $('.report-post-btn').on('click', function () {
            const postId = $(this).data('post-id');

            Swal.fire({
                title: 'Report Post',
                input: 'text',
                inputLabel: 'Reason',
                inputPlaceholder: 'Enter the reason for reporting...',
                inputAttributes: {
                    'aria-label': 'Reason'
                },
                showCancelButton: true,
                confirmButtonText: 'Report',
                preConfirm: (reason) => {
                    if (!reason) {
                        Swal.showValidationMessage('You must provide a reason!');
                    }
                    return reason;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/report/post/${postId}`,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            post_id: postId,
                            reason: result.value,
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Reported',
                                text: response.message || 'Post has been reported.'
                            });
                        },
                        error: function (response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: response.responseJSON?.message || 'Could not report post.'
                            });
                        }
                    });
                }
            });
        });

        // ban dari topic
        $('.ban-from-topic-btn').on('click', function () {
            const postId = $(this).data('post-id');
            const topicId = $(this).data('topic-id');
            const userId = $(this).data('user-id');

            Swal.fire({
                title: 'Ban User from Topic',
                input: 'text',
                inputLabel: 'Reason',
                inputPlaceholder: 'Enter reason for banning...',
                showCancelButton: true,
                confirmButtonText: 'Ban',
                preConfirm: (reason) => {
                    if (!reason) {
                        Swal.showValidationMessage('Reason is required.');
                    }
                    return reason;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/topics/${topicId}/ban/${userId}`,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            user_id: userId,
                            reason: result.value,
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'User Banned',
                                text: response.message || 'User has been banned from this topic.'
                            });
                        },
                        error: function (response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: response.responseJSON?.message || 'Ban failed.'
                            });
                        }
                    });
                }
            });
        });

        //ban topic comment
        $('.ban-user-btn').on('click', function () {
            const topicId = $(this).data('topic-id');
            const userId = $(this).data('user-id');

            Swal.fire({
                title: 'Ban User from Topic',
                input: 'text',
                inputLabel: 'Reason',
                inputPlaceholder: 'Enter reason for banning...',
                showCancelButton: true,
                confirmButtonText: 'Ban',
                preConfirm: (reason) => {
                    if (!reason) {
                        Swal.showValidationMessage('Reason is required.');
                    }
                    return reason;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/topics/${topicId}/ban/${userId}`,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            reason: result.value,
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'User Banned',
                                text: response.message || 'User has been banned from this topic.'
                            });
                        },
                        error: function (response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: response.responseJSON?.message || 'Ban failed.'
                            });
                        }
                    });
                }
            });
        });

        // unban dari topic
        $('.unban-from-topic-btn').on('click', function () {
            const topicId = $(this).data('topic-id');
            const userId = $(this).data('user-id');

            Swal.fire({
                title: 'Unban User from Topic',
                text: 'Are you sure you want to unban this user?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, unban',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/topics/${topicId}/unban/${userId}`,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'User Unbanned',
                                text: response.message || 'User has been unbanned from this topic.'
                            });
                        },
                        error: function (response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: response.responseJSON?.message || 'Could not unban user.'
                            });
                        }
                    });
                }
            });
        });

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
