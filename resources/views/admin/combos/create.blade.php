@extends('layouts.panel')

@section('panel-head-middle')
    <button type="button" class="btn btn-default btn-title" disabled>
        <i class="fa fa-tasks"></i>
        Incluir
        <span class="hidden-xs hidden-sm"> Tarefa </span>
    </button>
@endsection

@section('panel-body')
    @include('partials.messages')
    {{ Form::open(['route' => [$formActions['store']]]) }}
      @include('admin.combos.partials.form')
      <div class="text-center">
        <div class="btn-group" >
          @include('partials.buttons.button-href-cancelar')
          @include('partials.buttons.button-salvar')
        </div>
      </div>
    {{ Form::close() }}
    <br>
@endsection

@section('scripts')
   <!--<script src="/js/todos.js"></script>-->
@stop
