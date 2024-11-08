<x-app-layout>

    @section('page-title', 'Tempat Barang Unik, Kecantikan & Alat Rumah Tanggas')



    <section class="text-gray-600 body-font pt-8">
        <div class="container flex justify-center">
            <div class="text-start md:text-center md:max-w-3xl">
                <h1 class="title-font sm:text-4xl text-2xl mb-4 font-bold text-gray-900">Katalog Barang Premium: Harga Terjangkau, Kualitas Maksimal!</span>
                </h1>
                <p class="mb-8 leading-relaxed">
                Temukan pilihan barang premium berkualitas tinggi dengan harga terjangkau. Kami hadir untuk memenuhi kebutuhan Anda akan produk terbaik!
                </p>
                <div class="flex flex-col md:flex-row gap-2 md:justify-center">
                    <a href="{{ route('product') }}"
                        class="inline-flex bg-gray-800 text-white py-2 px-6 focus:outline-none hover:bg-transparent hover:outline hover:text-gray-600 hover:outline-1 rounded text-lg">
                        <span class="w-full text-center">Jelajahi Produk</span>
                        </a>
                    <a href="{{ route('contact') }}"
                        class="inline-flex outline outline-1 py-2 px-6 focus:outline-none hover:bg-gray-600 hover:text-white rounded text-lg">
                        <span class="w-full text-center">Hubungi Kami</span>
                        </a>
                   
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
