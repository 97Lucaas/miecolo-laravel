<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Scripts -->
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <!-- End Vite -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
</head>


    <body>

    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))

                {{ $header }}

    @endif

    <section class="landing">
        <section class="left">
            <section class="title-wrapper">
                <h1 class="title">
                    La balance connectée Miecolo <br>
                    c’est <span> juste </span> ce qu’il vous faut
                </h1>
                <p class="subtitle">
                    (en plus de pots de miel parce que vous allez produire un max...)
                </p>
            </section>
            <button class="landing-button">
                <a href=""> Découvrir nos balances </a>
            </button>
        </section>
        <section class="right">
            <img src="/assets/SVG/deco-landing.svg" alt="">
        </section>
    </section>

    <section class="concours">

        <section class="concours-wrapper">
            <p>Clic, clic, clic, vous êtes juste </p>
            <h2>à un clic de gagner votre balance.</h2>
            <p>À défaut de gagner au loto, tentez de remporter une de nos <br> balance connectées en trouvant le juste
                poids...
            </p>

            <button class="concours-button"> <a href="">Jouer</a></button>
        </section>
        <section class="concours-wrapper-back">
            <p>Clic, clic, clic, vous êtes juste </p>
            <h2>à un clic de gagner votre balance.</h2>
            <p>À défaut de gagner au loto, tentez de remporter une de nos <br> balance connectées en trouvant le juste
                poids...
            </p>
            <button class="concours-button"> <a href="">Jouer</a></button>
        </section>
    </section>

    <section class="blocs-wrapper">

        <section class="bloc bloc-choix">
            <section class="title-wrapper">
                <h3 class="title">
                    Le <span> juste </span> choix
                </h3>
                <p class="subtitle">
                    Découvrez le futur compagnon de votre apiculture <br>
                    <span>(et on ne parle pas Maya l’abeille)</span>   
                </p>
            </section>
            <button>Voir le produit</button>
            <img src="/assets/SVG/deco-choix.svg" alt="">
        </section>

        <section class="bloc bloc-conseil">
            <img src="/assets/SVG/deco-conseil.svg" alt="">
            <section class="title-wrapper">
                <h3 class="title">
                    Le <span> juste </span> conseil
                </h3>
                <p class="subtitle">
                    Soyez guidés par les conseillers Miecolo <br>
                    <span>(nous sommes très gentils, promis) </span>   
                </p>
            </section>
            <button>Voir la fiche technique</button>
        </section>

        <section class="bloc bloc-poids">
            <section class="title-wrapper">
                <h3 class="title">
                    Le <span> juste </span> poids
                </h3>
                <p class="subtitle">
                    Apprenez en plus sur nos capteurs de précision <br>
                    <span>(juste pour frimer auprès des collègues...)</span>   
                </p>
            </section>
            <button>Voir la fiche technique</button>
            <img src="/assets/SVG/deco-poids.svg" alt="">
        </section>

        <section class="bloc bloc-prix">
            <img src="/assets/SVG/deco-prix.svg" alt="">
            <section class="title-wrapper">
                <h3 class="title">
                    Le <span> juste </span> conseil
                </h3>
                <p class="subtitle">
                    Soyez guidés par les conseillers Miecolo <br>
                    <span>(nous sommes très gentils, promis) </span>   
                </p>
            </section>
            <button>Voir la fiche technique</button>
        </section>
    </section>

    </body>
</html>
