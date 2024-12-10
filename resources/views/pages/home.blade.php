<x-app-layout>

    @section('page-title', 'Gudang Produk Digital Untuk Bantu Produktivitas dan Pengembangan dirimu')

    @push('meta')
        <meta name="description"
            content="Temukan pilihan produk digital berkualitas tinggi dengan harga terjangkau. Glowlocal hadir untuk memenuhi kebutuhanmu akan produk terbaik">
        <meta name="keywords" content="glowlocal, produk digital, ebook terjemahan indonesia, ebook, twointomedia, ebook gratis bahasa indonesia">
        <meta property="og:title" content="Glowlocal Shop">
        <meta property="og:description"
            content="Temukan pilihan produk digital berkualitas tinggi nan aesthetic dengan harga terjangkau. Glowlocal hadir untuk memenuhi kebutuhanmu akan produk digital terbaik">
    @endpush


    <section class="text-gray-600 body-font pt-8 -mt-10 space-y-4">
        <div class="grid grid-cols-1 w-full md:px-[15rem]">
            <div class="">
                <img src="{{ asset('estetik3.webp') }}" alt="Aesthetic Digital Printing Design" class="">
            </div>
        </div>
        <div class="container flex justify-center">
            <div class="text-start md:text-center md:max-w-3xl">
                <h1 class="title-font sm:text-4xl text-xl mb-4 font-bold text-gray-900 font-serif text-start md:text-center">Baca Ebooks dari google play books kurang dari Rp.5000</span>
                </h1>
                <p class="mb-8 leading-relaxed font-serif text-start md:text-center">
                    Jelajahi Beragam Koleksi Ebook Keren, dan Produk Digital 
                    lainnya
                    Khusus Untukmu ✨
                </p>
                <div class="flex flex-col md:flex-row gap-2 md:justify-center">

                    @if(\Browser::isInApp())
                        <a href="#" class="relative inline-block px-4 py-2 font-medium group" id="openInBrowserButton">
                        <span
                            class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                        <span
                            class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                        <div class="w-full relative text-center">
                            <span class=" text-black group-hover:text-white font-serif">Jelajahi Produk</span>
                        </div>
                    </a>
                    @else
                    <a href="{{ route('product') }}" class="relative inline-block px-4 py-2 font-medium group">
                        <span
                            class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                        <span
                            class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                        <div class="w-full relative text-center">
                            <span class=" text-black group-hover:text-white font-serif">Jelajahi Produk</span>
                        </div>
                    </a>     
                    @endif

                </div>
            </div>
        </div>
    </section>
</x-app-layout>
