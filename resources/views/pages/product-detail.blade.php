<x-app-layout>
    @section('page-title', $product->title)



    <nav class="flex ms-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center gap-2">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center text-sm font-medium hover:text-gray-600 text-gray-500">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
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
                        class="ms-1 text-sm font-medium hover:text-gray-600 md:ms-2 text-gray-500">Products</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#"
                        class="ms-1 text-sm font-medium hover:text-gray-600 md:ms-2 text-gray-500">{{ $product->category->name }}</a>
                </div>
            </li>
        </ol>
    </nav>


    <div class="font-sans">
        <div class="p-4 lg:max-w-7xl max-w-xl max-lg:mx-auto">
            <div class="grid items-start grid-cols-1 lg:grid-cols-5 gap-12">
                <div x-cloack
                    class="min-h-[250px] md:min-h-[500px] lg:col-span-3 bg-gray-50 rounded-lg w-full lg:sticky top-0 text-center">

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


                <div class="lg:col-span-2">
                    <h2 class="text-2xl font-bold text-gray-800">{{ $product->title }}</h2>
                    <div class="flex gap-4 mt-4 justify-between">
                        <p class="text-gray-800 text-xl font-bold">{{ formatRupiah($product->price) }}</p>

                        <div>
                            <button type="button"
                                class="px-2.5 py-1.5 bg-gray-100 text-xs text-gray-800 rounded-md flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 mr-1" fill="currentColor"
                                    viewBox="0 0 32 32">
                                    <path
                                        d="M14.236 21.954h-3.6c-.91 0-1.65-.74-1.65-1.65v-7.201c0-.91.74-1.65 1.65-1.65h3.6a.75.75 0 0 1 .75.75v9.001a.75.75 0 0 1-.75.75zm-3.6-9.001a.15.15 0 0 0-.15.15v7.2a.15.15 0 0 0 .15.151h2.85v-7.501z"
                                        data-original="#000000" />
                                    <path
                                        d="M20.52 21.954h-6.284a.75.75 0 0 1-.75-.75v-9.001c0-.257.132-.495.348-.633.017-.011 1.717-1.118 2.037-3.25.18-1.184 1.118-2.089 2.28-2.201a2.557 2.557 0 0 1 2.17.868c.489.56.71 1.305.609 2.042a9.468 9.468 0 0 1-.678 2.424h.943a2.56 2.56 0 0 1 1.918.862c.483.547.708 1.279.617 2.006l-.675 5.401a2.565 2.565 0 0 1-2.535 2.232zm-5.534-1.5h5.533a1.06 1.06 0 0 0 1.048-.922l.675-5.397a1.046 1.046 0 0 0-1.047-1.182h-2.16a.751.751 0 0 1-.648-1.13 8.147 8.147 0 0 0 1.057-3 1.059 1.059 0 0 0-.254-.852 1.057 1.057 0 0 0-.795-.365c-.577.052-.964.435-1.04.938-.326 2.163-1.71 3.507-2.369 4.036v7.874z"
                                        data-original="#000000" />
                                    <path
                                        d="M4 31.75a.75.75 0 0 1-.612-1.184c1.014-1.428 1.643-2.999 1.869-4.667.032-.241.055-.485.07-.719A14.701 14.701 0 0 1 1.25 15C1.25 6.867 7.867.25 16 .25S30.75 6.867 30.75 15 24.133 29.75 16 29.75a14.57 14.57 0 0 1-5.594-1.101c-2.179 2.045-4.61 2.81-6.281 3.09A.774.774 0 0 1 4 31.75zm12-30C8.694 1.75 2.75 7.694 2.75 15c0 3.52 1.375 6.845 3.872 9.362a.75.75 0 0 1 .217.55c-.01.373-.042.78-.095 1.186A11.715 11.715 0 0 1 5.58 29.83a10.387 10.387 0 0 0 3.898-2.37l.231-.23a.75.75 0 0 1 .84-.153A13.072 13.072 0 0 0 16 28.25c7.306 0 13.25-5.944 13.25-13.25S23.306 1.75 16 1.75z"
                                        data-original="#000000" />
                                </svg>
                                87 Reviews
                            </button>
                        </div>
                    </div>

                    <div class="flex space-x-2 mt-4">
                        <svg class="w-5 fill-orange-400" viewBox="0 0 14 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                        </svg>
                        <svg class="w-5 fill-orange-400" viewBox="0 0 14 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                        </svg>
                        <svg class="w-5 fill-orange-400" viewBox="0 0 14 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                        </svg>
                        <svg class="w-5 fill-orange-400" viewBox="0 0 14 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                        </svg>
                        <svg class="w-5 fill-orange-400" viewBox="0 0 14 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                        </svg>

                    </div>

                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-800">Tentang {{ $product->title }}</h3>

                        <div class="prose">
                            {!! Str::markdown($product->description) !!}
                        </div>
                    </div>

                    <button type="button"
                        class="w-full mt-8 px-6 py-3 bg-[#1f2937] text-white text-sm font-semibold rounded-md">Beli
                        Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
