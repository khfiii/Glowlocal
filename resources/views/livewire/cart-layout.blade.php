<div>
    @section('page-title', 'Keranjang Belanja')
    @if (count($cartItems) < 0)
        <div class="max-w-4xl mx-auto px-10 py-4 bg-white rounded-lg shadow-lg">
            <div class="flex flex-col items-center justify-center py-12">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    class="h-24 w-24 text-gray-400 fill-gray-700 mb-4">
                    <path
                        d="M4.00488 16V4H2.00488V2H5.00488C5.55717 2 6.00488 2.44772 6.00488 3V15H18.4433L20.4433 7H8.00488V5H21.7241C22.2764 5 22.7241 5.44772 22.7241 6C22.7241 6.08176 22.7141 6.16322 22.6942 6.24254L20.1942 16.2425C20.083 16.6877 19.683 17 19.2241 17H5.00488C4.4526 17 4.00488 16.5523 4.00488 16ZM6.00488 23C4.90031 23 4.00488 22.1046 4.00488 21C4.00488 19.8954 4.90031 19 6.00488 19C7.10945 19 8.00488 19.8954 8.00488 21C8.00488 22.1046 7.10945 23 6.00488 23ZM18.0049 23C16.9003 23 16.0049 22.1046 16.0049 21C16.0049 19.8954 16.9003 19 18.0049 19C19.1095 19 20.0049 19.8954 20.0049 21C20.0049 22.1046 19.1095 23 18.0049 23Z">
                    </path>
                </svg>
                <p class="text-gray-600 text-sm md:text-lg font-semibold mb-4">Keranjang Belanja Kamu Kosong</p>
                <a href="{{ route('product') }}"
                    class="px-6 py-2 bg-gray-500 text-white text-xs md:text-base rounded-md shadow-md hover:bg-gray-600 transition-colors duration-300">
                    Yuk Belanja!
                </a>
            </div>
        </div>
    @else
        <div class="font-sans max-w-5xl max-md:max-w-xl mx-auto bg-white py-4">
            <div class="grid md:grid-cols-3 gap-8 mt-4">
                <div class="md:col-span-2 space-y-4">
                    {{-- @foreach ($cartItems as $item)
                        <div class="grid grid-cols-3 items-start gap-4">
                            <div class="col-span-2 flex items-start gap-4">
                                <div class="w-28 h-28 max-sm:w-24 max-sm:h-24 shrink-0 bg-gray-100 p-2 rounded-md">
                                    <img src='{{ $item->product->getFirstMediaUrl('product_images') }}'
            class="w-full h-full object-contain" loading="lazy" />
        </div>

        <div class="flex flex-col">
            <h3 class="text-base font-bold text-gray-800">{{ $item->product->title }}</h3>

            <p class="text-xs font-semibold text-gray-500 mt-0.5">
                Limited
            </p>


            <button type="button" wire:click="removeItem({{ $item }})" class="mt-6 font-semibold text-red-500 text-xs flex items-center gap-1 shrink-0">

                <div class="-mt-2" wire:loading.remove wire:target="removeItem({{ $item }})">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current inline" viewBox="0 0 24 24">
                        <path d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z" data-original="#000000"></path>
                        <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z" data-original="#000000"></path>
                    </svg>
                    HAPUS
                </div>

                <div class="-mt-2">
                    <div role="status" wire:loading wire:target="removeItem({{ $item }})" class="w-full">
                        <svg aria-hidden="true" class="inline w-4 h-4 text-gray-200 animate-spin fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>


            </button>
        </div>
    </div>

    <div class="ml-auto">
        <h4 class="text-lg max-sm:text-base font-bold text-gray-800">
            {{ formatRupiah($item->product->price) }}</h4>

        <button wire:click="decrease({{ $item }})" class="text-gray-800 font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current" viewBox="0 0 124 124">
                <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" data-original="#000000"></path>
            </svg>
        </button>

        <span class="mx-3 font-bold"> {{ $item->quantity }}</span>



        <button wire:click="increase({{ $item }})" class="text-gray-800 font-bold">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current" viewBox="0 0 42 42">
                <path d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z" data-original="#000000"></path>
            </svg>
        </button>
    </div>
</div>
@endforeach --}}

                    <template x-for="item in {{ $cartItems }}" :key="item.id">
                        <div x-data="{ quantity: item.quantity }"
                            @change="Livewire.dispatch('updateQuantity', { itemId: item.id, quantity: quantity })"
                            class="grid grid-cols-3 items-start gap-4">
                            <div class="col-span-2 flex items-start gap-4">
                                <div class="w-28 h-28 max-sm:w-24 max-sm:h-24 shrink-0 bg-gray-100 p-2 rounded-md">
                                    <img :src='item.product.media[0].original_url' class="w-full h-full object-contain"
                                        loading="lazy" />
                                </div>

                                <div class="flex flex-col">
                                    <h3 class="text-base font-bold text-gray-800" x-text="item.product.title"></h3>

                                    <p class="text-xs font-semibold text-gray-500 mt-0.5">
                                        Limited
                                    </p>


                                    <button type="button"
                                        class="mt-6 font-semibold text-red-500 text-xs flex items-center gap-1 shrink-0">

                                        <div class="-mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-current inline"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                                                    data-original="#000000"></path>
                                                <path
                                                    d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                                                    data-original="#000000"></path>
                                            </svg>
                                            HAPUS
                                        </div>
                                    </button>
                                </div>
                            </div>

                            <div class="ml-auto">
                                <h4 x-text="item.product.price"
                                    class="text-lg max-sm:text-base font-bold text-gray-800"></h4>
                                <button @click="if(quantity > 1) quantity--; $wire.updateQuantity(item.id, quantity)"
                                    class="text-gray-800 font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 124 124">
                                        <path
                                            d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z"
                                            data-original="#000000"></path>
                                    </svg>
                                </button>
                                <span x-text="quantity" class="mx-3 font-bold">1</span>
                                <button @click="quantity++; $wire.updateQuantity(item.id, quantity)"
                                    class="text-gray-800 font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 fill-current"
                                        viewBox="0 0 42 42">
                                        <path
                                            d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z"
                                            data-original="#000000"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>

                <div class="bg-gray-100 rounded-md p-4 h-max">
                    <h3 class="text-lg max-sm:text-base font-bold text-gray-800 border-b border-gray-300 pb-2">Ringkasan
                        Order</h3>

                    <form class="mt-6">
                        <div>
                            <h3 class="text-base text-gray-800  font-semibold mb-4">Detail Info</h3>
                            <div class="space-y-3">
                                <div class="relative flex items-center">
                                    <input wire:model="name" type="text" placeholder="Nama Lengkap"
                                        class="px-4 py-2.5 bg-white text-gray-800 rounded-md w-full text-sm border-b focus:border-gray-800 outline-none" />
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                        class="w-4 h-4 absolute right-4" viewBox="0 0 24 24">
                                        <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                        <path
                                            d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z"
                                            data-original="#000000"></path>
                                    </svg>
                                </div>

                                <div class="relative flex items-center">
                                    <input type="email" wire:model="email" placeholder="Email"
                                        class="px-4 py-2.5 bg-white text-gray-800 rounded-md w-full text-sm border-b focus:border-gray-800 outline-none" />
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                        class="w-4 h-4 absolute right-4" viewBox="0 0 682.667 682.667">
                                        <defs>
                                            <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                                <path d="M0 512h512V0H0Z" data-original="#000000"></path>
                                            </clipPath>
                                        </defs>
                                        <g clip-path="url(#a)" transform="matrix(1.33 0 0 -1.33 0 682.667)">
                                            <path fill="none" stroke-miterlimit="10" stroke-width="40"
                                                d="M452 444H60c-22.091 0-40-17.909-40-40v-39.446l212.127-157.782c14.17-10.54 33.576-10.54 47.746 0L492 364.554V404c0 22.091-17.909 40-40 40Z"
                                                data-original="#000000"></path>
                                            <path
                                                d="M472 274.9V107.999c0-11.027-8.972-20-20-20H60c-11.028 0-20 8.973-20 20V274.9L0 304.652V107.999c0-33.084 26.916-60 60-60h392c33.084 0 60 26.916 60 60v196.653Z"
                                                data-original="#000000"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </form>

                    <ul class="text-gray-800 mt-6 space-y-3">
                        <li class="flex flex-wrap gap-4 text-sm">Subtotal <span
                                class="ml-auto font-bold">{{ formatRupiah($subtotal) }}</span>
                        </li>
                        <li class="flex flex-wrap gap-4 text-sm">Biaya Layanan <span
                                class="ml-auto font-bold">{{ formatRupiah($layanan) }}</span>
                        </li>
                        {{-- <li class="flex flex-wrap gap-4 text-sm">Biaya Layanan 2% <span class="ml-auto font-bold"
                                x-text="biayaLayanan"></span></li> --}}
                        <hr class="border-gray-300" />
                        <li class="flex flex-wrap gap-4 text-sm font-bold">Total <span
                                class="ml-auto">{{ formatRupiah($total) }}</span>
                        </li>
                    </ul>

                    <div class="mt-6 space-y-3">
                        <button type="button"
                            class="text-sm px-4 py-2.5 w-full font-semibold tracking-wide bg-gray-800 hover:bg-gray-900 text-white rounded-md">Checkout</button>
                        <button type="button"
                            class="text-sm px-4 py-2.5 w-full font-semibold tracking-wide bg-transparent text-gray-800 border border-gray-300 rounded-md">Continue
                            Shopping </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
