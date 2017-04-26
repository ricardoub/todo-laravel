<div class="row">
  <table class="table table-hover">
    <thead>
      <tr class="active">
        <th scope="col" class="col-md-8">Nome da tarefa</th>
        <th scope="col" class="col-md-1">Prioridade</th>
        <th scope="col" class="col-md-1">Situação</th>
        <th scope="col" class="col-md-1">Completo</th>
        <th scope="col" class="col-md-1">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($listModels as $model)
        <tr>
          <td data-label="Nome Tarefa" class="text-left">
            {{$model->name}}
          </td>
          <td data-label="Prioridade" class="text-center">
            {{$model->priority}}
          </td>
          <td data-label="Situação" class="text-center">
            {{$comboOptions['status'][$model->status]}}
          </td>
          <td data-label="Completo">
            <div class="progress">
              <div  class="progress-bar progress-bar-success progress-bar-todos" role="progressbar"
                  aria-valuenow="{{$model->percentage}}" aria-valuemin="0"
                  aria-valuemax="100" style="width: {{$model->percentage}}%">
                {{$model->percentage}} %
                <span class="sr-only">{{$model->percentage}}% Complete (success)</span>
              </div>
            </div>
          </td>
          <td data-label="Ações">
            <span class="input-group-btn input-group">
              @include('partials.buttons.button-exibir-listar')
              @include('partials.buttons.button-excluir-listar')
            </span>
          </td>
        </tr>
      @endforeach()
    </tbody>
  </table>
</div>
