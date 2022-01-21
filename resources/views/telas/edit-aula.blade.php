@extends('telas.common.form')

@section('pageTitle') Editar aula @endsection
@section('boxTitle')<i class="fas fa-pencil-alt"></i> Editar a aula @endsection
@section('boxVideo') {{ Storage::disk('s3')->url('editar_aula.mp4') }} @endsection

@section('boxContent' )
    Nesta área você poderá editar o conteúdo da aula cadastrada. <br>
    Após a edição, você pode
    <span style="font-weight: bold; color: #00AEEF">confirmar <i class="fas fa-check"></i></span> ou
    <span style="font-weight: bold; color: #ff4e4e">cancelar <i class="fas fa-times"></i></span> as edições.
    as edições. Os campos com um <b>*</b> são obrigatórios. O seu nome de usuário e a data de publicação serão cadastrados automaticamente.
@endsection

@section('formDetails')action="{{ route('aula.update', $aula->id) }}" method="post" enctype="multipart/form-data"@endsection

@section('csrfMethod')
    @csrf
    @method('put')
@endsection

@section('valueTitle') value="{{ $aula->title }}" @endsection
@section('valueDiscipline') value="{{ $aula->discipline }}" @endsection
@section('valueContent') value="content" @endsection
@section('EditAula') {!! $aula->content !!} @endsection
@section('valueImageFont') value="{{ $aula->imageFont }}" @endsection
@section('valueReferences'){{ $aula->references }}@endsection
