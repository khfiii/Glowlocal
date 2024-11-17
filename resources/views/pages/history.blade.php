<x-app-layout>

    @section('page-title', 'Riwayat Belanja')

    <div class="container mx-auto px-4 py-8">

        @if ($orders->isNotEmpty())

            <div class="space-y-4">
                        <a href="https://wa.me/+6283870978537?text=Hallo Ada Ka Ada Yang Mau Saya Tanyakan"
                class="p-2 text-sm rounded-md bg-green-500 text-white mb-4">Chat
                Penjual</a>
            <div class="grid gap-6 grid-cols-1 lg:grid-cols-2 xl:grid-cols-3">
                <!-- Order Card 1 -->
                @foreach ($orders as $order)
                    @foreach ($order->items as $item)
                        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <p class="text-sm text-gray-600">Order
                                            #{{ $order->id + $order->created_at->format('dmy') }}</p>
                                        <p class="text-sm text-gray-600">{{ $order->created_at->format('d F Y') }}</p>
                                    </div>

                                    @if ($order->status == 'settlement')
                                        <span
                                            class="px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">Sukses</span>
                                    @else
                                        <span
                                            class="px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-500">{{ $order->status }}</span>
                                    @endif
                                </div>
                                <div class="space-y-3">
                                    <div class="flex items-center gap-4">
                                        <img src="{{ $item->product->getFirstMediaUrl('product_images') }}"
                                            loading="lazy" alt="{{ $item->product->name }}"
                                            class="w-16 h-16 rounded-lg object-cover">
                                        <div>
                                            <p class="font-medium">{{ $item->product->title }}</p>
                                            <p class="text-sm text-gray-600">Jumlah : {{ $item->quantity }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                                    <p class="font-medium">Total: {{ formatRupiah($item->price) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
            </div>

        @else
            <div class="min-h-60 flex flex-col bg-white border shadow-sm rounded-xl">
                <div class="flex flex-auto flex-col justify-center items-center p-4 md:p-5">
                    <svg class="size-10 text-gray-500 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" x2="2" y1="12" y2="12"></line>
                        <path
                            d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
                        </path>
                        <line x1="6" x2="6.01" y1="16" y2="16"></line>
                        <line x1="10" x2="10.01" y1="16" y2="16"></line>
                    </svg>
                    <p class="mt-2 text-sm text-gray-800 dark:text-neutral-300">
                        Tidak Ada Riwayat Belanja
                    </p>
                </div>
            </div>
        @endif



    </div>
</x-app-layout>
