<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BNN')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<div class="profil-header">
    <div class="hashtags">
        #BNN #StopNarkoba #CegahNarkoba
    </div>
    <div class="media-social">
        <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
            <i class="fa-brands fa-facebook-f"></i>
        </a>
        <a href="https://www.twitter.com/" target="_blank" rel="noopener noreferrer" aria-label="Twitter" class="twitter">
            <i class="fa-brands fa-twitter"></i>
        </a>
        <a href="https://www.whatsapp.com/" target="_blank" rel="noopener noreferrer" aria-label="Whatsapp" class="whatsapp">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
        <a href="https://www.telegram.com/" target="_blank" rel="noopener noreferrer" aria-label="Telegram" class="telegram">
            <i class="fa-brands fa-telegram"></i>
        </a>
    </div>
    
    <div class="logo-company">
        <img src="{{ asset('images/assets/public/logo/logo-bnn.png') }}" alt="Logo BNN">
        <h1 class="title-company">Badan Narkotika Nasional</h1>
    </div>
</div>

<div class="hero-line-long"></div>