<br>
<div class="row">
  <div class="form-group col-md-6 col-md-offset-3">
    <div class="row">
      <div class="form-group col-md-12">
        {{ Form::label('name', 'Caixa de seleção', ['class' => 'form-label col-md-12']) }}
        <div class="input-group">
          <span class="input-group-addon">
            <i class="fa fa-list fa-fw"></i>
          </span>
          {{ Form::text('name', $formModel->name, ['class' => 'form-control', 'placeholder' => 'Nome da combo', 'disabled' => $options['formOption']['edit'] ]) }}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6 col-sm-6">
        {{ Form::label('option', 'Nome da opção', ['class' => 'form-label col-md-12']) }}
        {{ Form::text('option', $formModel->option, ['class' => 'form-control', 'placeholder' => 'Nome da opção', 'disabled' => $options['formOption']['edit'] ]) }}
      </div>
      <div class="form-group col-md-6 col-sm-6">
        {{ Form::label('value', 'Valor da opção', ['class' => 'form-label col-md-12']) }}
        {{ Form::text('value', $formModel->value, ['class' => 'form-control', 'placeholder' => 'Valor da opção', 'disabled' => $options['formOption']['edit'] ]) }}
      </div>
    </div>
  </div>
</div>
