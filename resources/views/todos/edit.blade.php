@extends('layouts.panel')

@section('panel-head-middle')
    <button type="button" class="btn btn-default btn-title" disabled>
        <i class="fa fa-tasks"></i>
        Editar
        <span class="hidden-xs hidden-sm"> Tarefa </span>
    </button>
@endsection

@section('panel-head-left')
    @include('partials.buttons.button-href-listar')
@endsection

@section('panel-head-right')
    @include('partials.buttons.button-form-salvar')
    @include('partials.buttons.button-modal-excluir')
@endsection

@section('panel-body')
    @include('partials.messages')
    @include('todos.partials.form')
@endsection

@section('scripts')
   <!--<script src="/js/todos.js"></script>-->
@stop
