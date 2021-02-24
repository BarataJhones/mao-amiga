<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/common.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/aulas.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/dropzone.css')}}"> 
    <link rel="icon" href="{{asset('img/icone-site.png')}}" type="image/x-icon" />
    <title>Portal Mão Amiga - {{$aula->title}}</title>
</head>

@include ('telas.common.header')

<body>

    <section class="container container-margin">
        <div class="row">

            <a onclick="goBack()" >
                <i class="fas fa-arrow-circle-left fa-4x botao-voltar">
                </i>
            </a>

            <script>
                function goBack() {
                    window.history.back();
                }
            </script>


            <div class="quadro-mensagem col">

                <div class="row justify-content-center">
                    <div class="col-8 col-xl-5 col-lg-6 col-md-8 col-sm-10 col-xs-7">
                        <h1>Aula</h1>
                    </div>

                    <a class="video-popup" href="{{asset('video/biologia.mp4')}}">
                        <div class="col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1 icone-video-mensagem"></div>
                    </a>

                    <p class="mensagem justify-content-center" style="padding: 1em;">
                        Caro usuário(a), você irá ler e(ou) assistir as aulas dos seus professores, bem como o conteúdo explicado em sala de aula. Ao clicar no ícone da
                        <span style="color: #00AEEF">câmera</span> <img src="{{asset('img/icone-camera.png')}}" alt="Ícone da câmera">, o vídeo em LIBRAS da
                        aula aparecerá com seu professor ou intérprete explicando o conteúdo. Se disponibilizado pelo professor, há também imagens para visualização e
                        apostilas ou atividades para serem baixadas e as referências usadas no conteúdo. <br>
                        Esperamos que você aprenda e integre-se com a sua turma e professor. Bons estudos!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="container container-margin">
        <div class="quadro-aula">

            @if (session('message'))
                <div>
                    <h5>
                        {{ session('message') }}
                    </h5>
                </div>
            @endif

            <div class="informacoes-aula">

                    <h2>{{$aula->title}}</h2>
                    <h5>Ensino {{$aula->grade}} - {{$aula->discipline}}</h5>
                    <p class="nome-userCreator">Por <span style="color: #00AEEF">{{ $aula->userCreator }}</span></p>
                    <p class="aula-data-publicacao" id="timestamp">Postada em {{ $aula->created_at->format('d/m/Y') }}</p>
            </div>

            <p class="aula-texto">{{ $aula->content }}</p>

            <div class="aula-imagem-quadro">
                <img class="aula-imagem-principal" src="{{ url("storage/{$aula->image}") }}" alt="">
                <p class="aula-imagem-principal-fonte justify-content-center">Fonte: {{ $aula->imageFont }}</p>
            </div>

            <div class="text-center">
                <button class="aula-video-botao btn" type="button" data-toggle="collapse" data-target="#videoExpand" aria-expanded="false" aria-controls="videoExpand"></button>
            </div>
            
            <div class="aula-video collapse" id="videoExpand">
                
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <video src="{{ url("storage/{$aula->aulaVideo}") }}" controls></video>
                </div>
                <p class="aula-imagem-principal-fonte justify-content-center">Este vídeo é apenas uma representação genérica e não corresponde ao que está escrito na aula.</p>
            </div>

            <div class="conteudo-pra-baixar-referencias">

                <p class="conteudos-referencia-titulo" style="margin-top: 1em;">Referências:</p>
                <p class="referencias">{{ $aula->references }}</p>
                <p class="conteudos-referencia-titulo" style="margin-bottom: 1em;">Imagens e conteúdos para baixar:</p>

                <!--<a class="arquivos-para-baixar" href="arquivos-para-baixar/biologia1.jpg" download>
                    <img src="arquivos-para-baixar/biologia1.jpg">
                </a>-->
            </div>
            
        </div>

        <div class="text-center justify-content-center row" style="margin-bottom: 3em;">

            <div class="col-2">
                <a href="{{ route('aula.edit', $aula->id) }}">
                    <button type="submit" class="btn botao-del-edit edit fas fa-pencil-alt fa-lg" ></button>
                </a>
            </div>

            <div class="col-2">
                <form action="{{ route('aula.destroy', $aula->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn botao-del-edit delet fas fa-trash fa-lg"></button>
                </form>
            </div>
            
        </div>

    </section>
</body>

@include ('telas.common.footer')

</html>