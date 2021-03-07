@extends('telas.common.mainContent')

@section('css')
    {{asset('css/buscaAula.css')}}
@endsection

@section('pageTitle')Aulas @endsection
@section('boxTitle')Aulas @endsection
@section('boxVideo')                @endsection

@section('boxContent' )
    Nesta área você pode visualizar todas as aulas, ou buscar por alguma específica.
@endsection

@section('content')
    <section class="container container-margin index-mensagem section-aulas-destaque">
    
        <div class="row justify-content-center" style="padding: 1em;">
    
            @foreach($aulas as $aula)

                <div class="col-4 quadro-geral">
                    <a href="{{ route('aula.viewAula', $aula->id) }}" class="my-auto">
                        <img class="aula-imagem-index" src="{{ url("storage/{$aula->image}") }}" alt="">
        
                        <p class="aula-destaque-titulo text-center">{{$aula->title}}</p>
                    </a>
        
                    <p class="text-center"> Por <span class="aula-destaque-user">{{$aula->user->name}}</span></p>
                    <p class="aula-data-publicacao" id="timestamp">
                        <i class="fas fa-eye" style="color:#00AEEF"></i> {{$aula->viewCount}} Visualizações &#8226 
                        {{ $aula->created_at->format('d/m/Y') }}
                    </p>
        
                </div>

            @endforeach

        </div>
    
    </section>

@endsection