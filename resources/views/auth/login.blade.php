<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <img class="fond_connex" src="/assets/img/asset_seconnecter.png">
    <div class="bloc-connexion">
        <img class="logo" src="/assets/img/logo.png">

    <form method="POST" class="connect-form" action="{{ route('login') }}">
        @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            
            <!-- Pass -->
            <div class="">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div>
                <label for="remember_me" class="inline-flex items-center">
                    <span>{{ __('Remember me') }}</span>
                    <input class="checkbox" id="remember_me" type="checkbox" name="remember">
                </label>
            </div>

            <!-- send -->
            <x-primary-button class="butt_connexion">
                {{ __('Se connecter') }}
            </x-primary-button>
        </form>

        <p class="co-p">ou <a href="{{ url('register') }}">s'inscrire maintenant !</a></p>


    </div>














        
    </form>
</x-guest-layout>







