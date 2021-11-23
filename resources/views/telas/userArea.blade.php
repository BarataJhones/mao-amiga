@extends('telas.common.mainContent')

@section('css')
{{asset('css/userArea.css')}}
@endsection

@section('pageTitle')Área do usuário @endsection
@section('boxTitle')Área do usuário @endsection
@section('boxVideo') @endsection

@section('boxContent' )
Nesta área você pode visualizar seus dados cadastrais, suas aulas criadas e seus histório de visualização de aulas.
Ao clicar na seta para baixo, a área clicada irá expandir e mostrar o conteúdo relacionado. <br><br>

Na sessão <span style="font-weight: bold; color: #00AEEF"><i class="fas fa-user"></i> Meus dados</span> você pode visualizar seus dados cadastrais e
<span style="font-weight: bold; color: #eeae00">edita-los <i class="fas fa-pencil-alt"></i></span>. <br><br>

Na sessão <span style="font-weight: bold; color: #00AEEF"><i class="fas fa-video"></i> Minhas aulas</span> você pode visualizar as suas aulas criadas,
<span style="font-weight: bold; color: #00AEEF">criar novas aulas <i class="fas fa-plus-circle"></i></span>,
<span style="font-weight: bold; color: #eeae00">edita-las <i class="fas fa-pencil-alt"></i></span> ou
<span style="font-weight: bold; color: #ff4e4e">deleta-las <i class="fa fa-trash"></i></span>.<br><br>

Na sessão <span style="font-weight: bold; color: #00AEEF"><i class="fas fa-history"></i> Meu histórico</span> você pode conferir o seu histórico de aulas assistidas, visualizar as aulas ou
<span style="font-weight: bold; color: #ff4e4e">deletar o histórico <i class="fa fa-trash"></i></span>.
@endsection

@section('content')

<!-- Botão Subir ao topo -->
<a id="subirTopo">
    <i class="fas fa-arrow-up"></i>
</a>

<section class="container container-margin" style="margin-bottom: 3em">

    @if (session('message'))
    <div>
        <h5>
            {{ session('message') }}
        </h5>
    </div>
    @endif

    <!-- Dados -->
    <div data-toggle="collapse" data-target="#listExpand3" aria-expanded="false" aria-controls="listExpand3">
        <h5>
            <i class="fas fa-user"></i>
            Meus dados
            <i class="fas fa-chevron-circle-down fa-lg"></i></h5>
    </div>

    <div class="collapse data" id="listExpand3">

        <div class="botaoAdd">
            <a href="{{ route('user.edit') }}">
                <button type="submit" class="btn botao-del-edit edit">
                    <i class="fas fa-pencil-alt"></i>
                </button>
            </a>
        </div>

        <table class="table table-hover table-striped" style="margin-top: 1em;">
            <tbody>

                <img src="{{ Storage::disk('s3')->url($user->avatar) }}" class="avatar">
                <tr>
                    <th scope="row">Nome</th>
                    <td>
                        @php
                             echo $user->name;
                        @endphp
                    </td>
                </tr>

                <tr>
                    <th scope="row">Email</th>
                    <td>
                        @php
                             echo $user->email;
                        @endphp
                    </td>
                </tr>

                <tr>
                    <th scope="row">Nascimento</th>
                    <td>
                        @php
                             echo Carbon\Carbon::parse($user->birthday)->format('d/m/Y');
                        @endphp
                    </td>
                </tr>

                <tr>
                    <th scope="row">Sexo</th>
                    <td>
                        @php
                             echo $user->gender;
                        @endphp
                    </td>
                </tr>

                <tr>
                    <th scope="row">Surdez</th>
                    <td>
                        @php
                             echo $user->deaf;
                        @endphp
                    </td>
                </tr>

                <tr>
                    <th scope="row">Instituição que frequenta</th>
                    <td>
                        @php
                             echo $user->institution;
                        @endphp
                    </td>
                </tr>

                <tr>
                    <th scope="row">Área de ensino atual</th>
                    <td>
                        @php
                             echo $user->grade;
                        @endphp
                    </td>
                </tr>

            </tbody>
        </table>

    </div>

    <!-- Aulas -->
    <div data-toggle="collapse" data-target="#listExpand" aria-expanded="false" aria-controls="listExpand">
        <h5>
            <i class="fas fa-video"></i>
            Minhas aulas
            <i class="fas fa-chevron-circle-down fa-lg" style="margin-top: 2em"></i></h5>
    </div>

    <div class="collapse" id="listExpand">

        <div class="botaoAdd">
            <a href="{{ route('aula.cadastra') }}">
                <i class="fas fa-plus-circle fa-3x" style="font-weight: bold; color: #00AEEF"></i>
            </a>
        </div>

        <table class="table table-hover table-striped" style="margin-top: 1em;">
            <thead>
                <tr>
                    <th scope="col">Data de publicação</th>
                    <th scope="col">Imagem (clique pra visualizar)</th>
                    <th scope="col">Título</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($aulas as $aula)

                        <tr>
                            <td>{{Carbon\Carbon::parse($aula->created_at)->format('d/m/Y - H:i:s')}}</td>
                            <td>
                                <a href="{{ route('aula.viewAula', $aula->id) }}">
                                    <img class="list-aula-img" src="{{ url("storage/{$aula->image}") }}" alt="">
                                </a>
                            </td>
                            <td><?php echo mb_strimwidth("{$aula->title}", 0, 40, "..."); ?></td>
                            
                            <td>
                                <a href="{{ route('aula.edit', $aula->id) }}">
                                    <button type="submit" class="btn botao-del-edit edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('aula.destroy', $aula->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn botao-del-edit delet">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                @endforeach
            </tbody>
        </table>

        {{ $aulas->links() }}

    </div>

    <!-- Histórico -->
    <div data-toggle="collapse" data-target="#listExpand2" aria-expanded="false" aria-controls="listExpand2">
        <h5>
            <i class="fas fa-history"></i>
            Meu Histórico
            <i class="fas fa-chevron-circle-down fa-lg" style="margin-top: 2em"></i>
        </h5>
    </div>

    <div class="collapse" id="listExpand2">

        <div class="botaoAdd">

            <form action="{{ route('aula.clearHistoric') }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn botao-del-edit delet">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>

        <table class="table table-hover table-striped" style="margin-top: 1em;">
            <thead>
                <tr>
                    <th scope="col">Data da visualização</th>
                    <th scope="col">Imagem (clique pra visualizar)</th>
                    <th scope="col">Título</th>
                    <th scope="col">Criado por</th>
                </tr>
            </thead>
            <tbody>
                @foreach($historicos as $historico)
                    
                        <tr>
                            <td>{{Carbon\Carbon::parse($historico->dateTime)->format('d/m/Y - H:i:s')}}</td>
                            <td>
                                <a href="{{ route('aula.viewAula', $historico->aula->id) }}">
                                    <img class="list-aula-img" src="{{ url("storage/{$historico->aula->image}") }}" alt="">
                                </a>
                            </td>
                            <td><?php echo mb_strimwidth("{$historico->aula->title}", 0, 40, "..."); ?></td>
                            <td>{{$historico->aula->user->name}}</td>
                            </td>
                        </tr>
                    
                @endforeach
            </tbody>
        </table>

        {{ $historicos->links() }}

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