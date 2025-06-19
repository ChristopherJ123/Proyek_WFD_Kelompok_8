@extends('layouts.app')

@section('content')
    <div class="flex gap-4 w-full m-4">
        <div class="flex flex-col w-full gap-4 overflow-y-auto">
            <div class="text-xl font-bold tracking-wide">CREATE POST</div>
            <hr class="border-1">
            <form action="{{ route('topics.posts.store', $topic) }}" method="post" enctype="multipart/form-data" class="flex flex-col bg-brand-300 p-4 rounded-2xl gap-4 font-sans">
                @csrf
                <div class="flex">
                    <div class="flex gap-2 rounded-3xl bg-brand-100 p-4 font-bold font-lazy-dog text-2xl tracking-wide">
                        <img class="size-8 object-cover rounded-full" src="{{ asset('storage/'.$topic->icon_image_link) }}"
                             alt="{{ $topic->name }}">
                        <div>y/{{ $topic->name }}</div>
                    </div>
                </div>
                <div class="relative">
                    <input class="bg-brand-100 focus:outline-brand-500 focus:outline-2 w-full p-4 rounded-3xl text-lg peer placeholder-transparent" type="text" name="title" id="title" placeholder="Title*">
                    <label class="absolute left-4 top-4 text-lg peer-placeholder-shown:visible peer-focus:invisible invisible" for="title">Title<span class="font-bold text-red-500">*</span></label>
                </div>
                <div class="flex w-full">
                    <div id="images-container" class="flex items-center gap-2 p-2 pe-4 rounded-4xl font-semibold bg-brand-900 text-brand-300 cursor-pointer">
                        <div class="bg-brand-500 rounded-full p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-white">
                                <path d="M9.97.97a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1-1.06 1.06l-1.72-1.72v3.44h-1.5V3.31L8.03 5.03a.75.75 0 0 1-1.06-1.06l3-3ZM9.75 6.75v6a.75.75 0 0 0 1.5 0v-6h3a3 3 0 0 1 3 3v7.5a3 3 0 0 1-3 3h-7.5a3 3 0 0 1-3-3v-7.5a3 3 0 0 1 3-3h3Z" />
                                <path d="M7.151 21.75a2.999 2.999 0 0 0 2.599 1.5h7.5a3 3 0 0 0 3-3v-7.5c0-1.11-.603-2.08-1.5-2.599v7.099a4.5 4.5 0 0 1-4.5 4.5H7.151Z" />
                            </svg>
                        </div>
                        <div id="preview-image-text" class="overflow-hidden max-w-xl">Add Pictures or Drag</div>
                    </div>
                </div>
                <div id="preview-image-container" class="flex gap-2 overflow-x-auto">

                </div>
                <textarea class="resize-none bg-brand-100 focus:outline-brand-500 focus:outline-2 p-4 rounded-3xl text-lg" name="description" id="description" cols="30" rows="8" placeholder="Body Text (Optional)"></textarea>
                <div class="flex flex-row-reverse">
                    <button class="p-2 rounded-4xl font-semibold bg-brand-900 text-brand-100 w-36" type="submit">Post</button>
                </div>
                <input class="hidden images-input" type="file" name="images[]" id="images" accept="image/*" multiple>
            </form>
        </div>

        <div class="flex flex-col gap-2 bg-brand-500 p-4 max-w-sm font-sans rounded-2xl">
            <div class="text-2xl font-bold font-lazy-dog whitespace-nowrap">
                y/{{ $topic->name }} rules
            </div>
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

        const $fileInput = $('#images');
        const $previewImageText = $('#preview-image-text');
        const $previewImageContainer = $('#preview-image-container');

        $('form').on('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('#images-container').addClass('border-2 border-dashed');
        }).on('dragleave', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('#images-container').removeClass('border-2 border-dashed');
        }).on('drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('#images-container').removeClass('border-2 border-dashed');

            const files = e.originalEvent.dataTransfer.files;
            $fileInput[0].files = files;
            handleFiles(files);
        })

        $('#images-container').on('click', function () {
            $fileInput.trigger('click');
        });

        $fileInput.on('change', function () {
            handleFiles(this.files);
        })

        function handleFiles(files) {
            $previewImageText.empty();
            $previewImageContainer.empty();

            let imageCount = 0;

            $.each(files, function (i, file) {
                if (!file.type.startsWith('image/')) return;

                imageCount++;

                const reader = new FileReader();
                reader.onload = function (e) {
                    const $img = $('<img>', {
                        src: e.target.result,
                        alt: 'image',
                        class: 'h-32 w-64 object-cover'
                    });
                    $previewImageText.text(`${imageCount} image(s) selected`);
                    $previewImageContainer.append($img);
                };
                reader.readAsDataURL(files[i]);
            });
        }
    </script>
@endsection
