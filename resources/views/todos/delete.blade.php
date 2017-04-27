@extends('layouts.panel')

@section('panel-head-middle')
  <button type="button" class="btn btn-default btn-title" disabled>
    <i class="fa fa-tasks"></i>
    Excluir
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
@endsection

@section('panel-body')
    @include('partials.messages')
    {{ Form::model($formModel, ['route' => [$actions['formAction']['destroy'], $formModel->id]]) }}
      @include('todos.partials.form')
      <div class="text-center">
        <div class="btn-group" >
          @include('partials.buttons.formButton-excluir')
        </div>
      </div>
    {{ Form::close() }}
    <br>
@endsection

@section('scripts')
   <!--<script src="/js/todos.js"></script>-->
@stop
