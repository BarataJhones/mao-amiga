@extends('telas.common.form')

@section('pageTitle') Editar aula @endsection
@section('boxTitle') Editar a aula {{$aula->title}} @endsection
@section('boxVideo')                @endsection

@section('boxContent' )
    Nesta área você poderá editar o conteúdo da aula cadastrada. <br>
    Após a edição, você pode
    <span style="font-weight: bold; color: #00AEEF">confirmar <i class="fas fa-check"></i></span> ou
    <span style="font-weight: bold; color: #ff4e4e">cancelar <i class="fas fa-times"></i></span> as edições.
@endsection

@section('formDetails')action="{{ route('aula.update', $aula->id) }}" method="post" enctype="multipart/form-data"@endsection

@section('csrfMethod')
    @csrf
    @method('put')
@endsection

@section('valueTitle') value="{{ $aula->title }}" @endsection
@section('valueDiscipline') value="{{ $aula->discipline }}" @endsection
@section('valueContent'){{ $aula->content }}@endsection
@section('valueImageFont') value="{{ $aula->imageFont }}" @endsection
@section('valueReferences'){{ $aula->references }}@endsection
