<x-article>
    <x-slot name="title">{{ $holodeck->id }}</x-slot>
    <x-slot name="subtitle">{{ $holodeck->type }}</x-slot>
    <p> {{ $holodeck->serial_no }}</p>
    <p> {{ $holodeck->sw_version }}</p>

    <article class="content">
{{--        {!! $article->body !!}--}}
    </article>

</x-article>
