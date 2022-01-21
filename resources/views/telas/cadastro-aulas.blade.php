@extends('telas.common.form')

@section('pageTitle') Cadastrar aula @endsection
@section('boxTitle') <i class="fas fa-plus-circle"></i> Cadastrar aula @endsection
@section('boxVideo') {{ Storage::disk('s3')->url('cadastrar_aula.mp4') }} @endsection

@section('boxContent' )
    Nesta área você poderá cadastrar uma nova aula. Para que o usuário surdo consiga captar a mensagem da aula com clareza,
    é importante que o vídeo esteja fiel ao restante do conteúdo. Os campos de preenchimento da aula são:<br><br>

    <span style="color: #00AEEF; font-weight: bold;">
        1 - TÍTULO <br>
        2 - ÁREA DE ENSINO <br>
        3 - DISCIPLINA <br>
        4 - SEU NOME DE USUÁRIO <br>
        5 - DATA DA PUBLICAÇÃO DA AULA <br>
        6 - VÍDEO EM LIBRAS DA AULA <br>
        7 - CONTEÚDO DA AULA <br>
        8 - IMAGEM PRINCIPAL DA AULA <br>
        9 - FONTE DA IMAGEM PRINCIPAL DA AULA <br>
        10 - IMAGENS E CONTEÚDO PARA BAIXAR <br>
        11 - REFERÊNCIAS.
    </span> <br> <br>
    
    Os campos com um <b>*</b> são obrigatórios.
    O seu nome de usuário e a data de publicação serão cadastrados automaticamente. <br>
    Após a inserção das informações, você pode 
    <span style="font-weight: bold; color: #00AEEF">confirmar <i class="fas fa-check"></i></span> ou
    <span style="font-weight: bold; color: #ff4e4e">cancelar <i class="fas fa-times"></i></span> o cadastro da aula. <br>
    Esperamos que o site possa ser útil para a integração e estudos dos estudantes surdos. <br>
    Boa aula!

@endsection

@section('formDetails')action="{{ route ('aulas.store') }}" method="post" enctype="multipart/form-data"@endsection

@section('csrfMethod')
    @csrf
@endsection

@section('valueTitle') value="{{ old('title') }}" @endsection
@section('valueDiscipline') value="{{ old('discipline') }}" @endsection
@section('valueContent') value="content" @endsection
@section('valueImageFont') value="{{ old('imageFont') }}" @endsection
@section('valueReferences'){{ old('references') }}@endsection