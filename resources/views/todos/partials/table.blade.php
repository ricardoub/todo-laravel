<div class="row">
  <table class="table table-hover">
    <thead>
      <tr class="active">
        <th scope="col" class="col-md-1">Ordem</th>
        <th scope="col" class="col-md-9">Nome da tarefa</th>
        <th scope="col" >% Completo</th>
        <th scope="col" class="col-md-1">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($listModels as $model)
        <tr>
          <td data-label="Ordem">
            {{$model->order}}
          </td>
          <td data-label="Nome Tarefa" class="text-left">
            {{$model->name}}
          </td>
          <td data-label="Completo">
            <div class="progress">
              <div  class="progress-bar progress-bar-success" role="progressbar"
                  aria-valuenow="{{$model->percentage}}" aria-valuemin="0"
                  aria-valuemax="100" style="width: {{$model->percentage}}%">
                {{$model->percentage}} %
                <span class="sr-only">{{$model->percentage}}% Complete (success)</span>
              </div>
            </div>
          </td>
          <td data-label="Ações">
            <span class="input-group-btn input-group">
              <a class="btn btn-default" href="{{ route('todos.show', $model->id) }}">
                <i class="fa fa-folder-open-o fa-fw"></i>
                <span class="hidden-xs hidden-sm">
                  Exibir
                </span>
              </a>
            </span>
          </td>
        </tr>
      @endforeach()
    </tbody>
  </table>
</div>
