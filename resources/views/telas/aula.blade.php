@extends('telas.common.mainContent')

@section('css')
    {{asset('css/aulas.css')}}
@endsection

@section('pageTitle'){{$aula->title}} por {{ $userCreator['name'] }}@endsection
@section('boxTitle')<i class="fas fa-video"></i> Assistir aula @endsection
@section('boxVideo') {{ Storage::disk('s3')->url('assistir_aula.mp4') }} @endsection 

@section('boxContent' )
    Caro usuário(a), esta é a sessão de aula. Você pode acompanhar a aula de forma escrita ou em vídeo. Ao clicar no da
    <span style="color: #00AEEF">câmera</span> <i class="fas fa-video" style="color: #00AEEF"></i>, o vídeo em LIBRAS
    da aula aparecerá com a tradução do conteúdo. Há também imagens para visualização, se disponibilizado, apostilas ou
    atividades para serem baixadas e as referências usadas no conteúdo. Você também pode realizar comentários <i class='fa fa-comments' style="color: #00AEEF"></i>, no final da página de cada aula.<br>
    Se você for o criador desta aula, você poderá
    <span style="font-weight: bold; color: #eeae00">editá-la <i class="fas fa-pencil-alt"></i></span> ou
    <span style="font-weight: bold; color: #ff4e4e">deletá-la <i class="fa fa-trash"></i></span>.<br>
    Esperamos que essa aula ajude no seu aprendizado. <br>
    Bons estudos!

@endsection

@section('content')

    <!-- Botão Subir ao topo -->
    <a id="subirTopo">
        <i class="fas fa-arrow-up"></i>
    </a>

    @if (session('message'))
    <div>
        <h5>
            {{ session('message') }}
        </h5>
    </div>
    @endif

    <section class="container container-margin">
        <div class="quadro-aula">

            <div class="informacoes-aula">

                <h2>{{$aula->title}}</h2>
                <h5>Ensino {{$aula->grade}} - {{$aula->discipline}}</h5>
                <p class="nome-userCreator">Por {{ $userCreator['name'] }}<span style="color: #00AEEF"></span></p>
                <p class="aula-data-publicacao" id="timestamp">Postada em {{ $aula->created_at->format('d/m/Y') }}</p>
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
                    <video src="{{ Storage::disk('s3')->url($aula->aulaVideo) }}" controls></video>
                </div>
                <!-- <p class="aula-imagem-principal-fonte justify-content-center">Este vídeo é apenas uma representação genérica
                    e não corresponde ao que está escrito na aula.</p> -->
            </div>

            <p class="" > {!! $aula->content !!} </p> 

            <div class="aula-imagem-quadro">
                <img class="aula-imagem-principal" src="{{ Storage::disk('s3')->url($aula->image) }}" alt=""> 
                <p class="aula-imagem-principal-fonte justify-content-center">Fonte: {{ $aula->imageFont }}</p>
            </div>

            <div>
                <p class="conteudos-referencia-titulo" style="margin-top: 1em;">Referências:</p>
                <p class="referencias">{{ $aula->references }}</p>

                <p class="conteudos-referencia-titulo" style="margin-bottom: 1em;">Imagens e conteúdos para baixar:</p>
                <div class="listaFiles">
                    @foreach ($files as $file)
                        <a href="{{ route('aula.fileDownload', $file->id) }}" class="conteudo-pra-baixar">
                            <i class="fas fa-file-download"></i>
                            {{ $file->title }}
                        </a> <br>
                   @endforeach
                </div>
            </div>

            @if ($aula->userId == Auth::id())
                <div class="text-center justify-content-center row" style="margin-bottom: 3em;">
                
                    <div class="col-2">
                        <a href="{{ route('aula.edit', $aula->id) }}">
                            <button type="submit" class="btn botao-del-edit edit">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </a>
                    </div>
                
                    <div class="col-2">
                        <form action="{{ route('aula.destroy', $aula->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn botao-del-edit delet">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endif

        </div>

        <div style="margin-bottom: 3em; font-size: 1.2em" class="visualizações">
            <i class="fas fa-eye" style="color:#00AEEF"></i> {{$aula->viewCount}} Visualizações
        </div> 

        <!-- Comentários -->
        <div class="commentSession">
            <h5><i class="fas fa-comments"></i> Comentários</h5>
            @if ((Auth::id()!=null))
                <div class="card-body">
                    <p style="color: #00AEEF">
                        @php
                            $qntComments = count($replies);
                            echo "<i class='fa fa-comments'></i>  $qntComments comentários";
                        @endphp
                    </p>

                    <form action="{{ route('comment.add') }}" method="post" enctype="multipart/form-data"> {{-- id="formComment" --}}
                    
                        @csrf
                    
                        <div class="form-group row" style="margin-bottom: 2em">
                            <?php  $avatar = Auth::user()->avatar; ?>

                            <div class="col-1">
                                <img src="{{ Storage::disk('s3')->url($avatar) }}" class="userAvatarComment">
                            </div>
                    
                            <div class="col">

                                 <textarea type="text" name="comment" class="form-control" cols="1" rows="5" placeholder="Entre na conversa..." required>
                                </textarea>

                                <!--<textarea name="comment" class="form-control" id="comment" style="display:none" value="comment"></textarea>
                                <div id="editorComment"></div>-->

                                <input type="hidden" name="aula_id" value="{{ $aula->id }}" /> <br>
                                <div class="form-group">
                                    <input type="hidden" class="btn btn-sm btn-outline-danger py-0" />
                                    <button type="submit" class="btn botaoComment">Comentar
                                </div>
                            </div>
                        </div>
                    
                    </form>

                </div>
            @else
                <div class="facaLogin">
                    
                    <a href="{{ route('aula.userList') }}" class="nav-item nav-link" style="font-size: 1.5em">
                        <h5><i class="fas fa-sign-in-alt"></i> Clique aqui e faça login para participar da conversa</h5>
                    </a>

                    <img class="aula_gif" src="{{asset('img/form-sinais/gif_cadastrar_usuario.gif')}}" alt="Imagem animada com os sinais em LIBRAS para 'Nome'"> <br>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        <i class="fas fa-user-plus"></i> {{ __('Não tem cadastrado? Clique aqui') }}
                    </a>
                </div>
                <hr>
            @endif
        
            <!-- Scrolling pagination-->
            <div class="scrolling-pagination">
                @foreach($comments as $comment)
                    @if ($comment->parent_id == 0)
                        @include('posts.comments')
                    @endif
            
                    @foreach($replies as $replie)
                        @if ($replie->parent_id == $comment->id)
                            @include('posts.replies')
                        @endif
                    @endforeach
                @endforeach
                {{ $comments->links() }}
            </div>
            
        </div>

    </section>

