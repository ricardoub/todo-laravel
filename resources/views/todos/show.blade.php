@extends('layouts.panel')

@section('panel-head-middle')
  <button type="button" class="btn btn-default btn-title" disabled>
    <i class="fa fa-tasks"></i>
    Exibir
    <span class="hidden-xs hidden-sm">
      Tarefa
      <small>({{ $formModel->id }})</small>
    </span>
  </button>
@endsection

@section('panel-head-left')
    @include('partials.buttons.panelButton-voltar-index')
@endsection

@section('panel-head-right')
    @include('partials.buttons.panelButton-editar')
@endsection

@section('panel-body')
    @include('partials.messages')
    @include('todos.partials.form')
@endsection

@section('scripts')
   <!--<script src="/js/todos.js"></script>-->
@stop
