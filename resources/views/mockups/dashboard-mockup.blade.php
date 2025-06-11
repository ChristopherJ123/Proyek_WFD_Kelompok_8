<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: "Lazy Dog", sans-serif;
        }
    </style>
</head>
<body class="flex flex-col h-screen">
    @include('components.top-navbar')

    <div class="flex h-full">
        @include('components.left-navbar')
        <div class="flex w-full m-4 gap-4 tracking-wider overflow-auto">
            <div class="flex flex-grow-1 flex-col">
                <div class="flex text-2xl">
                    <div>Best</div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <hr class="border border-1 mb-4">

                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-2 text-white rounded-4xl bg-brand-300 p-4">
                        <div class="flex flex-col gap-3">
                            <div class="flex gap-2 mx-8">
                                <img class="size-8 object-cover rounded-full" src="images_temp/cook-raw.jpg" alt="frieren">
                                <div class="font-bold text-2xl">y/cooking</div>
                            </div>
                            <div class="tracking-normal font-sans tracking-normal mx-8 text-xl font-medium line-clamp-2">
                                Why do we use so many pans? Isn't a wok enough to cook?
                            </div>
                            <img class="max-h-96 mx-8 object-cover rounded-2xl" src="https://cdn.apartmenttherapy.info/image/upload/v1565275640/k/Photo/Lifestyle/2019-08-cleaning-every-pot-and-pan/Dirty-Pans_091.jpg" alt="wok">
                            <div class="flex gap-4">
                                <div class="flex items-center p-2 px-3 gap-3 rounded-4xl bg-brand-900">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-6" fill="currentColor">
                                            <g>
                                                <polygon points="256,0 56,300 163.8,300 163.8,512 348.2,512 348.2,300 456,300  "/>
                                            </g>
                                        </svg>
                                    </button>
                                    <div class="font-sans font-semibold text-xl">-1</div>
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-6 rotate-180" fill="currentColor">
                                            <g>
                                                <polygon points="256,0 56,300 163.8,300 163.8,512 348.2,512 348.2,300 456,300  "/>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex items-center p-2 px-3 gap-3 rounded-4xl bg-brand-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M12 2.25c-2.429 0-4.817.178-7.152.521C2.87 3.061 1.5 4.795 1.5 6.741v6.018c0 1.946 1.37 3.68 3.348 3.97.877.129 1.761.234 2.652.316V21a.75.75 0 0 0 1.28.53l4.184-4.183a.39.39 0 0 1 .266-.112c2.006-.05 3.982-.22 5.922-.506 1.978-.29 3.348-2.023 3.348-3.97V6.741c0-1.947-1.37-3.68-3.348-3.97A49.145 49.145 0 0 0 12 2.25ZM8.25 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Zm2.625 1.125a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="font-sans font-semibold text-xl">23</div>
                                </div>
                                <div class="flex items-center p-2 px-3 gap-3 rounded-4xl bg-brand-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2 text-white rounded-4xl bg-brand-300 p-4">
                        <div class="flex flex-col gap-3">
                            <div class="flex gap-2 mx-8">
                                <img class="size-8 object-cover rounded-full" src="images_temp/cook-raw.jpg" alt="frieren">
                                <div class="font-bold text-2xl">y/cooking</div>
                            </div>
                            <div class="tracking-normal font-sans tracking-normal mx-8 text-xl font-medium line-clamp-2">
                                WHY IS MAN NISSAN SO FINE! BE MY DADDY PLSSS!!!!!!😍
                            </div>
                            <img class="max-h-96 mx-8 object-cover rounded-2xl" src="https://www.greenscene.co.id/wp-content/uploads/2024/10/ultraman-big.jpg" alt="wok">
                            <div class="flex gap-4">
                                <div class="flex items-center p-2 px-3 gap-3 rounded-4xl bg-brand-900">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-6" fill="currentColor">
                                            <g>
                                                <polygon points="256,0 56,300 163.8,300 163.8,512 348.2,512 348.2,300 456,300  "/>
                                            </g>
                                        </svg>
                                    </button>
                                    <div class="font-sans font-semibold text-xl">-1</div>
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-6 rotate-180" fill="currentColor">
                                            <g>
                                                <polygon points="256,0 56,300 163.8,300 163.8,512 348.2,512 348.2,300 456,300  "/>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex items-center p-2 px-3 gap-3 rounded-4xl bg-brand-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M12 2.25c-2.429 0-4.817.178-7.152.521C2.87 3.061 1.5 4.795 1.5 6.741v6.018c0 1.946 1.37 3.68 3.348 3.97.877.129 1.761.234 2.652.316V21a.75.75 0 0 0 1.28.53l4.184-4.183a.39.39 0 0 1 .266-.112c2.006-.05 3.982-.22 5.922-.506 1.978-.29 3.348-2.023 3.348-3.97V6.741c0-1.947-1.37-3.68-3.348-3.97A49.145 49.145 0 0 0 12 2.25ZM8.25 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Zm2.625 1.125a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="font-sans font-semibold text-xl">23</div>
                                </div>
                                <div class="flex items-center p-2 px-3 gap-3 rounded-4xl bg-brand-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="hidden lg:flex flex-col max-w-80 xl:max-w-sm bg-brand-500 rounded-4xl p-4 text-brand-900 text-xl gap-2 h-fit">
                <div class="font-bold">RECENT POSTS</div>
                <ul class="flex flex-col divide-y-2 divide-brand-900">
                    <li class="py-4 first:pt-0 last:pb-0 break-words">
                        <div class="flex gap-2">
                            <img class="size-8 object-cover rounded-full" src="images_temp/frieren-raw.jpg" alt="frieren">
                            <div class="font-bold text-2xl">y/frieren</div>
                        </div>
                        <div class="tracking-normal font-sans tracking-tighter font-medium line-clamp-2">
                            Why is the Manga Hiatus so long...
                        </div>
                        <div class="text-gray-900">236 upvote 40 comments</div>
                    </li>
                    <li class="py-4 first:pt-0 last:pb-0 break-words">
                        <div class="flex gap-2">
                            <img class="size-8 object-cover rounded-full" src="images_temp/cook-raw.jpg" alt="frieren">
                            <div class="font-bold text-2xl">y/cooking</div>
                        </div>
                        <div class="tracking-normal font-sans tracking-tighter font-medium line-clamp-2">
                            Why is beef wellington so hard to make...dang
                        </div>
                        <div class="text-gray-900">34 upvote 2 comments</div>
                    </li>
                    <li class="py-4 first:pt-0 last:pb-0 break-words">
                        <div class="flex gap-2">
                            <img class="size-8 object-cover rounded-full" src="images_temp/programming-raw.jpg" alt="frieren">
                            <div class="font-bold text-2xl">y/programming</div>
                        </div>
                        <div class="tracking-normal font-sans tracking-tighter font-medium line-clamp-2">
                            I want to start learning Python, where do i start?
                        </div>
                        <div class="text-gray-900">343 upvote 82 comments</div>
                    </li>
                    <li class="py-4 first:pt-0 last:pb-0 break-words">
                        <div class="flex gap-2">
                            <img class="size-8 object-cover rounded-full" src="images_temp/programming-raw.jpg" alt="frieren">
                            <div class="font-bold text-2xl">y/programming</div>
                        </div>
                        <div class="tracking-normal font-sans tracking-tighter font-medium line-clamp-2">
                            I want to start learning Python, where do i start? AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                        </div>
                        <div class="text-gray-900">343 upvote 82 comments</div>
                    </li>
                    <li class="py-4 first:pt-0 last:pb-0 break-words">
                        <div class="flex gap-2">
                            <img class="size-8 object-cover rounded-full" src="images_temp/programming-raw.jpg" alt="frieren">
                            <div class="font-bold text-2xl">y/programming</div>
                        </div>
                        <div class="tracking-normal font-sans tracking-tighter font-medium line-clamp-2">
                            STOP THE VOICES INSIDE MY HEAD STOP THE VOICES INSIDE MY HEAD STOP THE VOICES INSIDE MY HEAD STOP THE VOICES INSIDE MY HEAD STOP THE VOICES INSIDE MY HEAD
                        </div>
                        <div class="text-gray-900">343 upvote 82 comments</div>
                    </li>
                    <li class="py-4 first:pt-0 last:pb-0 break-words">
                        <div class="flex gap-2">
                            <img class="size-8 object-cover rounded-full" src="images_temp/programming-raw.jpg" alt="frieren">
                            <div class="font-bold text-2xl">y/programming</div>
                        </div>
                        <div class="tracking-normal font-sans tracking-tighter font-medium line-clamp-2">
                            STOP THE VOICES INSIDE MY HEAD STOP THE VOICES INSIDE MY HEAD STOP THE VOICES INSIDE MY HEAD STOP THE VOICES INSIDE MY HEAD STOP THE VOICES INSIDE MY HEAD
                        </div>
                        <div class="text-gray-900">343 upvote 82 comments</div>
                    </li>
                    <li class="py-4 first:pt-0 last:pb-0 break-words">
                        <div class="flex gap-2">
                            <img class="size-8 object-cover rounded-full" src="images_temp/programming-raw.jpg" alt="frieren">
                            <div class="font-bold text-2xl">y/programming</div>
                        </div>
                        <div class="tracking-normal font-sans tracking-tighter font-medium line-clamp-2">
                            STOP THE VOICES INSIDE MY HEAD STOP THE VOICES INSIDE MY HEAD STOP THE VOICES INSIDE MY HEAD STOP THE VOICES INSIDE MY HEAD STOP THE VOICES INSIDE MY HEAD
                        </div>
                        <div class="text-gray-900">343 upvote 82 comments</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
