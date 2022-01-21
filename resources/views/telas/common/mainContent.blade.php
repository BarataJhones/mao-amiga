<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">

    <link rel="stylesheet" href="@yield('css')">

    <link rel="stylesheet" href="{{asset('css/dropzone.css')}}">

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <link rel="icon" href="{{asset('img/icone-site.png')}}" type="image/x-icon" />
    
    <title>Portal Mão Amiga - @yield('pageTitle')</title>
</head>

@include ('telas.common.header')

<body>

    <section class="container container-margin">
        <div class="row">

            <!--Botão voltar -->
            <a onclick="goBack()">
                <i class="fas fa-arrow-circle-left fa-4x botao-voltar">
                </i>
            </a>

            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
            <!--Botão voltar -->

            <div class="quadro-mensagem col">

                <div class="row justify-content-center">
                    <div class="col-8 col-xl-5 col-lg-6 col-md-8 col-sm-10 col-xs-7">

                        <!-- Título da caixa principal das páginas -->
                        <h1>@yield('boxTitle')</h1> 

                    </div>

                    <a class="video-popup" href="@yield('boxVideo')">
                        <div class="col-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1 icone-video-mensagem"></div>
                    </a>

                    <p class="mensagem justify-content-center" style="padding: 1em;">

                        <!-- Conteúdo da caixa principal das páginas -->
                        @yield('boxContent')   

                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Conteúdo das páginas -->
    <section class="container container-margin">

        @yield('content')
        
    </section>
    <!--  -->

    <script src="{{asset('js/area-professor.js')}}"></script>
</body>

@include ('telas.common.footer')

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Quill - pegar formatação do textarea -->
<script>

    var Size = Quill.import('attributors/style/size');
    Size.whitelist = ['10px', '12px', '25px'];
    Quill.register(Size, true);

    var Align = Quill.import('attributors/style/align');
    Align.whitelist = ['', 'center', 'justify', 'right'];
    Quill.register(Align, true);

    quill = new Quill('#editor', {
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

    placeholder: 'Escreva o conteúdo da aula...',
    theme: 'snow'
    });

    var form = document.querySelector('#form')

    form.onsubmit = function() { // onsubmit do this first
        var name = document.querySelector('textarea[name=content]'); // set name input var
        name.value = quill.root.innerHTML; // populate name input with quill data
        return true; // submit form
    }

    /*$("#form").on("submit",function() {
    $("#content").val($("#editor").html());
    })*/
    
    
</script>
<!-- -->

</html>
