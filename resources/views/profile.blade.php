@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <div class="flex w-full p-4 gap-6 text-brand-900 overflow-y-auto">
        {{-- Left: Avatar & Info --}}
        <div class="flex flex-col gap-4 w-full max-w-4xl">
            {{-- Avatar & Username --}}
            <div class="flex items-center gap-4">
                <div class="relative">
                    <img class="w-24 h-24 rounded-full object-cover border"
                         src="{{ $user->profile_picture_link ? asset('storage/' . $user->profile_picture_link) : asset('storage/profile_default.jpg') }}">
                </div>
                <div>
                    <h2 class="text-3xl font-bold uppercase tracking-wider">{{ strtoupper($user->username) }}</h2>
                    <p class="text-gray-600 text-2xl">{{ $user->bio ?? 'Write your bio here' }} <span class="text-red-500">*</span></p>
                </div>
            </div>

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

            @foreach($posts as $post)
                <x-post-card :post="$post"></x-post-card>
            @endforeach

            @if(!filled($posts))
                <hr class="border mt-2">
                <div class="text-center text-gray-500 mt-4 text-lg font-semibold">NO POST YET...</div>
            @endif
            {{ $posts->links() }}

        </div>

        {{-- Right: Profile Info --}}
        <div
            x-data="{ editing:false }"
            @keydown.escape.window="editing=false"     {{-- ⎋ to cancel --}}
            class="bg-brand-100 p-4 rounded-xl min-w-sm max-w-sm shadow-sm text-sm font-sans transition-all"
        >

            {{-- ───────────────── DISPLAY MODE ───────────────── --}}
            <div x-show="!editing" x-transition.opacity.scale>
                <div class="flex justify-between items-center mb-3">
                    <span class="font-bold text-lg">PROFILE</span>
                    <button
                        type="button"
                        @click="editing=true"
                        class="text-blue-700 underline focus:outline-none"
                    >
                        EDIT
                    </button>
                </div>

                <div class="mb-4">
                    <div class="text-gray-600 uppercase text-xs">Biography</div>
                    <div class="font-semibold">{{ $user->bio ?? '-' }}</div>
                </div>

                <div class="mb-4">
                    <div class="text-gray-600 uppercase text-xs">Education status</div>
                    <div class="font-semibold">{{ $user->education ?? '-' }}</div>
                </div>

                <div class="mb-4">
                    <div class="text-gray-600 uppercase text-xs">Most Recent School/University</div>
                    <div class="font-semibold">{{ $user->university ?? '-' }}</div>
                </div>

                <div class="mb-4">
                    <div class="text-gray-600 uppercase text-xs">Your Birthdate<span class="text-red-500">*</span></div>
                    <div class="font-semibold">{{ $user->birth_date }}</div>
                </div>

                <hr class="my-3 border">

                <div class="text-xs text-gray-500">
                    <p>CREATED AT<br>{{ $user->created_at->format('d‑m‑Y') }}</p>
                    <p class="mt-2">UPDATED AT<br>{{ $user->updated_at->format('d‑m‑Y') }}</p>
                </div>
            </div>

            {{-- ───────────────── EDIT MODE ───────────────── --}}
            <form
                x-show="editing"
                x-transition.opacity.scale
                x-cloak                 {{-- keep hidden until Alpine is ready --}}
                method="POST"
                action="{{ route('profile.update', $user) }}"
                enctype="multipart/form-data"
                class="space-y-4"
            >
                @csrf
                @method('PUT')

                <div class="flex justify-between items-center mb-1">
                    <span class="font-bold text-lg">EDIT PROFILE</span>
                    <button
                        type="button"
                        @click="editing=false"
                        class="text-red-600 underline text-xs"
                    >
                        Cancel
                    </button>
                </div>

                {{-- Profile picture --}}
                <div>
                    <label class="block text-gray-600 uppercase text-xs mb-1">Profile picture</label>
                    <input
                        type="file"
                        name="avatar"
                        accept="image/*"
                        class="block w-full text-sm text-gray-700
                       file:mr-4 file:py-2 file:px-4
                       file:rounded-full file:border-0
                       file:text-sm file:font-semibold
                       file:bg-brand-900 file:text-brand-300
                       hover:file:bg-brand-800"
                    >
                    @error('avatar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Bio --}}
                <div>
                    <label class="block text-gray-600 uppercase text-xs mb-1">Biography</label>
                    <textarea
                        name="bio"
                        rows="3"
                        class="w-full p-2 rounded-lg border border-brand-500 focus:border-brand-500"
                    >{{ old('bio', $user->bio) }}</textarea>
                    @error('bio') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Education status --}}
                <div>
                    <label class="block text-gray-600 uppercase text-xs mb-1">Education status</label>
                    <input
                        type="text"
                        name="education"
                        value="{{ old('education', $user->education) }}"
                        class="w-full p-2 rounded-lg border border-brand-500 focus:ring-brand-500"
                    >
                    @error('education') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- University --}}
                <div>
                    <label class="block text-gray-600 uppercase text-xs mb-1">Most Recent School/University</label>
                    <input
                        type="text"
                        name="university"
                        value="{{ old('university', $user->university) }}"
                        class="w-full p-2 rounded-lg border border-brand-500 focus:ring-brand-500"
                    >
                    @error('university') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Birthdate --}}
                <div>
                    <label class="block text-gray-600 uppercase text-xs mb-1">
                        Your Birthdate<span class="text-red-500">*</span>
                    </label>
                    <input
                        type="date"
                        name="birth_date"
                        value="{{ old('birth_date', $user->birth_date) }}"
                        class="w-full p-2 rounded-lg border border-brand-500 focus:ring-brand-500"
                        required
                    >
                    @error('birth_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Submit --}}
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="bg-brand-900 text-brand-300 font-semibold py-2 px-4 rounded-xl hover:bg-brand-800 transition"
                    >
                        Save
                    </button>
                </div>
            </form>
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
