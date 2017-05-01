<div class="row">
  <table class="table table-stripped table-responsive table-hover table-inverse">
    <thead>
      <tr class="active">
        <th scope="col" class="col-md-1">ID</th>
        <th scope="col" class="col-md-4 text-left">Nome da opção</th>
        <th scope="col" class="col-md-3 text-left">Valor da opção</th>
        <th scope="col" class="col-md-2 text-left">Caixa de seleção</th>
        <th scope="col" class="col-md-1">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($listModels as $model)
        <tr>
          <td data-label="ID">
            {{$model->id}}
          </td>
          <td data-label="Opção" class="text-left">
            {{$model->option}}
          </td>
          <td data-label="Valor" class="text-left">
            {{$model->value}}
          </td>
          <td data-label="Nome combo" class="text-left">
            {{$model->name}}
          </td>
          <td data-label="Ações">
            <span class="input-group-btn input-group">
              @permission('combo-show')
                @include('partials.buttons.tableButton-exibir')
              @endpermission
              @permission('combo-delete')
                @include('partials.buttons.tableButton-excluir')
              @endpermission
            </span>
          </td>
        </tr>
      @endforeach()
    </tbody>
  </table>
</div>
<div class="row text-center">
  {{ $listModels->render() }}
</div>
