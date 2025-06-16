<div class="rule cursor-pointer flex space-x-4 items-center">
    <span class="text-xl">1</span>
    <div class="flex justify-between w-full font-semibold">
        <span>{{ $rule->title }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
             stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>
    </div>
</div>
<div>
    {{ $rule->description }}
</div>
