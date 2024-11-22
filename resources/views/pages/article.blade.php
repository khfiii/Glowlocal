<x-app-layout>
    @section('page-title', 'Baca artikel menarik glowlocal shop')

    @push('meta')
        <meta name="description" content="Baca artikel menarik dari glowlocal shop">
    @endpush

    @if ($artikels->isNotEmpty())

        <section class="space-y-4">
            <h1 class="font-serif text-xl">Baca Artikels</h1>
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($artikels as $artikel)
                    <article class="flex flex-col dark:bg-gray-50 md:p-2">
                        <a href="{{ route('detail.article', ['slug' => $artikel->slug]) }}"
                            aria-label="{{ $artikel->title }}">
                            <img alt="{{ $artikel->name }}" class="object-cover w-full h-52 dark:bg-gray-500"
                                src="{{ $artikel->getFirstMediaUrl('article_images') }}" loading="lazy">
                        </a>
                        <div class="flex flex-col flex-1 py-4">
                            <a rel="noopener noreferrer" href="#"
                                aria-label="Te nulla oportere reprimique his dolorum"></a>
                            <a rel="noopener noreferrer" href="?category={{ $artikel->category->slug }}"
                                class="text-xs tracking-wider uppercase hover:underline dark:text-violet-600">{{ $artikel->category->title }}</a>
                            <h3 class="font-sans flex-1 py-2 text-base font-medium leading-snug">{{ $artikel->title }}
                            </h3>
                            <div class="flex flex-wrap justify-between pt-3 space-x-2 text-xs dark:text-gray-600">
                                <span>{{ $artikel->created_at->format('d F Y') }}</span>
                                <span>{{ readDuration($artikel->content) }} Minute Read</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

    @endif
</x-app-layout>
