<x-app-layout>
    @section('page-title', $artikel->title)
    @push('meta')
        <meta name="description" content="{{ $artikel->seo->description }}">
        <meta name="keywords" content="{{ $artikel->seo->keywords }}">
        <meta property="og:title" content="{{ $artikel->seo->title }}">
        <meta property="og:description" content="{{ $artikel->seo->description }}">
        @if ($artikel->keywords)
            <meta name="keywords" content="{{ $artikel->keywords }}"">
        @endif
    @endpush

    <article class="w-full bg-white space-y-4 py-4 md:px-[20rem] font-serif">
        <header class="head text-gray-900 text-center flex flex-col gap-y-4">
            <h1 class="font-extrabold text-xl md:text-2xl">
                {{ $artikel->title }}
            </h1>

            <figure class="w-full max-w-2xl mx-auto">
                <img src="{{ $artikel->getFirstMediaUrl('article_images') }}" alt="{{ $artikel->title }}"
                    class="w-full max-h-[400px] object-cover rounded-md" loading="lazy">
            </figure>

            <p class="text-sm text-gray-600">
                <time datetime="2024-08-19">{{ $artikel->created_at->format('d F Y') }}</time> · {{ readDuration($artikel->content) }} min read
            </p>
        </header>

        <div class="content space-y-2 text-gray-800">
           {!! str($artikel->content)->markdown()->sanitizeHtml() !!}
        </div>
    </article>
</x-app-layout>
