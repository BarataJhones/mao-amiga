@extends('telas.common.mainContent')

@section('css')
    {{asset('css/aulas.css')}}
@endsection

@section('pageTitle'){{$aula->title}} por {{ $userCreator['name'] }}@endsection
@section('boxTitle')Aula @endsection
@section('boxVideo')                @endsection

@section('boxContent' )
    Caro usuário(a), está é a sessão de aula. Você pode acompanhar a aula de forma escrita ou em vídeo. Ao clicar no ícone
    da <span style="color: #00AEEF">câmera</span> <i class="fas fa-video" style="color: #00AEEF"></i>, o vídeo em LIBRAS da
    aula aparecerá com intérprete explicando o conteúdo. Há também imagens para visualização e, se disponibilizado,
    apostilas ou atividades para serem baixadas e as referências usadas no conteúdo. <br>
    Se você for o criador desta aula, você poderá
    <span style="font-weight: bold; color: #eeae00">edita-la <i class="fas fa-pencil-alt"></i></span> ou
    <span style="font-weight: bold; color: #ff4e4e">deleta-la <i class="fa fa-trash"></i></span>.<br>
    Esperamos que essa aula ajude no seu aprendizado.<br>
    Bons estudos!
@endsection

@section('content')
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
                <p class="nome-userCreator">Por {{ $userCreator['name'] }}<span style="color: #00AEEF"></span></p>
                <p class="aula-data-publicacao" id="timestamp">Postada em {{ $aula->created_at->format('d/m/Y') }}</p>
            </div>

            <p class="aula-texto">{{ $aula->content }}</p>

            <div class="aula-imagem-quadro">
                <img class="aula-imagem-principal" src="{{ url("storage/{$aula->image}") }}" alt="">
                <p class="aula-imagem-principal-fonte justify-content-center">Fonte: {{ $aula->imageFont }}</p>
            </div>

            <div class="text-center">
                <button class="aula-video-botao btn" type="button" data-toggle="collapse" data-target="#videoExpand"
                    aria-expanded="false" aria-controls="videoExpand">
                    <i class="fas fa-video fa-lg" style="color: white"></i>
                </button>
            </div>

            <div class="aula-video collapse" id="videoExpand">

                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <video src="{{ url("storage/{$aula->aulaVideo}") }}" controls></video>
                </div>
                <p class="aula-imagem-principal-fonte justify-content-center">Este vídeo é apenas uma representação genérica
                    e não corresponde ao que está escrito na aula.</p>
            </div>

            <div class="conteudo-pra-baixar-referencias">

                <p class="conteudos-referencia-titulo" style="margin-top: 1em;">Referências:</p>
                <p class="referencias">{{ $aula->references }}</p>

                <p class="conteudos-referencia-titulo" style="margin-bottom: 1em;">Imagens e conteúdos para baixar:</p>
                <div>
                   
                </div>

                <!--<a class="arquivos-para-baixar" href="arquivos-para-baixar/biologia1.jpg" download>
                    <img src="arquivos-para-baixar/biologia1.jpg">
                </a>-->
            </div>

        </div>

        @if ($aula->userId == Auth::id())
            <div class="text-center justify-content-center row" style="margin-bottom: 3em;">

                <div class="col-2">
                    <a href="{{ route('aula.edit', $aula->id) }}">
                        <button type="submit" class="btn botao-del-edit edit fas fa-pencil-alt fa-lg"></button>
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
        @endif  

    </section>
@endsection