<!-- Script do botão Subir ao topo -->
<script type="text/javascript">
    jQuery(document).ready(function(){
    
    jQuery("#subirTopo").hide();
    
    jQuery('a#subirTopo').click(function () {
             jQuery('body,html').animate({
               scrollTop: 0
             }, 800);
            return false;
       });
    
    jQuery(window).scroll(function () {
             if (jQuery(this).scrollTop() > 1000) {
                jQuery('#subirTopo').fadeIn();
             } else {
                jQuery('#subirTopo').fadeOut();
             }
         });
    });
</script>

<!-- Scripts scroll infinito -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>

<script type="text/javascript" src="{{asset('js/scrolling-pagination.js')}}"></script>

<!--<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>-->

<!-- Quill - pegar formatação do textarea -->
<!-- <script>

    var SizeComment = Quill.import('attributors/style/size');
    SizeComment.whitelist = ['10px', '12px', '25px'];
    Quill.register(SizeComment, true);

    var AlignComment = Quill.import('attributors/style/align');
    AlignComment.whitelist = ['', 'center', 'justify', 'right'];
    Quill.register(AlignComment, true);

    quillComment = new Quill('#editorComment', {
        modules: {
            toolbar: [
                [{ 'font': [] }, { 'size': ['10px', '12px', '25px'] }],
                [ 'bold', 'italic', 'underline', 'strike' ],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'script': 'super' }, { 'script': 'sub' }],
                [{ 'header': '1' }, { 'header': '2' }, 'blockquote', 'code-block' ],
                [{ 'list': 'ordered' }, { 'list': 'bullet'}, { 'indent': '-1' }, { 'indent': '+1' }],
                [ 'direction', { 'align': ['', 'center', 'justify', 'right'] }],
                [ 'clean' ]
            ]
        },

    placeholder: 'Escreva seu comentário...',
    theme: 'snow'
    });

    var formComment = document.querySelector('#formComment')

    formComment.onsubmit = function() { // onsubmit do this first
        var nameComment = document.getElementById("comment"); // set name input var
        nameComment.value = quill.root.innerHTML; // populate name input with quill data
        return true; // submit form
    }

</script> -->

@endsection