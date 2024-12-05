<div class="space-y-2">

    @section('page-title', 'Jelajahi Produk Premium Kami')

    <div class="flex w-full justify-center">
        <div class="max-w-2xl w-full space-y-4">
            <select id="countries"
                class="bg-gray-50 border md:hidden border-gray-300 text-gray-900 text-sm rounded-lg block w-full md:w-[14rem] p-2.5"
                x-on:change="$wire.setCategoryId($event.target.value)">
                <option value="" selected>Filter Berdasarkan Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($this->products as $product)
                    <div>
                        <div class="w-full border rounded-sm p-4 h-full hover:scale-[105%] transition-transform">
                            <div class="h-full w-full flex flex-col items-start gap-4 justify-center relative">

                                <a href="{{ route('product.detail', ['product' => $product]) }}">
                                    <div class="w-full">
                                        <img src="{{ $product->getFirstMediaUrl('product_images') }}"
                                            alt="{{ $product->title }}" loading="lazy">
                                    </div>
                                    <div class="space-y-4 block w-full mt-2">
                                        <h1 class="text-base sm:text-sm font-bold text-gray-800">{{ $product->title }}
                                        </h1>
                                    </div>
                                </a>


                                {{-- <div class="flex justify-between w-full items-center">
                                    <p class="text-base">{{ formatRupiah($product->price) }}</p>

                                    <button wire:click="addToChart({{ $product }})" class="flex">
                                        <x-heroicon-o-shopping-bag wire:loading.remove
                                            wire:target="addToChart({{ $product }})"
                                            class="w-6 sm:w-5 text-gray-700 aspect-square" />
                                        <small wire:loading wire:target="addToChart({{ $product }})">Tunggu..</small>
                                    </button>
                                </div> --}}
                            </div>

                        </div>
                    </div>
                @empty
                    <p class="font-poppins w-full text-center text-sm text-gray-600">Produk Belum Ada</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
