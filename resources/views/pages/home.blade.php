<x-app-layout>

    @section('page-title', 'Gudang Produk Digital Untuk Bantuk Produktivitasmu')

    @push('meta')
        <meta name="description"
            content="Temukan pilihan produk digital berkualitas tinggi dengan harga terjangkau. Glowlocal hadir untuk memenuhi kebutuhanmu akan produk terbaik">
        <meta name="keywords" content="glowlocal, produk digital murah, ebook, template website modern">
        <meta property="og:title" content="Tempatnya produk digital berkualitas tinggi">
        <meta property="og:description"
            content="Temukan pilihan produk digital berkualitas tinggi dengan harga terjangkau. Glowlocal hadir untuk memenuhi kebutuhanmu akan produk terbaik">
    @endpush


    <section class="text-gray-600 body-font pt-8">
        <div class="container flex justify-center">
            <div class="text-start md:text-center md:max-w-3xl">
                <h1 class="title-font sm:text-4xl text-2xl mb-4 font-bold text-gray-900">Elevate Your Workflow with
                    Aesthetic Digital Creations</span>
                </h1>
                <p class="mb-8 leading-relaxed">
                    Temukan Koleksi Template Desain, Ebook dan Produk Digital Premium Untukmu!
                </p>
                <div class="flex flex-col md:flex-row gap-2 md:justify-center">
                    <a href="{{ route('product') }}"
                        class="inline-flex bg-gray-800 text-white py-2 px-6 focus:outline hover:bg-transparent hover:outline hover:text-gray-600 hover:outline-1 rounded text-lg">
                        <span class="w-full text-center">Jelajahi Produk</span>
                    </a>

                    <a href="{{ route('contact') }}"
                        class="inline-flex outline outline-1 py-2 px-6 focus:outline-none hover:bg-gray-600 hover:text-white rounded text-lg">
                        <span class="w-full text-center">Tentang Kami</span>
                    </a>

                </div>
            </div>
        </div>
    </section>

</x-app-layout>
