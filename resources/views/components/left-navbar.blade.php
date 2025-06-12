@php
    use Illuminate\Support\Facades\Auth;

    if (Auth::check()) {
        $user = Auth::user();
        $userTopicFollowings = $user->topicFollowings()->get();
        $recentlyVisitedTopics = $user->topicsVisited()->latest()->get();
    }
@endphp
<nav
    class="flex flex-col text-2xl font-bold tracking-wider bg-brand-900 text-brand-500 p-2 gap-4 max-w-64 w-full overflow-auto">
    <a href="{{ route('dashboard') }}" class="flex items-end gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
            <path
                d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z"/>
            <path
                d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z"/>
        </svg>
        <div>HOME</div>
    </a>
    <div class="flex items-end gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
            <path fill-rule="evenodd"
                  d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z"
                  clip-rule="evenodd"/>
        </svg>
        <div>POPULAR</div>
    </div>
    <div class="flex items-end gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8">
            <path d="M8.25 10.875a2.625 2.625 0 1 1 5.25 0 2.625 2.625 0 0 1-5.25 0Z"/>
            <path fill-rule="evenodd"
                  d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.125 4.5a4.125 4.125 0 1 0 2.338 7.524l2.007 2.006a.75.75 0 1 0 1.06-1.06l-2.006-2.007a4.125 4.125 0 0 0-3.399-6.463Z"
                  clip-rule="evenodd"/>
        </svg>
        <div>EXPLORE</div>
    </div>
    <hr class="border border-brand-500">
    <div id="recent-bar" class="flex justify-between cursor-pointer">
        <div class="font-bold">RECENT</div>
        <button id="recent-button" class="cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                 stroke="currentColor" class="size-6 transition ease-out">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5"/>
            </svg>
        </button>
    </div>
    <ul id="recent-tab" class="flex flex-col gap-2">
        @if(isset($recentlyVisitedTopics))
            @if(count($recentlyVisitedTopics) === 0)
                <li class="relative">
                    <div class="absolute bg-linear-0 -top-10 from-brand-900 h-8 w-full"></div>
                    <div class="">
                        (～﹃～)~zZ
                    </div>
                </li>
            @endif
            @foreach($recentlyVisitedTopics as $topic)
                @if($loop->index < 4)
                    <li>
                        <a class="flex gap-2 cursor-pointer" href="{{ route('topics.show', $topic) }}">
                            <img src="{{ asset('storage/'.$topic['icon_image_link']) }}" alt="{{ $topic['name'] }}"
                                 class="size-8 object-cover rounded-full">
                            <div>y/{{ $topic['name'] }}</div>
                        </a>
                    </li>
                @else
                    <li class="relative cursor-pointer">
                        <div class="absolute bg-linear-0 -top-10 from-brand-900 h-8 w-full"></div>
                        <div class="">
                            View more...
                        </div>
                    </li>
                    @break
                @endif
            @endforeach
        @else
            <li class="relative">
                <div class="absolute bg-linear-0 -top-10 from-brand-900 h-8 w-full"></div>
                <div>
                    Login now to keep track of recent topics <span class="whitespace-nowrap">(o゜▽゜)o☆</span>
                </div>
            </li>
        @endif

    </ul>
    <hr class="border border-brand-500">
    <div id="topics-bar" class="flex justify-between cursor-pointer">
        <div class="font-bold">TOPICS</div>
        <button id="topics-button" class="cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                 stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5"/>
            </svg>
        </button>
    </div>
    <ul id="topics-tab" class="flex flex-col gap-2">
        @if(isset($userTopicFollowings))
            @if(count($userTopicFollowings) === 0)
                <li class="relative">
                    <div class="absolute bg-linear-0 -top-10 from-brand-900 h-8 w-full"></div>
                    <div class="">
                        (～﹃～)~zZ
                    </div>
                </li>
            @endif
            @foreach($userTopicFollowings as $topicFollowing)
                @if($loop->index < 5)
                    <li>
                        <a href="{{ route('topics.show', $topicFollowing) }}" class="flex gap-2 cursor-pointer">
                            <img src="{{ asset('storage/'.$topicFollowing['icon_image_link']) }}"
                                 alt="{{ $topicFollowing['name'] }}"
                                 class="size-8 object-cover rounded-full">
                            <div>y/{{ $topicFollowing['name'] }}</div>
                        </a>
                    </li>
                @else
                    <li class="relative cursor-pointer">
                        <div class="absolute bg-linear-0 -top-10 from-brand-900 h-8 w-full"></div>
                        <div class="">
                            View more...
                        </div>
                    </li>
                    @break
                @endif
            @endforeach
        @else
            <li class="relative">
                <div class="absolute bg-linear-0 -top-10 from-brand-900 h-8 w-full"></div>
                <div>
                    Login now to start following topics <span class="whitespace-nowrap">(>'-'<)</span>
                </div>
            </li>
        @endif

    </ul>
</nav>
<script>
    $('#recent-bar').on("click", function () {
        $('#recent-tab').slideToggle();
        $(this).children('button').children().first().toggleClass('rotate-180');
    });

    $('#topics-bar').on("click", function () {
        $('#topics-tab').slideToggle();
        $(this).children('button').children().first().toggleClass('rotate-180');
    });
</script>
