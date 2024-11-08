<div class="space-y-2">

    @section('page-title', 'Jelajahi Produk Premium Kami')

    <div class="flex w-full justify-center">
        <div class="max-w-2xl w-full">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($products as $product)
                    <a href="{{ route('product.detail', ['product' => $product]) }}" class="">
                        <div class="w-full border rounded-sm p-4 h-full hover:scale-[105%] transition-transform">
                            <div class="h-full w-full flex flex-col items-start gap-4 justify-center relative">
                                <div class="w-full">
                                    <img src="{{ $product->getFirstMediaUrl('product_images') }}"
                                        alt="{{ $product->title }}">
                                </div>
                                <div class="space-y-4 block">
                                    <h1 class="text-sm font-bold text-gray-800">{{ $product->title }}</h1>

                                    <small class="text-gray-700">{{ formatRupiah($product->price) }}</small>
                                </div>
                            </div>

                        </div>

                    </a>
                @endforeach

            </div>

        </div>
    </div>


</div>
