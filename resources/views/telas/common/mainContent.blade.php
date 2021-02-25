<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">

    <link rel="stylesheet" href="@yield('css')">

    <link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
    <link rel="icon" href="{{asset('img/icone-site.png')}}" type="image/x-icon" />
    <title>Portal Mão Amiga - @yield('pageTitle')</title>
</head>

@include ('telas.common.header')

<body>

    <section class="container container-margin">
        <div class="row">

            <!--Botão voltar -->
            <a onclick="goBack()">
                <i class="fas fa-arrow-circle-left fa-4x botao-voltar">
                </i>
            </a>

            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
            <!--Botão voltar -->

            <div class="quadro-mensagem col">

                <div class="row justify-content-center">
                    <div class="col-8 col-xl-5 col-lg-6 col-md-8 col-sm-10 col-xs-7">

                        <h1>@yield('boxTitle')</h1> <!-- Título da caixa principal das páginas -->

                    </div>

                    <a class="video-popup" href="@yield('boxVideo')">
                        <div class="col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1 icone-video-mensagem"></div>
                    </a>

                    <p class="mensagem justify-content-center" style="padding: 1em;">

                        @yield('boxContent')
                        <!-- Conteúdo da caixa principal das páginas -->

                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="container container-margin">

        @yield('content')
        <!-- Conteúdo das páginas -->

    </section>

    <script src="{{asset('js/area-professor.js')}}"></script>
</body>

@include ('telas.common.footer')

<script src="{{asset('js/dropzone.js')}}"></script>

</html>