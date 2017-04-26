<br>
<div class="row">
  <div class="form-group col-md-8 col-md-offset-2">
    {{ Form::Label('name', 'Nome da tarefa', ['class' => 'form-label col-md-12']) }}
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-tasks fa-fw"></i>
      </span>
      {{ Form::text('name', $formModel->name, ['class' => 'form-control', 'placeholder' => 'Nome da tarefa', 'disabled' => $formActions['edit']]) }}
    </div>
  </div>
</div>
<div class="row">
  <div class="form-group col-md-8 col-md-offset-2">
    <div class="row">
      <div class="form-group col-md-6 col-sm-6">
        {{ Form::label('name', 'Prioridade', ['class' => 'form-label col-md-12']) }}
        <div class="input-group">
          <span class="input-group-addon">
            <i class="fa fa-sort-numeric-asc fa-fw"></i>
          </span>
          {{ Form::text('priority', $formModel->priority, ['class' => 'form-control', 'placeholder' => 'Nome da combo', 'disabled' => $formActions['edit'] ]) }}
        </div>
      </div>
      <div class="form-group col-md-6 col-sm-6">
        {{ Form::label('option', 'Completo', ['class' => 'form-label col-md-12']) }}
        <div class="input-group">
          <span class="input-group-addon">
            <i class="fa fa-percent fa-fw"></i>
          </span>
          {{ Form::text('percentage', $formModel->percentage, ['class' => 'form-control', 'placeholder' => 'Nome da opção', 'disabled' => $formActions['edit']]) }}
        </div>
      </div>
    </div>
  </div>
</div>
