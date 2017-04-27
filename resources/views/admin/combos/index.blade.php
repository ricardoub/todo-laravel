@extends('layouts.panel')

@section('panel-head-middle')
    <button type="button" class="btn btn-default btn-title" disabled>
        <i class="fa fa-list"></i>
        Listar
        <span class="hidden-xs hidden-sm"> Caixa de seleção </span>
    </button>
@endsection

@section('panel-head-left')
    @include('partials.buttons.panelButton-home')
@endsection

@section('panel-head-right')
    @include('partials.buttons.panelButton-incluir')
@endsection

@section('panel-body')
    @include('partials.messages')
    @include('admin.combos.partials.table')
@endsection

@section('scripts')
   <!--<script src="/js/todos.js"></script>-->
@stop
