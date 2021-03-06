@extends('layouts.panel')

@section('panel-head-middle')
    <button type="button" class="btn btn-default btn-title" disabled>
        <i class="fa fa-tasks"></i>
        Listar
        <span class="hidden-xs hidden-sm"> Tarefas </span>
    </button>
@endsection

@section('panel-head-left')
    @include('partials.buttons.panelButton-home')
@endsection

@section('panel-head-right')
  @permission('todo-create')
    @include('partials.buttons.panelButton-incluir')
  @endpermission
@endsection

@section('panel-body')
    @include('partials.messages')
    @include('todos.partials.table')
@endsection

@section('scripts')
   <!--<script src="/js/todos.js"></script>-->
@stop
