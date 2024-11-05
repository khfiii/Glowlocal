<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $website->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @dd($elementWebsite)
    </style>
</head>
    
 
    {!! $elementWebsite[0]['html'] !!}
   

</html>
