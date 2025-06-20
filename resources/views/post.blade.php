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
                <div class="relative">
                    <button id="post-options-toggle" class="text-gray-700 hover:text-black focus:outline-none p-2 rounded-full hover:bg-gray-200 transition">
                        &#x22EE;
                    </button>
                    <div id="post-options-menu" class="hidden absolute right-0 z-10 mt-2 w-36 bg-white border border-gray-300 rounded shadow-md">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-not-allowed">Edit</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-not-allowed">Delete</a>
                        <button class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 report-post-btn" data-post-id="{{ $post->id }}">
                            Report
                        </button>
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
                @csrf
                @if(!auth()->check())
                    <input class="w-full focus:outline-0 placeholder-transparent peer"
                           type="text" name="message" id="message" placeholder="Login to join the discussion" disabled>
                    <label class="absolute left-2 peer-placeholder-shown:text-gray-600 peer-placeholder-shown:visible peer-focus:invisible invisible cursor-text" for="message">Login to join the discussion</label>
                @else
                    <input class="w-full focus:outline-0 placeholder-transparent peer"
                           type="text" name="message" id="message" placeholder="Join the discussion">
                    <label class="absolute left-2 peer-placeholder-shown:text-gray-600 peer-placeholder-shown:visible peer-focus:invisible invisible cursor-text" for="message">Join the discussion<span class="text-red-500 font-bold">*</span></label>
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
                <input class="hidden images-input" type="file" name="images[]" id="images" accept="image/*" multiple>
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


    </script>

@endsection
