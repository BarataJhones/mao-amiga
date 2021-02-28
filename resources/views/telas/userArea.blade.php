@extends('telas.common.mainContent')

@section('css')
    {{asset('css/userArea.css')}}
@endsection

@section('pageTitle')Tela do usuário @endsection
@section('boxTitle')Tela do usuário @endsection
@section('boxVideo')                @endsection

@section('boxContent' )
    Nesta área você pode visualizar seus dados cadastrais, suas aulas criadas e seus histório de visualização de aulas.
    Ao clicar na seta para baixo, a área clicada irá expandir e mostrar o conteúdo relacionado. <br><br>

    Na sessão <span style="font-weight: bold; color: #00AEEF">Meus dados</span> você pode visualizar seus dados cadastrais e
    <span style="font-weight: bold; color: #eeae00">edita-los <i class="fas fa-pencil-alt"></i></span>. <br><br>

    Na sessão <span style="font-weight: bold; color: #00AEEF">Minhas aulas</span> você pode visualizar as suas aulas criadas,
    <span style="font-weight: bold; color: #00AEEF">criar novas aulas <i class="fas fa-plus-circle"></i></span>,
    <span style="font-weight: bold; color: #eeae00">edita-las <i class="fas fa-pencil-alt"></i></span> ou
    <span style="font-weight: bold; color: #ff4e4e">deleta-las <i class="fa fa-trash"></i></span>.<br><br>

    Na sessão <span style="font-weight: bold; color: #00AEEF">Meu histórico</span> você pode conferir o seu histórico de
    aulas assistidas,
    visualizar as aulas ou
    <span style="font-weight: bold; color: #ff4e4e">deletar o histórico <i class="fa fa-trash"></i></span>.
@endsection

@section('content')
    <section class="container container-margin">

        @if (session('message'))
        <div>
            <h5>
                {{ session('message') }}
            </h5>
        </div>
        @endif

        <div data-toggle="collapse" data-target="#listExpand" aria-expanded="false" aria-controls="listExpand">
            <h5>Minhas aulas <i class="fas fa-chevron-circle-down fa-lg"></i></h5>
        </div>

        <div class="aula-video collapse" id="listExpand">

            <div class="botaoAdd">
                <a href="{{ route('aula.cadastra') }}">
                    <i class="fas fa-plus-circle fa-3x"></i>
                </a>
            </div>

            <table class="table table-hover table-striped" style="margin-top: 1em;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Título</th>
                        <th scope="col">Data de publicação</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aulas as $aula)
                        @if ($aula->userId == Auth::id())
                            <tr>
                                <th scope="row">{{$aula->id}}</th>
                                <td>
                                    <a href="{{ route('aula.viewAula', $aula->id) }}">
                                        <img class="list-aula-img" src="{{ url("storage/{$aula->image}") }}" alt="">
                                    </a>
                                </td>
                                <td>{{$aula->title}}</td>
                                <td>{{$aula->created_at->format('d/m/Y')}}</td>
                                <td>
                                    <a href="{{ route('aula.edit', $aula->id) }}">
                                        <button type="submit" class="btn botao-del-edit edit fas fa-pencil-alt"></button>
                                    </a>
                                </td>
                        
                                <td>
                                    <form action="{{ route('aula.destroy', $aula->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn botao-del-edit delet fas fa-trash"></button>
                                    </form>
                                </td>
                            </tr>
                        @endif  
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection