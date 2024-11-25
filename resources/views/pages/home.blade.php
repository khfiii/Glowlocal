<x-app-layout>

    @section('page-title', 'Gudang Produk Digital Untuk Bantuk Produktivitasmu')

    @push('meta')
        <meta name="description"
            content="Temukan pilihan produk digital berkualitas tinggi dengan harga terjangkau. Glowlocal hadir untuk memenuhi kebutuhanmu akan produk terbaik">
        <meta name="keywords" content="glowlocal, produk digital, desain produk aesthetic, digital printing ideas 2024">
        <meta property="og:title" content="Glowlocal Shop">
        <meta property="og:description"
            content="Temukan pilihan produk digital berkualitas tinggi nan aesthetic dengan harga terjangkau. Glowlocal hadir untuk memenuhi kebutuhanmu akan produk digital terbaik">
    @endpush


    <section class="text-gray-600 body-font pt-8 -mt-10 space-y-4">
        <div class="grid grid-cols-2 w-full md:px-[18rem]">
            <div class="">
                <img src="{{ asset('produk4.jpg') }}" alt="Aesthetic Digital Printing Design" class="">
            </div>
            <div class="">
                <img src="{{ asset('produk5.webp') }}" alt="Aesthetic Digital Printing">
            </div>
        </div>
        <div class="container flex justify-center">
            <div class="text-start md:text-center md:max-w-3xl">
                <h1 class="title-font sm:text-4xl text-2xl mb-4 font-bold text-gray-900 font-serif text-center">Produk Digital & Ebook Terjemahan Indonesia</span>
                </h1>
                <p class="mb-8 leading-relaxed font-serif text-center">
                    Jelajahi Beragam Koleksi Template Desain Kreatif, Ebook Keren, dan Produk Digital Premium
                    lainnya
                    Khusus Untukmu ✨
                </p>
                <div class="flex flex-col md:flex-row gap-2 md:justify-center">
                    <a href="{{ route('product') }}" class="relative inline-block px-4 py-2 font-medium group">
                        <span
                            class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                        <span
                            class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                        <div class="w-full relative text-center">
                            <span class=" text-black group-hover:text-white font-serif">Jelajahi Produk</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
