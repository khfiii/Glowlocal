<x-app-layout>
    @section('page-title', 'Tentang Kami')
    @push('meta')
        <meta name="description" content="Glowlocal shop adalah platform penyedia produk berkualitas tinggi.">
    @endpush

    <div class="bg-white">
        <div class="flex justify-center flex-col items-center gap-4">
            <div class="bg-white">
                <div class="mr-20 text-gray-600 lg:col-span-5 w-full md:max-w-2xl p-4 border">
                    <h1 class="mb-1 text-xl font-bold">Kebijakan Layanan</h1>
                    <p class="">
                        Syarat dan Ketentuan ini mengatur penggunaan layanan pembayaran situs Glowlocal. Glowlocal
                        berhak mengubah atau memperbarui Syarat dan Ketentuan ini sewaktu-waktu tanpa pemberitahuan
                        terlebih dahulu.
                    </p>
                </div>
            </div>
            <div class="bg-white">
                <div class="mr-20 text-gray-600 lg:col-span-5 w-full md:max-w-2xl p-4 border">
                    <h1 class="mb-1 text-xl font-bold">Keamanan dan Privasi</h1>
                    <p class="">
                        Glowlocal berkomitmen untuk menjaga privasi dan keamanan data pribadi Anda. Seluruh transaksi
                        dilakukan melalui sistem keamanan tinggi. Pengguna bertanggung jawab untuk menjaga kerahasiaan
                        data login dan informasi pembayaran mereka.
                    </p>
                </div>
            </div>

            <div class="bg-white">
                <div class="mr-20 text-gray-600 lg:col-span-5 w-full md:max-w-2xl p-4 border">
                    <h1 class="mb-1 text-xl font-bold">Kontak</h1>
                    <p class="flex flex-col gap-2">
                        Jika memiliki pertanyaan atau memerlukan bantuan terkait dengan transaksi pembayaran,
                        silakan hubungi layanan pelanggan Glowlocal melalui:

                    <div class="flex flex-col gap-1 pt-4">
                        <a href="https://wa.me/6283870978537?text=Halo%20saya%20tertarik%20dengan%20produk%20Anda"
                            target="_blank" class="flex gap-2 text-green-500">
                            <x-hugeicons-whatsapp class="text-green-500" />
                            Whatsapp
                        </a>
                    </div>
                    </p>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
