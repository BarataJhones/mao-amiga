<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/common.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/userArea.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/dropzone.css')}}"> 
    <link rel="icon" href="{{asset('img/icone-site.png')}}" type="image/x-icon" />
    <title>Portal Mão Amiga - Tela de usuário</title>
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
                        <h1>Tela do usuário</h1>
                    </div>

                    <a class="video-popup" href="video/area-professor.mp4">
                        <div class="col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1 icone-video-mensagem"></div>
                    </a>

                    <p class="mensagem justify-content-center" style="padding: 1em;">
                        TEXTO GENÉRICO TEXTO GENÉRICO TEXTO GENÉRICO TEXTO GENÉRICO TEXTO GENÉRICO TEXTO GENÉRICO TEXTO GENÉRICO TEXTO GENÉRICO TEXTO GENÉRICO
                        TEXTO GENÉRICO TEXTO GENÉRICO TEXTO GENÉRICO TEXTO GENÉRICO 
                        
                    </p>
                </div>
            </div> 
        </section>

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

                <div>
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
                                        <button type="submit" class="btn botao-del-edit edit fas fa-pencil-alt" ></button>
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
                        @endforeach
                    </tbody>
                </table>

            </div>
            

    </section>
</body>

@include ('telas.common.footer')

</html>