<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title') - {{ config('app.name', 'Glowlocal Shop') }}
    </title>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org"
            , "@type": "WebSite"
            , "name": "Glowlocal Shop"
            , "alternateName": "Glowlocal"
            , "url": "https://glowlocal.shop"
            , "potentialAction": {
                "@type": "SearchAction"
                , "target": {
                    "@type": "EntryPoint"
                    , "urlTemplate": "https://glowlocal.shop/search?q={search_term_string}"
                }
                , "query-input": "required name=search_term_string"
            }
        }

    </script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    @stack('meta')

    {{-- <meta name="description" content="@yield('meta_description','Temukan pilihan produk fisik maupun digital berkualitas tinggi dengan harga terjangkau. Kami hadir untuk memenuhi kebutuhanmu akan produk terbaik!')">
    <meta name="keywords" content="@yield('meta_keywords','produk premium')"> --}}

    <link rel="canonical" href="{{ url()->full() }}" />

    <meta property="og:url" content="{{ url()->full() }}" />

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <script src="https://accounts.google.com/gsi/client" async defer></script>

    <meta name="p:domain_verify" content="8df7ddde4a116bda6db0d760c4b8284e"/>
    
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1B9VKV3S0E"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-1B9VKV3S0E');
    </script>



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <x-toaster-hub /> <!-- ðŸ‘ˆ -->
</head>


<body class="font-sans antialiased">
    <div class="min-h-screen bg-white">
        <div class="navigation py-6">
            <livewire:layout.navigation />
        </div>


        <!-- Page Content -->
        <main class="w-full px-8 md:px-24">
            {{ $slot }}
        </main>

    </div>
</body>

</html>
