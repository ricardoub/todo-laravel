@extends('layouts.panel')

@section('panel-head-middle')
    <button type="button" class="btn btn-default btn-title" disabled>
        <i class="fa fa-tasks"></i>
        Incluir
        <span class="hidden-xs hidden-sm"> Tarefa </span>
    </button>
@endsection

@section('panel-head-left')
  @include('partials.buttons.button-href-listar')
@endsection

@section('panel-head-right')
@endsection

@section('panel-body')
    @include('partials.messages')
    {{ Form::model($formModel, ['route' => $actions['formAction']['store']]) }}
      @include('todos.partials.form')
      <div class="text-center">
        <div class="btn-group" >
          @include('partials.buttons.formButton-salvar')
        </div>
      </div>
    {{ Form::close() }}
    <br>
@endsection

@section('scripts')
   <!--<script src="/js/todos.js"></script>-->
@stop
