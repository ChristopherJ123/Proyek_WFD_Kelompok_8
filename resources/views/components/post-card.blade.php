<li class="flex flex-col gap-2 text-white rounded-4xl bg-brand-300 p-4">
    <div class="flex flex-col gap-3">
        @if($showTopic === true)
            <div class="flex gap-2 mx-8">
                <img class="size-16 object-cover rounded-full" src="{{ asset('storage/'.$post->topic->icon_image_link) }}"
                     alt="{{ $post->topic->name }}">
                <div class="flex flex-col">
                    <a
                        href="{{ route('topics.show', $post->topic) }}"
                        class="font-bold text-3xl">y/{{ $post->topic->name }}</a>
                    <div class="font-sans tracking-wide text-gray-200 text-sm font-medium">{{ $post->created_at->format('d M Y') }}</div>
                </div>
            </div>
        @endif
        @if($post->reports()->exists() && auth()->check() && (auth()->user()->role_id == 2 || auth()->user()->moderatedTopics()->where('topic_id', $post->topic_id)->exists()))
            <span class="bg-red-100 text-red-400 py-1 px-2 rounded-full font-sans text-sm font-semibold">Has been reported {{ $post->reports()->count() }} time(s)</span>
        @endif
        <a
            href="{{ route('topics.posts.show', [$post->topic, $post]) }}"
            class="font-sans tracking-normal mx-8 text-xl font-medium line-clamp-2">
            {{ $post['title'] }}
        </a>
        @if(count($post->images) > 0)
                <div
                    @class([
                        'grid grid-gap-1',
                        'grid-cols-1' => count($post->images) === 1,
                        'grid-cols-2' => count($post->images) >= 2
                    ])>
                    @foreach($post->images as $index => $image)
                        @if($index < 4)
                            <img
                                class="w-full h-full rounded-2xl"
                                src="{{ asset('storage/'.$image->image_link) }}"
                                alt="{{ $post->topic->name }}"
                            >
                        @endif
                    @endforeach
                </div>
        @endif
        <x-post-buttons :post="$post"></x-post-buttons>
    </div>
</li>
