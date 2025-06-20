@extends('layouts.app')

@section('title', 'Notifications')

@section('content')
    <div class="bg-brand-300 p-8 w-full overflow-y-auto text-lg">
        <div class="text-2xl font-bold text-center">
            Your Notifications
        </div>
        @if (session('error'))
            <div class="mb-4 text-red-500">{{ session('error') }}</div>
        @endif
        @if ($notifications->isEmpty())
            <div class="text-center text-gray-500 italic mt-4">No notifications</div>
            @foreach ($notifications as $notif)
                @php
                    $type = $notif['type'];
                    $data = $notif['data'];
                    $me = auth()->id();
                @endphp

                <div
                    class="p-4 bg-brand-500 rounded  border-l-4 text-white
        @if ($type === 'comment' && $data->is_marked_answer) border-green-500
        @elseif ($type === 'comment' && $data->parent_message_id)
            border-blue-500
        @elseif ($type === 'comment')
            border-yellow-500
        @elseif ($type === 'dm')
            border-white
        @elseif ($type === 'upvote')
            border-red-500 @endif
    ">
                    <div class="text-gray-700">
                        @if ($type === 'comment')
                            @if ($data->is_marked_answer && !$data->is_post_comment_owner_read)
                                <div>{{ $data->author->username }} Marked your comment as answer.</div>
                                <div class="text-sm text-white italic">
                                    Comment: "{{ $data->message }}"
                                </div>
                                <a class="text-blue-600  underline"
                                    href="{{ route('notifications.redirect', ['type' => 'comment', 'id' => $data->id]) }}">Open
                                    Post</a>
                            @elseif (!$data->is_parent_message_owner_read && $data->parent && $data->parent->author_id === auth()->id())
                                <div>{{ $data->author->username }} replied to your comment.</div>
                                <div class="text-sm text-white italic">
                                    Comment: "{{ $data->message }}"
                                </div>
                                <a class="text-blue-600  underline"
                                    href="{{ route('notifications.redirect', ['type' => 'comment', 'id' => $data->id]) }}">Open
                                    Post</a>
                            @elseif (!$data->is_post_owner_read)
                                <div>{{ $data->author->username }} commented on your post.</div>
                                <div class="text-sm text-white italic">
                                    Comment: "{{ $data->message }}"
                                </div>
                                <a class="text-blue-600  underline"
                                    href="{{ route('notifications.redirect', ['type' => 'comment', 'id' => $data->id]) }}">Open
                                    Post</a>
                            @endif
                        @elseif ($type === 'dm')
                            {{ $data->sender->username }} sent you a direct message.
                            <div class="text-gray-500 italic">"{{ Str::limit($data->message, 25) }}"</div>
                            <a href="{{ route('notifications.redirect', ['type' => 'dm', 'id' => $data->id]) }}"
                                class="text-blue-600  underline">Open
                                message</a>
                        @elseif ($type === 'upvote')
                            {{ $data->user->username }} up voted
                            @if ($data->post)
                                your post.
                                <br>
                                <div class="text-sm text-white italic">
                                    Post: "{{ $data->post->title }}"
                                </div>
                                <a href="{{ route('notifications.redirect', ['type' => 'upvote', 'id' => $data->id]) }}"
                                    class="text-blue-600  underline">
                                    Open Post
                                </a>
                            @elseif ($data->comment)
                                comment.
                                <br>
                                <div class="text-sm text-white italic">
                                    Comment: "{{ \Illuminate\Support\Str::limit($data->comment->message, 25, '...') }}"
                                </div>
                                <a href="{{ route('topics.posts.show', [$data->comment->post->topic, $data->comment->post]) }}"
                                    class="text-blue-600  underline">
                                    Open Comment
                                </a>
                            @endif
                        @endif
                    </div>

                    <div class="text-white mt-1">
                        {{ $notif['created_at']->diffForHumans() }}
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    </div>
    </div>
@endsection
