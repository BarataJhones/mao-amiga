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
                <video src="{{ Storage::disk('s3')->url('mao_amiga_texto_index.mp4') }}" type="video/mp4" autoplay loop controls muted></video>
            </div>

            <div class="col-10 col-xl-6 col-lg-6 col-sm-11">
                <div class="quadro-mensagem">
                    <p class="index-mensagem" style="padding: 1em;">
                        O Portal Mão Amiga é um site em que os usuários podem compartilhar conteúdos escritos e em forma de vídeo,
                        transcritos em Língua Brasileira de Sinais (LIBRAS), permitindo o aprendizado para surdos. Os usuários poderão
                        acompanhar o conteúdo escrito ao mesmo tempo em que veem o vídeo em LIBRAS, além de poderem baixar qualquer conteúdo
                        disponibilizado pelos criadores do conteúdo.
                    </p>

                    <a href="#">
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
                    <p class="aulas-destaque-frase">Aulas em destaque</p>
                </div>

                <a class="video-popup" href="video/o-portal-acessivel.mp4">
                    <div class="col-2 col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2 icone-video-azul"></div>
                </a>
            </div>
        </div>

        
        @if ($aulas != null)
            @foreach($aulas as $aula)
                <div class="row justify-content-center" style="padding: 1em;">
                    <a href="{{ route('aula.viewAula', $aula->id) }}" class="my-auto">
                        <div class="my-auto">
                            <img class="aula-imagem-index" src="{{ Storage::disk('s3')->url($aula->image) }}" alt="">
                        </div>
                    </a>

                    <div class="col my-auto">
                        <a href="{{ route('aula.viewAula', $aula->id) }}">
                            <p class="aula-destaque-titulo">
                                <?php echo mb_strimwidth("{$aula->title}", 0, 60, "..."); ?>
                            </p>
                        </a> <br>

                        <div class="content">
                            <?php echo mb_strimwidth("{$aula->content}", 0, 150, "..."); ?>
                        </div>

                    <div class="userDateView row">
                            <div class="col-8">
                                Por <span class="aula-destaque-user text-left"><?php echo mb_strimwidth("{$aula->user->name}", 0, 18, "..."); ?></span>,
                                {{ $aula->created_at->diffForHumans() }}
                            </div>
                        
                            <div class="col-4 text-right">
                                <span class=""><i class="fas fa-eye" style="color:#00AEEF"></i> {{$aula->viewCount}}
                                    <i class="fa fa-comments" style="color:#00AEEF"></i> 

                                    @php $qntComments = 0; @endphp

                                    @foreach ($replies as $replie)
                                        @if ($replie->aula_id == $aula->id)
                                            @php $qntComments++ @endphp
                                        @endif
                                    @endforeach
                                    {{ $qntComments }}                            
                                </span>
                            </div>
                        </div>

                    </div>

                    <div class="col-10 col-xl-4 col-lg-4 col-md 5 col-sm-8 embed-responsive embed-responsive-16by9 my-auto">
                        <video src="{{ Storage::disk('s3')->url($aula->aulaVideo) }}" controls></video>
                    </div>
                    <hr>
                </div>
            @endforeach
        @endif

    </section>

</body>

@include ('telas.common.footer')

</html>