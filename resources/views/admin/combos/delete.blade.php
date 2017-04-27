@extends('layouts.panel')

@section('panel-head-middle')
    <button type="button" class="btn btn-default btn-title" disabled>
        <i class="fa fa-tasks"></i>
        Excluir
        <span class="hidden-xs hidden-sm">
          Combo
          <small>({{ $formModel->id }})</small>
        </span>
    </button>
@endsection

@section('panel-head-left')
@endsection

@section('panel-head-right')
@endsection

@section('panel-body')
    @include('partials.messages')
    {{ Form::model($formModel, ['route' => [$actions['formAction']['destroy'], $formModel->id]]) }}
      @include('admin.combos.partials.form')
      <div class="text-center">
        <div class="btn-group" >
          @include('partials.buttons.formButton-cancelar-index')
          @include('partials.buttons.formButton-excluir')
        </div>
      </div>
    {{ Form::close() }}
    <br>
@endsection

@section('scripts')
   <!--<script src="/js/todos.js"></script>-->
@stop
