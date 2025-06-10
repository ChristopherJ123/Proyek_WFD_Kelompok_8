@extends('layouts.app')

@section('content')
    <form action="{{ route('topics.store') }}" method="post" enctype="multipart/form-data" class="flex gap-4 w-full m-4">
        @csrf
        <div class="flex flex-col w-full gap-4">
            <div class="text-xl font-bold tracking-wide">CREATE TOPIC</div>
            <hr class="border-1">
            <div class="flex flex-col bg-brand-300 p-4 rounded-2xl gap-4 font-sans">
                <div class="flex">
                    <div id="icon-container" class="flex items-center gap-2 rounded-3xl bg-brand-100 p-4 font-bold font-lazy-dog text-2xl tracking-wide">
                        <div id="icon-add-button" class="size-8 rounded-full bg-brand-500 cursor-pointer">
                            <img id="icon-preview" src="/images/add.png" alt="add" class="size-8">
                        </div>
                        <span>y/topic_name</span>
                    </div>
                </div>
                <div class="relative">
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="bg-brand-100 focus:outline-brand-500 lowercase focus:outline-2 w-full p-4 rounded-3xl text-lg peer placeholder-transparent" placeholder="Title*">
                    <label class="absolute left-4 top-4 text-lg peer-placeholder-shown:visible peer-focus:invisible invisible" for="title">Topic name<span class="font-bold text-red-500">*</span></label>
                </div>
                <div class="flex gap-8">
                    <div class="flex w-fit bg-brand-900 items-center rounded-4xl focus:outline-brand-500">
                        <select id="genre" name="genre" class="p-2 appearance-none font-semibold text-brand-300 focus:outline-0">
                            @foreach($genres as $genre)
                                <option value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                            @endforeach
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-brand-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                        </svg>
                    </div>
                    <div id="banner-container" class="bg-brand-900 rounded-full px-4 flex items-center cursor-pointer overflow-hidden relative">
                        <div id="banner-preview" class="font-semibold text-brand-300 focus:outline-0">Upload Banner</div>
                    </div>
                </div>
                <div class="relative">
                    <textarea class="resize-none w-full bg-brand-100 focus:outline-brand-500 focus:outline-2 p-4 rounded-3xl text-lg peer" name="description" id="description" cols="30" rows="8" placeholder="Description*">{{ old('description') }}</textarea>
                    <label class="absolute left-4 top-4 text-lg peer-placeholder-shown:visible peer-focus:invisible invisible" for="description">Description<span class="font-bold text-red-500">*</span></label>
                </div>

                <div class="flex flex-row-reverse">
                    <button class="p-2 rounded-4xl font-semibold bg-brand-900 text-brand-100 w-36" type="submit">Create</button>
                </div>
            </div>
        </div>

        <div class="rule-tab flex flex-col gap-2 bg-brand-500 p-4 max-w-sm font-sans rounded-2xl w-sm">
            <div class="text-2xl font-bold font-lazy-dog whitespace-nowrap">
                y/topic_name rules
            </div>
            <div id="rule-container-1" class="rule-container flex flex-col bg-brand-100 p-2 rounded-2xl">
                <div class="flex space-x-4 items-center">
                    <span class="text-xl">1</span>
                    <div class="flex relative justify-between w-full font-semibold">
                        <input class="peer placeholder-transparent" type="text" name="rules[0][title]" id="rules[0][title]" placeholder="Rule 1*">
                        <label class="absolute invisible peer-placeholder-shown:visible peer-focus:invisible" for="rules[0][title]"><span>Rule 1<span class="text-red-500 font-bold">*</span></span></label>
                        <div class="rule cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" class="transition size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>
                </div>
                <textarea name="rules[0][description]" id="rules[0][description]" class="hidden border-2 focus:outline-brand-300 focus:outline-2 border-brand-300 rounded-2xl p-2 resize-none" placeholder="Rule description (optional)" cols="30" rows="2"></textarea>
                <input type="hidden" name="rules[0][order]" value="1">
            </div>
            <div class="flex">
                <div class="flex flex-1 justify-center">
                    <svg id="add-rule" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 rounded-full bg-brand-100 cursor-pointer">
                        <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="flex flex-1 justify-center">
                    <svg id="remove-rule" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 rounded-full bg-brand-100 cursor-pointer">
                        <path fill-rule="evenodd" d="M4.25 12a.75.75 0 0 1 .75-.75h14a.75.75 0 0 1 0 1.5H5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
        </div>

        <input type="file" name="banner" id="banner" class="hidden" accept="image/*">
        <input type="file" name="icon" id="icon" class="hidden" accept="image/*">
    </form>

    <script>
        $(document).on('click', '.rule', function () {
            $(this).children('svg').toggleClass('rotate-180');
            $(this).parent().parent().next().slideToggle();
        })


        $('#add-rule').on('click', function () {
            let ruleCount = $('.rule-container').length;
            const newRule = generateRuleTemplate(ruleCount);
            $(newRule).insertBefore($(this).parent().parent());
        })

        $('#remove-rule').on('click', function () {
            const rules = $('.rule-container')
            if (rules.length > 0) {
                rules.last().remove();
            }
        })

        function generateRuleTemplate(index) {
            return `
                <div id="rule-container-${index}" class="rule-container flex flex-col bg-brand-100 p-2 rounded-2xl">
                    <div class="flex space-x-4 items-center">
                        <span class="text-xl">${index}</span>
                        <div class="flex relative justify-between w-full font-semibold">
                            <input class="peer placeholder-transparent" type="text" name="rules[${index}][title]" id="rules[${index}][title]" placeholder="Rule ${index}*">
                            <label class="absolute invisible peer-placeholder-shown:visible peer-focus:invisible" for="rules[${index}][title]">
                                <span>Rule ${index + 1}<span class="text-red-500 font-bold">*</span></span>
                            </label>
                            <div class="rule cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" class="transition size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <textarea name="rules[${index}][description]" id="rules[${index}][description]" class="hidden border-2 focus:outline-brand-300 focus:outline-2 border-brand-300 rounded-2xl p-2 resize-none" placeholder="Rule description (optional)" cols="30" rows="2"></textarea>
                    <input type="hidden" name="rules[${index}][order]" value="${index + 1}">
                </div>
            `;
        }

        const $fileIconInput = $('#icon');
        const $fileIconContainer = $('#icon-container');
        const $fileIconButton = $('#icon-add-button');
        const $iconPreviewImage = $('#icon-preview');

        const $fileBannerInput = $('#banner');
        const $fileBannerContainer = $('#banner-container');
        const $bannerPreviewText = $('#banner-preview');

        $fileIconContainer.on('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $fileIconContainer.addClass('border-2 border-dashed');
        }).on('dragleave', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $fileIconContainer.removeClass('border-2 border-dashed');
        }).on('drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $fileIconContainer.removeClass('border-2 border-dashed');

            const file = e.originalEvent.dataTransfer.files[0];
            $fileIconInput[0].files = e.originalEvent.dataTransfer.files;
            handleFileIcon(file);
        });

        $fileIconButton.on('click', function () {
            $fileIconInput.trigger('click');
        });

        $fileIconInput.on('change', function () {
            handleFileIcon(this.files[0])
        });

        $fileBannerContainer.on('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $fileBannerContainer.addClass('border-2 border-dashed border-brand-300');
        }).on('dragleave', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $fileBannerContainer.removeClass('border-2 border-dashed border-brand-300');
        }).on('drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $fileBannerContainer.removeClass('border-2 border-dashed border-brand-300');

            const file = e.originalEvent.dataTransfer.files[0];
            $fileBannerInput[0].files = e.originalEvent.dataTransfer.files;
            handleFileBanner(file);
        });

        $fileBannerContainer.on('click', function () {
            $fileBannerInput.trigger('click');
        });

        $fileBannerInput.on('change', function () {
            handleFileBanner(this.files[0])
        })

        function handleFileIcon(file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $iconPreviewImage.attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }

        function handleFileBanner(file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $bannerPreviewText.text(file.name);
            };
            reader.readAsDataURL(file);
        }
    </script>
@endsection
