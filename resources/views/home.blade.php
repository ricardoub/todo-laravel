@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.panel')

@section('panel-head-middle')
  Dashboard
@endsection

@section('panel-body')
    You are logged in!
@endsection

@section('scripts')
   <!--<script src="/js/todos.js"></script>-->
@stop
