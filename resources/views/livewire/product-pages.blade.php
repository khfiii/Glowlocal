<div class="space-y-2">

    @section('page-title', 'Jelajahi Produk Premium Kami')

    <div class="flex w-full justify-center">
        <div class="max-w-2xl w-full space-y-4">

            <div class="w-full max-w-sm min-w-[200px]">
                <div class="relative">
                    <input
                        class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-3 pr-28 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                        placeholder="Masukan Judul Ebook" wire:model.blur="search" />
                    <button
                        class="absolute top-1 right-1 flex items-center rounded bg-slate-800 py-1 px-2.5 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                clip-rule="evenodd" wire:submit="products" />
                        </svg>
                        Cari
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($this->products as $product)
                    <div wire:loading.remove>
                        <div class="w-full border rounded-sm p-4 h-full hover:scale-[105%] transition-transform">
                            <div class="h-full w-full flex flex-col items-start gap-4 justify-center relative">

                                <a href="{{ route('product.detail', ['product' => $product]) }}">
                                    <div class="w-full p-[10px] md:p-0">
                                        <img src="{{ $product->getFirstMediaUrl('product_images') }}"
                                            alt="{{ $product->title }}" loading="lazy">
                                    </div>
                                    {{-- <div class="space-y-4 block w-full mt-2">
                                        <h1 class="text-base sm:text-sm ps-4 md:ps-0 text-gray-800">{{ formatRupiah($product->price) }}
                                        </h1>
                                    </div> --}}
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
                    <p wire:loading.remove class="font-poppins w-full text-center text-sm text-gray-600">Produk belum
                        ada, silahkan request pada icon pesan dibawah</p>
                @endforelse

                @for ($i = 0; $i <= 10; $i++)
                    <div class="md:col-span-1 col-span-full flex justify-start" wire:loading>
                        <div class="border border-blue-300 shadow rounded-md p-4 max-w-sm w-full mx-auto">
                            <div class="animate-pulse flex space-x-4">
                                <div class="flex-1 space-y-6 py-1">
                                    <div class="h-2 bg-slate-700 rounded"></div>
                                    <div class="space-y-3">
                                        <div class="grid grid-cols-3 gap-4">
                                            <div class="h-2 bg-slate-700 rounded col-span-2"></div>
                                            <div class="h-2 bg-slate-700 rounded col-span-1"></div>
                                        </div>
                                        <div class="h-2 bg-slate-700 rounded"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor


                <div class="col-span-full" wire:loading.remove>
                    {{ $this->products->links() }}
                </div>
            </div>

        </div>
    </div>

    <livewire:request-product />


</div>
