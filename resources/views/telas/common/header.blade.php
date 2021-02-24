<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/header.css')}}"> 
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('bootstrap/fontawesome.min.css')}}"> 
    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="{{asset('magnific-popup/magnific-popup.css')}}"> 
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css')}}" media="screen"> 
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}"> 

    <link href="{{asset('https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,700i&display=swap')}}" rel="stylesheet">
    
</head>

<header>

    <div class="background">

    <nav class="navbar navbar-expand-lg navbar-dark static-top">
        <div class="container">
            <a class="navbar-brand video-popup" href="video/portal-mao-amiga.mp4">
                <img src="{{asset('img/logo.png')}}" alt="Logo do Portal Mão Amiga">
                </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aula.listaIndex') }}">
                        <div class="col-padding text-uppercase text-warning icone">
                            <article class="borda">
                                <div class="icone-inicio"></div>
                                <a class="nav-link" href="{{ route('aula.listaIndex') }}">Início</span> 
                                <span class="sr-only">(current)</span>
                            </article>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="sobre.php">
                        <div class="col-padding text-uppercase text-warning icone">
                            <article class="borda">
                                <div class="icone-sobre"></div>
                                <a class="nav-link" href="sobre.php">Sobre</a>
                            </article>
                        </div>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="area-aula-2.php">
                        <div class="col-padding text-uppercase text-warning icone">
                            <article class="borda">
                                <div class="icone-aluno"></div>
                                <a class="nav-link" href="area-aula-2.php">Aulas</span> 
                            </article>
                        </div>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aula.userList') }}">
                        <div class="col-padding text-uppercase text-warning icone">
                            <article class="borda">
                                <div class="icone-login"></div>
                                <a class="nav-link" href="{{ route('aula.userList') }}">Login</span> 
                            </article>
                        </div>
                    </a>
                </li>
            </ul>
            </div>
        </div>

    </nav>

    <div class="container" style="margin-top: 2em">
        <div class="row justify-content-center">
            <div class="col-10 col-xl-10 col-lg-9 col-md-8 col-sm-10 col-xs-7">
                <p class="header-frase">O portal acessível entre o professor e o aluno surdo</p>
            </div>

            <a class="video-popup" href="video/o-portal-acessivel.mp4">
              <div class="col-2 col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2 icone-video"></div>
            </a>

        </div>
    </div>
</header>

<script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script> 
<script src="{{asset('js/popper.min.js')}}" ></script> 
<script src="{{asset('js/bootstrap.min.js')}}" ></script> 
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script> 
<script src="{{asset('js/fontawesome.js')}}" ></script> 
<script src="{{asset('js/fontawesome.min.js')}}"></script>

<!-- Magnific Popup core JS file -->
<script src="{{asset('magnific-popup/jquery.magnific-popup.js')}}"></script> 

<!-- Magnific Popup effect-->
<script>
    $(document).ready(function() {
    $('.video-popup').magnificPopup({
        /* disableOn: 700,*/
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
        });
    });

</script>


