<div class="flex flex-col bg-white border-t rounded-lg border border-gray-200">
    <div class="flex items-center justify-between px-6 -mb-px border-b border-gray-200">
        <h3 class="text-blue-dark py-4 font-normal text-lg">
            {{ $title }}
        </h3>
    </div>
    <div {{ $attributes->class() }}>
        {{ $slot }}
    </div>
</div>