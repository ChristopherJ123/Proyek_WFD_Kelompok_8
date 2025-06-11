@extends('layouts.app')

@section('content')
    <form action="#" class="flex gap-4 w-full m-4">
        <div class="flex flex-col w-full gap-4">
            <div class="text-xl font-bold tracking-wide">CREATE TOPIC</div>
            <hr class="border-1">
            <div class="flex flex-col bg-brand-300 p-4 rounded-2xl gap-4 font-sans">
                <div class="flex">
                    <div class="flex items-center gap-2 rounded-3xl bg-brand-100 p-4 font-bold font-lazy-dog text-2xl tracking-wide">
                        <div class="size-8 rounded-full bg-brand-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 rounded-full border-2 cursor-pointer">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span>y/topic_name</span>
                    </div>
                </div>
                <div class="relative">
                    <input class="bg-brand-100 focus:outline-brand-500 focus:outline-2 w-full p-4 rounded-3xl text-lg peer placeholder-transparent" type="text" name="title" id="title" placeholder="Title*">
                    <label class="absolute left-4 top-4 text-lg peer-placeholder-shown:visible peer-focus:invisible invisible" for="title">Topic name<span class="font-bold text-red-500">*</span></label>
                </div>
                <div class="flex w-fit bg-brand-900 items-center rounded-4xl focus:outline-brand-500">
                    <select id="genre" name="genre" class="p-2 appearance-none font-semibold text-brand-300 focus:outline-0">
                        @foreach($genres as $genre)
                            <option value="{{ $genre['name'] }}">{{ $genre['name'] }}</option>
                        @endforeach
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-brand-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                    </svg>
                </div>
                <textarea class="resize-none bg-brand-100 focus:outline-brand-500 focus:outline-2 p-4 rounded-3xl text-lg" name="description" id="description" cols="30" rows="8" placeholder="Body Text (Optional)"></textarea>
                <div class="flex flex-row-reverse">
                    <button class="p-2 rounded-4xl font-semibold bg-brand-900 text-brand-100 w-36" type="submit">Post</button>
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
                        <input class="peer placeholder-transparent" type="text" name="rule-1" id="rule-1" placeholder="Rule 1*">
                        <label class="absolute invisible peer-placeholder-shown:visible peer-focus:invisible" for="rule-1"><span>Rule 1<span class="text-red-500 font-bold">*</span></span></label>
                        <div class="rule cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" class="transition size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>
                </div>
                <textarea class="hidden border-2 focus:outline-brand-300 focus:outline-2 border-brand-300 rounded-2xl p-2 resize-none" placeholder="Rule description (optional)" name="rule-desc-1" id="rule-desc-1" cols="30" rows="2"></textarea>
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
    </form>

    <script>
        $(document).on('click', '.rule', function () {
            $(this).children('svg').toggleClass('rotate-180');
            $(this).parent().parent().next().slideToggle();
        })


        $('#add-rule').on('click', function () {
            let ruleCount = $('.rule-container').length + 1;
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
                            <input class="peer placeholder-transparent" type="text" name="rule-${index}" id="rule-${index}" placeholder="Rule ${index}*">
                            <label class="absolute invisible peer-placeholder-shown:visible peer-focus:invisible" for="rule-${index}">
                                <span>Rule ${index}<span class="text-red-500 font-bold">*</span></span>
                            </label>
                            <div class="rule cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" class="transition size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <textarea class="hidden border-2 focus:outline-brand-300 focus:outline-2 border-brand-300 rounded-2xl p-2 resize-none" placeholder="Rule description (optional)" name="rule-desc-${index}" id="rule-desc-${index}" cols="30" rows="2"></textarea>
                </div>
            `;
        }
    </script>
@endsection
