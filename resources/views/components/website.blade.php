<!DOCTYPE html>
<html data-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.stagging.client_key') }}"></script> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

        <script src="https://unpkg.com/@silexlabs/grapesjs-filter-styles"></script>
    <!-- Scripts -->
    @vite(['resources/js/grape.js'])
    <style>

        [x-cloak] { display: none !important; }
        body, html {
        margin: 0;
        height: 100%;
        }

        .change-theme-button {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin: 5px;
        }

        .change-theme-button:focus {
        /* background-color: yellow; */
        outline: none;
        box-shadow: 0 0 0 2pt #c5c5c575;
        }

        .panel__top {
            padding: 0;
            width: 100%;
            display: flex;
            position: initial;
            justify-content: center;
            justify-content: space-between;
            }
            .panel__basic-actions {
            position: initial;
            }

    </style>
</head>


<body class="font-sans antialiased">

    
  <div id="gjs" class="max-h-max">
   {{ $slot }}
  </div>

  
</body>

</html>
