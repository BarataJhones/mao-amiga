<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/cadastro-aulas.css">
    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="icon" href="img/icone-site.png" type="image/x-icon" />
    <title>Portal Mão Amiga - Cadastro de aulas</title>
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
                        <h1>Cadastro de aulas</h1>
                    </div>

                    <a class="video-popup" href="video/area-professor.mp4">
                        <div class="col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1 icone-video-mensagem"></div>
                    </a>

                    <p class="mensagem justify-content-center" style="padding: 1em;">
                        Caro usuário(a), aqui você irá cadastrar a sua aula para os outros usuários. É muito importante que o conteúdo escrito esteja pronto e o conteúdo em vídeo
                        em LIBRAS esteja gravado, de preferência por você ou por um intérprete. Você também poderá subir conteúdos para que os outros usuários possam
                        baixar, como apostilas e atividades. <br>
                        É de suma importância que o conteúdo do vídeo esteja de acordo com o texto elaborado, bem como as possíveis imagens necessárias para a explicação.
                        Os surdos utilizam muito do fator visual para ler e associar conteúdos. <br>
                        O conteúdo escrito será postado neste padrão:
                        <span style="color: #00AEEF; font-weight: bold;">(AJEITAR ESSA PARTE DEPOIS) TÍTULO, USUÁRIO QUE PUBLICOU A REFERENTE AULA, DATA DA PUBLICAÇÃO, CONTEÚDO DA AULA, IMAGEM PRINCIPAL DA AULA,
                            FONTE DA IMAGEM PRINCIPAL DA AULA, IMAGENS E CONTEÚDO PARA BAIXAR, REFERÊNCIAS</span>. É crucial que o vídeo em LIBRAS siga essa ordem. <br>
                        Esperamos que o site possa seja útil para a integração e estudos dos estudantes surdos. Boa aula!
                    </p>
                </div>
            </div>


        </div>

    </section>

    <section class="container container-margin aula-cadastro">

        <!-- Validações do fomulário -->
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif
        <!-- -->

        <form action="{{ route ('aulas.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="comment">Título da aula:</label>
                <input type="text" name="title" class="form-control" rows="1" id="title" value="{{ old('title') }}">
            </div>

            <label for="comment">Área de Ensino:</label> <br>
            <select name="grade" class="form-select" aria-label="Default select example" id="grade">
                <option value="Infantil">Infantil</option>
                <option value="Fundamental">Fundamental</option>
                <option value="Médio">Médio</option>
                <option value="Superior">Superior</option>
                <option selected value="Livre">Livre</option>
            </select>

            <div class="form-group">
                <label for="comment">Disciplina:</label>
                <input type="text" name="discipline" class="form-control" rows="1" id="discipline" value="{{ old('discipline') }}">
            </div>

            <div class="form-group">
                <label for="comment">Conteúdo da aula:</label>
                <textarea name="content" class="form-control" rows="15" id="content">{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label for="comment">Usuário (TEMPORÁRIO PARA TESTE):</label>
                <input type="text" name="userCreator" class="form-control" rows="1" id="userCreator" value="{{ old('userCreator') }}">
            </div>

            <label>Imagem principal da aula:</label>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                Procurar… <input type="file" name="image" id="image"> <!--id="imgInp"-->
                            </span>
                        </span>
                        <input type="text" class="form-control" readonly>
                    </div> <br>
                    <img id='img-upload' />
                </div>
            </div>

            <div class="form-group">
                <label for="comment">Fonte da imagem principal da aula:</label>
                <input type="text" name="imageFont" class="form-control" rows="1" id="imageFont" value="{{ old('imageFont') }}">
            </div>

            <div class="form-group">
                <label for="comment">Referências:</label>
                <textarea type="text" name="references" class="form-control" rows="5" id="references">{{ old('references') }}</textarea>
            </div>

            <label>Subir vídeo:</label>
            <div id="video-demo-container">
                <button class="btn" type="button" id="upload-button">
                    <i class="fas fa-upload fa-3x"></i>
                </button>
                <input type="file" name="aulaVideo" id="aulaVideo" style="display:none">
                <video id="main-video" controls>
                    <source type="video/mp4">
                </video>
                <canvas id="video-canvas"></canvas>
            </div> <br>

            <!--<label>Conteúdo para baixar:</label>
            <form action="/file-upload" class="dropzone">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
                <br>-->

            <div class="text-center">
                <button class="btn botao-del-edit save fas fa-check" type="submit"></button> 
            </div> <br>

        </form>

        <div class="text-center">
            <button type="submit" class="btn botao-del-edit cancel fas fa-times" onclick="goBack()"></button>
        </div>

    </section>

    <script src="js/area-professor.js"></script>
</body>

@include ('telas.common.footer')

<script src="js/dropzone.js"></script>

</html>