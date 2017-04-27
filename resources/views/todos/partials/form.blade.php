<br>
<div class="row">
  <div class="form-group col-md-8 col-md-offset-2">

    <div class="row">
      <div class="form-group col-md-12 col-sm-12">
        {{ Form::Label('name', 'Nome da tarefa', ['class' => 'form-label col-md-12']) }}
        <div class="input-group">
          <span class="input-group-addon">
            <i class="fa fa-tasks fa-fw"></i>
          </span>
          {{ Form::text('name', $formModel->name, ['class' => 'form-control', 'placeholder' => 'Nome da tarefa', 'disabled' => $options['formOption']['edit'] ]) }}
        </div>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-6 col-sm-6">
        {{ Form::label('user_id', 'Responsável', ['class' => 'form-label col-md-12']) }}
        <div class="input-group">
          <span class="input-group-addon">
            <i class="fa fa-user fa-fw"></i>
          </span>
          @if (!$options['formOption']['edit'])
            {{ Form::select('user_id', $comboOptions['users'], $formModel->user_id, ['class' => 'form-control', 'disabled' => $options['formOption']['edit'] ]) }}
          @else
            {{ Form::text('user_id', $comboOptions['users'][$formModel->user_id], ['class' => 'form-control', 'placeholder' => 'Nome da opção', 'disabled' => $options['formOption']['edit'] ]) }}
          @endif
        </div>
      </div>
      <div class="form-group col-md-6 col-sm-6">
        {{ Form::label('name', 'Prioridade', ['class' => 'form-label col-md-12']) }}
        <div class="input-group">
          <span class="input-group-addon">
            <i class="fa fa-sort-numeric-asc fa-fw"></i>
          </span>
          {{ Form::text('priority', $formModel->priority, ['class' => 'form-control', 'placeholder' => 'Prioridade', 'disabled' => $options['formOption']['edit'] ]) }}
        </div>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md-6 col-sm-6">
        {{ Form::label('option', 'Completo', ['class' => 'form-label col-md-12']) }}
        <div class="input-group">
          <span class="input-group-addon">
            <i class="fa fa-percent fa-fw"></i>
          </span>
          @if (!$options['formOption']['edit'])
          {{ Form::select('percentage', $comboOptions['percent10'], $formModel->percentage, ['class' => 'form-control', 'disabled' => $options['formOption']['edit'] ]) }}
          @else
          {{ Form::text('percentage', $formModel->percentage, ['class' => 'form-control', 'placeholder' => 'Nome da opção', 'disabled' => $options['formOption']['edit'] ]) }}
          @endif
        </div>
      </div>
      <div class="form-group col-md-6 col-sm-6">
        {{ Form::label('option', 'Situação', ['class' => 'form-label col-md-12']) }}
        <div class="input-group">
          <span class="input-group-addon">
            <i class="fa fa-hashtag fa-fw"></i>
          </span>
          @if (!$options['formOption']['edit'])
            {{ Form::select('status', $comboOptions['status'], $formModel->status, ['class' => 'form-control', 'disabled' => $options['formOption']['edit'] ]) }}
          @else
            {{ Form::text('status', $comboOptions['status'][$formModel->status], ['class' => 'form-control', 'placeholder' => 'Nome da opção', 'disabled' => $options['formOption']['edit'] ]) }}
          @endif
        </div>
      </div>
    </div>

  </div>
</div>
