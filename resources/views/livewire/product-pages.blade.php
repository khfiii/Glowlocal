<div class="space-y-2">

    @section('page-title', 'Jelajahi Produk Premium Kami')

    <div class="flex w-full justify-center">
        <div class="max-w-2xl w-full space-y-4">

            <select id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full md:w-[14rem] p-2.5"
                x-on:change="$wire.setCategoryId($event.target.value)">
                <option selected>Filter Berdasarkan Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($this->products as $product)
                    <a href="{{ route('product.detail', ['product' => $product]) }}">
                        <div class="w-full border rounded-sm p-4 h-full hover:scale-[105%] transition-transform">
                            <div class="h-full w-full flex flex-col items-start gap-4 justify-center relative">
                                <div class="w-full">
                                    <img src="{{ $product->getFirstMediaUrl('product_images') }}"
                                        alt="{{ $product->title }}" loading="lazy">
                                </div>
                                <div class="space-y-4 block">
                                    <h1 class="text-sm font-bold text-gray-800">{{ $product->title }}</h1>

                                    <small class="text-gray-700">{{ formatRupiah($product->price) }}</small>
                                </div>
                            </div>

                        </div>
                    </a>
                @empty
                    <p class="font-poppins w-full text-center text-sm text-gray-600">Produk Belum Ada</p>
                @endforelse

                <div class="text-center w-full py-4" x-intersect.full="$wire.loadMore()">
                    <div wire:loading wire:target="loadMore">
                        <svg class="text-gray-300 animate-spin" viewBox="0 0 64 64" fill="none"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                            <path
                                d="M32 3C35.8083 3 39.5794 3.75011 43.0978 5.20749C46.6163 6.66488 49.8132 8.80101 52.5061 11.4939C55.199 14.1868 57.3351 17.3837 58.7925 20.9022C60.2499 24.4206 61 28.1917 61 32C61 35.8083 60.2499 39.5794 58.7925 43.0978C57.3351 46.6163 55.199 49.8132 52.5061 52.5061C49.8132 55.199 46.6163 57.3351 43.0978 58.7925C39.5794 60.2499 35.8083 61 32 61C28.1917 61 24.4206 60.2499 20.9022 58.7925C17.3837 57.3351 14.1868 55.199 11.4939 52.5061C8.801 49.8132 6.66487 46.6163 5.20749 43.0978C3.7501 39.5794 3 35.8083 3 32C3 28.1917 3.75011 24.4206 5.2075 20.9022C6.66489 17.3837 8.80101 14.1868 11.4939 11.4939C14.1868 8.80099 17.3838 6.66487 20.9022 5.20749C24.4206 3.7501 28.1917 3 32 3L32 3Z"
                                stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M32 3C36.5778 3 41.0906 4.08374 45.1692 6.16256C49.2477 8.24138 52.7762 11.2562 55.466 14.9605C58.1558 18.6647 59.9304 22.9531 60.6448 27.4748C61.3591 31.9965 60.9928 36.6232 59.5759 40.9762"
                                stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"
                                class="text-gray-900">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
