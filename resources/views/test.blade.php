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

