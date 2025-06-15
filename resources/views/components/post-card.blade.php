<li class="flex flex-col gap-2 text-white rounded-4xl bg-brand-300 p-4">
    <div class="flex flex-col gap-3">
        @if($showTopic === true)
            <div class="flex gap-2 mx-8">
                <img class="size-8 object-cover rounded-full" src="{{ asset('storage/'.$post->topic->icon_image_link) }}"
                     alt="{{ $post->topic->icon_image_link }}">
                <a
                    href="{{ route('topics.show', $post->topic) }}"
                    class="font-bold text-2xl">y/{{ $post->topic->name }}</a>
            </div>
        @endif
        <a
            href="{{ route('topics.posts.show', [$post->topic, $post]) }}"
            class="font-sans tracking-normal mx-8 text-xl font-medium line-clamp-2">
            {{ $post['title'] }}
        </a>
        @if(count($post->images) > 0)
            <img class="max-h-96 mx-8 object-cover rounded-2xl"
                 src="{{ asset('storage/'.$post->images[0]->image_link) }}"
                 alt="{{ $post->images[0]->image_link }}">
        @endif
        <x-post-buttons :post="$post"></x-post-buttons>
    </div>
</li>
