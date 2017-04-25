<br>
<div class="row">
  <div class="form-group col-md-12">
    {{ Form::Label('name', 'Nome da tarefa', ['class' => 'form-label col-md-12']) }}
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-tasks fa-fw"></i>
      </span>
      {{ Form::text('name', $formModel->name, ['class' => 'form-control', 'placeholder' => 'Nome da tarefa', 'disabled' => $formActions['edit']]) }}
    </div>
  </div>
</div>
