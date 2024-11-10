<x-app-layout>
    @section('page-title', $product->title)

    <div class="font-sans">
        <div class="p-4 lg:max-w-7xl max-w-xl max-lg:mx-auto">
            <div class="grid items-start grid-cols-1 lg:grid-cols-5 gap-12">
                <div x-cloack
                    class="min-h-[250px] md:min-h-[500px] lg:col-span-3 bg-gray-50 rounded-lg w-full lg:sticky top-0 text-center">

                        @dump(( config('services.google.client_id') ))
                        @dump(( config('services.google.client_secret') ))
                    
                    <div id="main-carousel" class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($product->getMedia('*') as $media)
                                    <li class="splide__slide"><img src="{{ $media->getUrl() }}"
                                            alt="{{ $product->title }}"></li>
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
                                        <img src="{{ $media->getUrl() }}" alt="{{ $product->title }}">
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
