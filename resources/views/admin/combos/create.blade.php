@extends('layouts.panel')

@section('panel-head-middle')
    <button type="button" class="btn btn-default btn-title" disabled>
        <i class="fa fa-tasks"></i>
        Incluir
        <span class="hidden-xs hidden-sm"> Tarefa </span>
    </button>
@endsection

@section('panel-head-left')
@endsection

@section('panel-head-right')
@endsection

@section('panel-body')
    @include('partials.messages')
    {{ Form::open(['route' => [$actions['formAction']['store']]]) }}
      @include('admin.combos.partials.form')
      <div class="text-center">
        <div class="btn-group" >
          @include('partials.buttons.formButton-cancelar-index')
          @include('partials.buttons.formButton-salvar')
        </div>
      </div>
    {{ Form::close() }}
    <br>
@endsection

@section('scripts')
   <!--<script src="/js/todos.js"></script>-->
@stop
