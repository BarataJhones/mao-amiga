<script src="{{asset('js/fontawesome.js')}}"></script>
<script src="{{asset('js/fontawesome.min.js')}}"></script>

<link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
<link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.0.6/css/all.css')}}">

<!--Botão voltar -->
<script>
    function goBack() {
        window.history.back();
    }
</script>


<style>
.botao-voltar {
    color: #00AEEF;
    float: left;
}

.botao-voltar:hover {
  color: #23527d;
}

center{
    width: 50%;
    margin: 0 auto;
}

.logo-login{
    font-family: 'Montserrat Alternates', sans-serif;
    font-size: 1em;
    font-weight: bold;
    font-style: italic;
    color: #00AEEF;
}

.logo{
    width: 50%;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 1em
}

.gif-cadastrar-usuario{
    width: 47%;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 1em;
}
</style>

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div style="width: 27em">
                <!--Botão voltar -->
                <a class="botao-voltar" onclick="goBack()">
                    <i class="fas fa-arrow-circle-left fa-3x">
                    </i>
                </a>
            </div>

            <div class="text-center logo-login">
                <img class="logo" src="{{asset('img/svg_logo_azul.svg')}}" alt="">
                <i class="fas fa-sign-in-alt"></i> Login
            </div>

        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <p><i class="fas fa-at" style="color: #00AEEF"></i> Email</p> 

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required 
                    autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <p><i class="fas fa-key" style="color: #00AEEF"></i> Senha</p>

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required 
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <!-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Manter conectado') }}</span>
                </label>
            </div> -->

            <div class="flex items-center justify-end mt-4">
                <!-- Forgot password -->
                <!-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
                @endif -->

                <x-button class="ml-3" style="background-color: #00AEEF; margin-bottom: 1em;">
                    <i class="fas fa-check"></i>&nbsp;{{ __('Entrar') }}
                </x-button>
            </div>

            <div class="text-center" style="color: #00AEEF">
                <img class="gif-cadastrar-usuario" src="{{asset('img/form-sinais/gif_cadastrar_usuario.gif')}}" alt="Imagem animada com os sinais em LIBRAS para 'Cadastre seu perfil'">
                <a href="{{ route('register') }}">
                    <i class="fas fa-user-plus"></i> Não tem conta? Clique aqui para cadastrar.</a> <br>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>