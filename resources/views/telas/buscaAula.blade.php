@extends('telas.common.mainContent')

@section('css')
    {{asset('css/aulas.css')}}
@endsection

@section('pageTitle')Aulas @endsection
@section('boxTitle')<i class="fas fa-video"></i> Aulas @endsection
@section('boxVideo') {{ Storage::disk('s3')->url('aulas.mp4') }}  @endsection

@section('boxContent' )
    Nesta área você pode visualizar todas as aulas criadas, ou buscar por alguma específica. Para visualizar os detalhes da aula,
    basta clicar na sua imagem ou título. Para realizar uma busca por alguma aula específica, basta escrever alguma palavra-chave
    no campo abaixo, e então clicar no botão
    <i class="fas fa-search" style="color:#00AEEF"></i>. <br>
    Você pode usar o título da aula, o criador da aula, a disciplina, a área de ensino ou alguma parte do conteúdo da aula como palavra-chave.
@endsection

@section('content')

    <!-- Botão Subir ao topo -->
    <a id="subirTopo">
        <i class="fas fa-arrow-up"></i>
    </a>

    <section class="searchBar">
        <form action="{{ route ('aula.search') }}" method="post">
            @csrf
            <div class="input-group mb-3" >
                <input type="text" name="search" class="form-control" placeholder="Pesquisar" aria-label="Pesquisar" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search" style="color:#00AEEF"></i></button>
                </div>
            </div>
        </form>
    </section>

    @if (session('message'))
        <div>
            <h5>
                {{ session('message') }}
            </h5>
        </div>
    @endif
    
    <section class="container container-margin index-mensagem section-aulas-destaque">
    
        <div class="row justify-content-center" style="padding: 1em;">
    
            @foreach($aulas as $aula)

                <div class="col-4 quadro-geral">
                    <a href="{{ route('aula.viewAula', $aula->id) }}" class="my-auto">
                        <img class="aula-imagem-index" src="{{ Storage::disk('s3')->url($aula->image) }}" alt="">
        
                        <p class="aula-destaque-titulo text-center"><?php echo mb_strimwidth("{$aula->title}", 0, 35, "..."); ?></p> 
                    </a>
        
                    <p class="text-center"> Por <span class="aula-destaque-user">{{$aula->user->name}}</span></p>
                    <p class="aula-data-publicacao" id="timestamp">
                        <i class="fas fa-eye" style="color:#00AEEF"></i> {{$aula->viewCount}} Visualizações &#8226 
                        {{ $aula->created_at->format('d/m/Y') }}
                    </p>
        
                </div>

            @endforeach

            <hr>

            @if (isset($filters))
                {{ $aulas->appends($filters)->links() }}
                
            @else
            {{ $aulas->links() }}
                
            @endif
            
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

@endsection