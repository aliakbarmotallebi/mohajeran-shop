@props([
    'heading',
    'content',
])

<table class="w-full text-sm text-left text-gray-500" {{ $content->attributes->get('class') }}>
    <thead {{ $header->attributes->class([
            'text-center text-xs text-gray-700 uppercase bg-gray-50'
            ]) }}>
        {{ $header }}
    </thead>
    <tbody {{ $content->attributes->class(['text-right']) }}>
        {{ $content }}
    </tbody>
</table>