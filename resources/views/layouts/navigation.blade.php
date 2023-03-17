<header class="menu">
        <!--  logo  -->

            <a href="/">
                <img src="/assets/SVG/miecolo.svg" alt="Logo de Miecolo" style="height: 100%; width: 130%;">
            </a>
        

        <ul class="menu_list">
            <li class="game-button">
                <button> <x-responsive-nav-link href="{{url('/jeu')}}"> Jeu Concours </x-responsive-nav-link> </button>
            </li>
            <li>
                <x-responsive-nav-link href="{{url('/produit')}}"> Le produit </x-responsive-nav-link>
            </li>
            <li>
                <x-responsive-nav-link href="{{url('/contact')}}"> Parler à un conseiller </x-responsive-nav-link>
            </li>

            <li class="cart">
                <a href="">
                    <img src="./assets/SVG/cart.svg" alt="">
                    <section class="cart-number-wrapper">
                        <section class="cart-number">0</section>
                    </section>
                </a>

            </li>
            @if (Auth::check())

            <li>
                <x-responsive-nav-link :href="route('profile.edit')"> Mon compte </x-responsive-nav-link>
            </li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                            @csrf
                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"> Se déconnecter </x-responsive-nav-link>
                </form>
            </li>

            @else

            <li>
                <x-responsive-nav-link :href="route('login')"> Se connecter </x-responsive-nav-link>
            </li>

            <li>
                <x-responsive-nav-link :href="route('register')"> S'inscrire </x-responsive-nav-link>
            </li>

            @endif
        </ul>
    </header>