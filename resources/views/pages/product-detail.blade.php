<x-app-layout>
    @section('page-title', $product->title)

    <div class="font-sans">


        <nav class="flex md:ms-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-600">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('product') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-gray-600 md:ms-2"> Produk </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $product->category->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="py-4 lg:max-w-7xl max-w-xl max-lg:mx-auto">
            <div class="grid items-start grid-cols-1 lg:grid-cols-5 gap-12">
                <div x-cloack
                    class="min-h-[250px] md:min-h-[500px] lg:col-span-3 bg-gray-50 rounded-lg w-full lg:sticky top-0 text-center">

                    <div id="main-carousel" class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($product->getMedia('*') as $media)
                                    <li class="splide__slide">
                                        <img src="{{ $media->getUrl() }}" alt="{{ $product->title }}" loading="lazy">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <section id="thumbnail-carousel" class="splide mt-1"
                        aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($product->getMedia('*') as $media)
                                    <li class="splide__slide">
                                        <img src="{{ $media->getUrl() }}" loading="lazy" alt="{{ $product->title }}">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                </div>

                <livewire:product-detail :product="$product" />
            </div>
        </div>
    </div>
</x-app-layout>
