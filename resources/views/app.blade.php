<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Centre Nganda') }}</title>
    <meta
    name="description"
    content="Le Centre Nganda est un établissement médical spécialisé dans les soins contre le cancer, la radiothérapie, la pédiatrie, la médecine interne et bien d'autres services à Kinshasa."
/>
<meta
    name="keywords"
    content="Centre Nganda, Kinshasa, radiothérapie, oncologie, soins médicaux, traitement du cancer, pédiatrie, chirurgie, médecine interne"
/>
<meta name="author" content="Centre Nganda" />

<!-- favicon -->
<link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}" />


<!-- Open Graph Meta Tags -->
<meta
    property="og:title"
    content="Centre Nganda - Spécialistes en Radiothérapie et Soins Médicaux à Kinshasa"
/>
<meta
    property="og:description"
    content="Découvrez les services de santé spécialisés du Centre Nganda, notamment la radiothérapie, oncologie, pédiatrie, chirurgie et plus encore à Kinshasa."
/>
<meta property="og:image" content="{{ asset('assets/images/logo.png') }}" />
<meta property="og:url" content="{{ route('home') }}" />
<meta property="og:type" content="website" />

<!-- Title -->
<title>
    Centre Nganda - Radiothérapie et Soins Médicaux à Kinshasa
</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>
