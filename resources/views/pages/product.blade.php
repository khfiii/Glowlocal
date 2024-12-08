<x-app-layout>
    @section('page-title', 'Jelajahi Produk Premium Glowlocal')

    @push('meta')
        <meta name="description" content="Jelajahi produk premium berkualitas tinggi dari glowlocal shop">
        <meta property="og:title" content="Jelajahi Produk Premium Glowlocal">
        <meta name="keywords" content="glowlocal, produk digital, ebook indonesia">
        <meta property="og:description" content="Jelajahi produk premium berkualitas tinggi dari glowlocal shop">
    @endpush

    <div class="bg-white">

        <div class="text-black">

            <livewire:product-pages />


        </div>
    </div>
</x-app-layout>
