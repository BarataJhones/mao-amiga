<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="img/icone-site.png" type="image/x-icon" />
    <title>Portal Mão Amiga - Início</title>
</head>

@include ('telas.common.header')

<body>
    @if (session('message'))
        <div>
            <h5>
                {{ session('message') }}
            </h5>
        </div>
    @endif

    <section class="container container-margin index-mensagem">
        <div class="row justify-content-center">

            <div class="col-10 col-xl-5 col-lg-5 col-sm-8 embed-responsive embed-responsive-16by9">
                <video src="video/aulas/teste.mp4" type="video/mp4" autoplay loop controls muted></video>
            </div>

            <div class="col-10 col-xl-6 col-lg-6 col-sm-11">
                <div class="quadro-mensagem">
                    <p class="index-mensagem" style="padding: 1em;">
                        O Portal Mão Amiga é um site em que professores podem compartilhar conteúdos escritos e em forma de vídeo, transcritos em Língua Brasileira de Sinais
                        (LIBRAS), permitindo o aprendizado por todos os seus alunos. Os discentes poderão acompanhar o conteúdo escrito ao mesmo tempo em que veem o vídeo em
                        LIBRAS, além de poderem baixar qualquer conteúdo disponibilizado pelos professores.
                    </p>

                    <a href="sobre.php">
                        <div class="text-center">
                            <button class="btn botao-saiba-mais" type="button">Saiba mais</button>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-3 col-xl-1 col-lg-1 col-sm-2" style="margin-bottom: 1em;">
                <a class="video-popup" href="video/index-texto.mp4">
                    <div class="col-2 col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2 icone-video-azul"></div>
                </a>
            </div>

        </div>
    </section>

    <section class="container container-margin index-mensagem section-aulas-destaque">
        <div class="container" style="margin-top: 2em">
            <div class="row justify-content-center">
                <div class="col-4 col-xl-4 col-lg-5 col-md-7 col-sm-10 col-xs-7">
                    <p class="aulas-destaque-frase">Últimas aulas</p>
                </div>

                <a class="video-popup" href="video/o-portal-acessivel.mp4">
                    <div class="col-2 col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2 icone-video-azul"></div>
                </a>
            </div>
        </div>

        @foreach($aulas as $aula)

            <div class="row justify-content-center" style="padding: 1em;">

                <a href="{{ route('aula.viewAula', $aula->id) }}" class="my-auto">
                    <div class="my-auto">
                        <img class="aula-imagem-index" src="{{ url("storage/{$aula->image}") }}" alt="Representação artística da evolução do ser humano.">
                    </div>
                </a>

                <div class="col my-auto">
                    <a href="{{ route('aula.viewAula', $aula->id) }}">
                        <p class="aula-destaque-titulo text-center">{{$aula->title}}</p>
                    </a>
                    <p class="text-center"> Por <span class="aula-destaque-user">{{$aula->userCreator}}</span></p>
                    <p class="aula-data-publicacao" id="timestamp">Postada em {{ $aula->created_at->format('d/m/Y') }}</p>
                    
                    <div class="content">

                        <?php echo mb_strimwidth("{$aula->content}", 0, 200, "..."); ?>
                    </div>
                </div>

                <div class="col-10 col-xl-4 col-lg-4 col-md 5 col-sm-8 embed-responsive embed-responsive-16by9 my-auto">
                    <video src="{{ url("storage/{$aula->aulaVideo}") }}" controls></video>
                </div>
                <hr>
            </div>

        @endforeach

    </section>

</body>

@include ('telas.common.footer')

</html>