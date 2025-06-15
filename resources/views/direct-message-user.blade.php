@extends('layouts.app')


@section('content')
    <div class="bg-brand-300 w-full"> 
        <div class="bg-brand-300 p-8 rounded-xl w-full max-w-6xl mx-auto">
            <div class="text-3xl">
                Chatting with User: <span class="underline">{{ $user->username }}</span>
            </div> 
            
            <div id="chatBox" class="border p-4 h-96 w-full overflow-y-scroll bg-brand-100 rounded mb-6">
                @foreach ($messages  as $msg)
                    <div class="mb-4 {{ $msg->sender_id === auth()->id() ? 'text-right' : 'text-left' }}">
                        <div class="inline-block px-3 py-2 rounded-lg
                            {{ $msg->sender_id === auth()->id() ? 'bg-brand-900 text-white' : 'bg-brand-500 border' }}">
                            {{ $msg->message }}

                            @if ($msg->images && $msg->images->count())
                                <div class="grid gap-2 max-w-sm
                                    @if ($msg->images->count() === 1) grid-cols-1
                                    @elseif ($msg->images->count() === 2) grid-cols-2
                                    @elseif ($msg->images->count() === 3 || $msg->images->count() === 4) grid-cols-2
                                    @endif">

                                    {{-- //buat yang kayak image 3 T susah brahhhhh --}}

                                    @foreach ($msg->images->take(4) as $image)
                                        <img src="{{ asset('storage/' . $image->image_link) }}"
                                            class="w-full h-32 object-cover rounded" alt="Image">
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        @if ($msg->sender_id === auth()->id())
                            <div class="text-xs text-gray-500 mt-1">
                                {{ $msg->is_read ? 'Seen' : 'Sent' }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <div>
                <form action="{{ route('messages.store', $user->id) }}" id="messageForm" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div class="relative w-full">
                        {{-- Input box--}}
                        <input type="text" name="message"
                            class="w-full py-2 pl-10 pr-20 rounded border bg-brand-100 border-black"
                            placeholder="Type a message..." 
                            autocomplete="off"/>

                        {{-- attach image (left side) --}}
                        <label for="images" class="absolute left-3 top-1/2 -translate-y-1/2 cursor-pointer rounded-4xl" title="Attach image (Max 4)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </label>
                        <input type="file" name="images[]" id="images" class="hidden" multiple onchange="limitImages(this)">

                        {{-- Send button (right side) --}}
                        <button type="submit"
                                class="absolute right-2 top-1/2 -translate-y-1/2 bg-brand-300 hover:bg-brand-500 text-white px-3 py-1 rounded">
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    

    <script>
    document.getElementById('messageForm').addEventListener('submit', function (e) {
        const message = document.querySelector('[name="message"]').value.trim();

        if (message === '') {
                e.preventDefault(); // Stop form submission
                alert('You cannot send an empty message.');
            }
        });

    function scrollToBottom() {
        const box = document.getElementById('chatBox');
        if (box) {
            box.scrollTop = box.scrollHeight;
        }
    }

    // Scroll when page loads
    window.onload = scrollToBottom;

    function limitImages(input) {
    if (input.files.length > 4) {
            alert("You can only upload up to 4 images.");
            input.value = ""; 
        }
    }
    </script>
@endsection

