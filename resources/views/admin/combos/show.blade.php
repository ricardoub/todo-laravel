@extends('layouts.panel')

@section('panel-head-middle')
    <button type="button" class="btn btn-default btn-title" disabled>
        <i class="fa fa-tasks"></i>
        Exibir
        <span class="hidden-xs hidden-sm"> Tarefa </span>
    </button>
@endsection

@section('panel-head-left')
    @include('partials.buttons.button-href-listar')
@endsection

@section('panel-head-right')
    @include('partials.buttons.button-editar-listar')
    @include('partials.buttons.button-excluir-listar')
@endsection

@section('panel-body')
    @include('partials.messages')
    @include('admin.combos.partials.form')
@endsection

@section('scripts')
   <!--<script src="/js/todos.js"></script>-->
@stop
