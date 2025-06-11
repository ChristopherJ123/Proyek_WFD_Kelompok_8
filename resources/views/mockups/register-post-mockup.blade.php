@extends('layouts.app')

@section('content')
    <div class="flex gap-4 w-full m-4">
        <div class="flex flex-col w-full gap-4">
            <div class="text-xl font-bold tracking-wide">CREATE POST</div>
            <hr class="border-1">
            <form class="flex flex-col bg-brand-300 p-4 rounded-2xl gap-4 font-sans">
                <div class="flex">
                    <div class="flex rounded-3xl bg-brand-100 p-4 font-bold font-lazy-dog text-2xl tracking-wide">y/cook</div>
                </div>
                <div class="relative">
                    <input class="bg-brand-100 focus:outline-brand-500 focus:outline-2 w-full p-4 rounded-3xl text-lg peer placeholder-transparent" type="text" name="title" id="title" placeholder="Title*">
                    <label class="absolute left-4 top-4 text-lg peer-placeholder-shown:visible peer-focus:invisible" for="title">Title<span class="font-bold text-red-500">*</span></label>
                </div>
                <div class="flex w-full">
                    <div id="images-container" class="flex w-full items-center gap-2 p-2 rounded-4xl font-semibold bg-brand-900 text-brand-300">
                        <div class="bg-brand-500 rounded-full p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-white">
                                <path d="M9.97.97a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1-1.06 1.06l-1.72-1.72v3.44h-1.5V3.31L8.03 5.03a.75.75 0 0 1-1.06-1.06l3-3ZM9.75 6.75v6a.75.75 0 0 0 1.5 0v-6h3a3 3 0 0 1 3 3v7.5a3 3 0 0 1-3 3h-7.5a3 3 0 0 1-3-3v-7.5a3 3 0 0 1 3-3h3Z" />
                                <path d="M7.151 21.75a2.999 2.999 0 0 0 2.599 1.5h7.5a3 3 0 0 0 3-3v-7.5c0-1.11-.603-2.08-1.5-2.599v7.099a4.5 4.5 0 0 1-4.5 4.5H7.151Z" />
                            </svg>
                        </div>
                        <div id="preview-image-text" class="overflow-hidden max-w-xl">Add Pictures or Drag</div>
                    </div>
                </div>
                <div id="preview-image-container" class="flex gap-2 overflow-hidden">
                    <img class="h-32 w-64 object-cover" src="/images_temp/frieren-banner-raw.webp" alt="p">
                    <img class="h-32 w-64 object-cover" src="/images_temp/frieren-banner-raw.webp" alt="p">
                    <img class="h-32 w-64 object-cover" src="/images_temp/frieren-banner-raw.webp" alt="p">
                    <img class="h-32 w-64 object-cover" src="/images_temp/frieren-banner-raw.webp" alt="p">
                </div>
                <textarea class="resize-none bg-brand-100 focus:outline-brand-500 focus:outline-2 p-4 rounded-3xl text-lg" name="description" id="description" cols="30" rows="8" placeholder="Body Text (Optional)"></textarea>
                <div class="flex flex-row-reverse">
                    <button class="p-2 rounded-4xl font-semibold bg-brand-900 text-brand-100 w-36" type="submit">Post</button>
                </div>
                <input class="hidden" type="file" name="images[]" id="images" accept="image/*" multiple>
            </form>
        </div>

        <div class="flex flex-col gap-2 bg-brand-500 p-4 max-w-sm font-sans rounded-2xl">
            <div class="text-2xl font-bold font-lazy-dog">
                y/frieren rules
            </div>
            <button class="rule cursor-pointer flex space-x-4 items-center">
                <span class="text-xl">1</span>
                <div class="flex justify-between w-full font-semibold">
                    <span>Stay on topic (Frieren)</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>
            </button>
            <div>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab cumque facere sed.
            </div>
            <button class="rule cursor-pointer flex space-x-4 items-center">
                <span class="text-xl">2</span>
                <div class="flex justify-between w-full font-semibold">
                    <span>Be respectful</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>
            </button>
            <div>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab cumque facere sed.
            </div>
            <button class="rule cursor-pointer flex space-x-4 items-center">
                <span class="text-xl">3</span>
                <div class="flex justify-between w-full font-semibold">
                    <span>Give chapters</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>
            </button>
            <div>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut commodi facere, impedit neque quis rem vero? Aspernatur delectus eius fugit. Accusantium dignissimos ea illo impedit nihil nobis possimus praesentium rerum.
            </div>
        </div>
    </div>
    <script>
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

        function handleFiles(files) {
            $previewImageText.empty();
            $previewImageContainer.empty();

            $.each(files, function (i, file) {
                if (!file.type.startsWith('image/')) return;

                const reader = new FileReader();
                reader.onload = function (e) {
                    const $img = $('<img>', {
                        src: e.target.result,
                        alt: 'image',
                        class: 'h-32 w-64 object-cover'
                    });
                    $previewImageText.append(e.target.result);
                    $previewImageContainer.append($img);
                };
                reader.readAsDataURL(files[i]);
            });
        }
    </script>
@endsection
