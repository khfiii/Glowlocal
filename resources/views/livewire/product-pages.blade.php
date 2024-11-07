<div class="space-y-2">

    @section('page-title', 'Jelajahi Produk Premium Kami')

    <div class="flex w-full justify-center">
        <div class="max-w-2xl w-full">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-6">
                @foreach ($products as $product)
                    <div class="relative h-[20rem]">
                        <a href="{{ route('product.detail', ['product' => $product]) }}">
                            <div class="w-full h-full space-y-4 hover:scale-[105%] transition-transform">
                                <div class="h-[70%] w-full flex flex-col justify-center items-center">
                                    <div class="w-full">
                                        <img src="{{ $product->getFirstMediaUrl('product_images') }}"
                                            alt="{{ $product->title }}">
                                    </div>
                                </div>

                                <div class="space-y-4 block">
                                    <h1 class="text-sm font-bold text-gray-800">{{ $product->title }}</h1>

                                    <small class="text-gray-700">{{ formatRupiah($product->price) }}</small>
                                </div>
                            </div>

                        </a>
                    </div>
                @endforeach

            </div>

        </div>
    </div>


</div>
