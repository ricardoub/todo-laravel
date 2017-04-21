<div class="row">
  <table class="table table-hover">
    <thead>
      <tr class="active">
        <th scope="col" class="col-md-1">Ordem</th>
        <th scope="col" class="col-md-9">Nome do Todo</th>
        <th scope="col" >% Completo</th>
        <th scope="col" >Responsável</th>
        <th scope="col" class="col-md-1">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($todos as $todo)
        <tr>
          <td data-label="Ordem">
            {{$todo->order}}
          </td>
          <td data-label="Nome Tarefa" class="text-left">
            {{$todo->name}}
          </td>
          <td data-label="Completo">
            <div class="progress">
              <div  class="progress-bar progress-bar-success" role="progressbar" 
                    aria-valuenow="{{$todo->percentage}}" aria-valuemin="0" 
                    aria-valuemax="100" style="width: {{$todo->percentage}}%">
                {{$todo->percentage}} %
                <span class="sr-only">{{$todo->percentage}}% Complete (success)</span>
              </div>
            </div>
          </td>
          <td data-label="Responsável">
            {{$todo->user_id}}
          </td>
          <td data-label="Ações">
            <span class="input-group-btn input-group">
              <a class="btn btn-default" href="{{ route('todos.show', $todo->id) }}">
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