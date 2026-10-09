<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BNN')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (sessionStorage.getItem('is_internal_nav') === 'true') {
            document.documentElement.classList.add('internal-nav');
        }
    </script>
</head>

<body>

<div class="page-transition initial-cover">
    <div class="transition-layer layer-1"></div>
    <div class="transition-layer layer-2"></div>
    <div class="transition-layer layer-3"></div>
</div>

@include('layouts.main.navigation-bar.main')

<main>
    @yield('content')
</main>

@include('layouts.main.footer.footer')

</body>
</html>

