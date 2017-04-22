@extends('layouts.panel')

@section('panel-head-left')
    @include('partials.buttons.button-previous')
@endsection

@section('panel-head-middle')
    <button type="button" class="btn btn-default btn-title" disabled>
        <i class="fa fa-tasks"></i>
        Exibir
        <span class="hidden-xs hidden-sm"> Tarefa </span>
    </button>
@endsection

@section('panel-head-right')
    @include('todos.partials.button-editar')
    @include('partials.buttons.button-excluir')
@endsection

@section('panel-body')
    @include('partials.messages')
    @include('todos.partials.form')
@endsection

@section('scripts')
   <!--<script src="/js/todos.js"></script>-->
@stop
