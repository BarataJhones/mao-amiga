@extends('telas.common.form')

@section('pageTitle') Cadastrar aula @endsection
@section('boxTitle') Cadastrar aula @endsection
@section('boxVideo')                @endsection

@section('boxContent' )
    Nesta área você poderá cadastrar uma nova aula. Preencha os campos de acordo com o que é pedido. O seu nome de usuário e a data de publicação serão cadastrados automaticamente,
    e a fonte da imagem principal, as referências e os conteúdos para baixa são opcionais.
    Para que o usuário surdo consiga captar o conteúdo, é de extrema importância que o video esteja fiel ao conteúdo escrito. Além disso, lembre-se de seguir essa ordem ao gravar
    o vídeo: <br>
    <span style="color: #00AEEF; font-weight: bold;">
        TÍTULO, ÁREA DE ENSINO, DISCIPLINA, SEU NOME DE USUÁRIO, DATA DA PUBLICAÇÃO DA AULA, CONTEÚDO DA AULA, DESCRIÇÃO DA IMAGEM PRINCIPAL DA AULA,
        FONTE DA IMAGEM PRINCIPAL DA AULA, IMAGENS E CONTEÚDO PARA BAIXAR, REFERÊNCIAS
    </span>. <br>
    Após a inserção das informações, você pode
    <span style="font-weight: bold; color: #00AEEF">confirmar <i class="fas fa-check"></i></span> ou
    <span style="font-weight: bold; color: #ff4e4e">cancelar <i class="fas fa-times"></i></span> o cadastro da aula. <br>
        Esperamos que o site possa seja útil para a integração e estudos dos estudantes surdos. <br>
        Boa aula!
@endsection

@section('formDetails')action="{{ route ('aulas.store') }}" method="post" enctype="multipart/form-data"@endsection

@section('csrfMethod')
    @csrf
@endsection

@section('valueTitle') value="{{ old('title') }}" @endsection
@section('valueDiscipline') value="{{ old('discipline') }}" @endsection
@section('valueContent'){{ old('content') }}@endsection
@section('valueUserCreator') value="{{ old('userCreator') }}" @endsection
@section('valueImageFont') value="{{ old('imageFont') }}" @endsection
@section('valueReferences'){{ old('references') }}@endsection