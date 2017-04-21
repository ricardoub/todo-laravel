<ul class="nav navbar-nav">
  <li>
    <a tabindex="0" href="{{ url('/home') }}">
      <i class="fa fa-home fa-fw"></i>
      Inicio
    </a>
  </li>
  @if (!auth::guest())
    <li>
      <a tabindex="0" href="{{ url('/todos') }}">
        <i class="fa fa-tasks fa-fw"></i>
        Todo's
      </a>
    </li>
    <li class="dropdown disabled">
      <a tabindex="0" data-toggle="dropdown" data-submenu="">
        Administração<span class="caret"></span>
      </a>
      <ul class="dropdown-menu">
        <li class="dropdown-submenu disabled">
          <a tabindex="0">
            Cadastros
          </a>
          <ul class="dropdown-menu">
            <li class="dropdown-header">-</li>
            <li>
              <a tabindex="0">
                <i class="fa fa-truck fa-fw"></i>
                Coletas de materiais
              </a>
            </li>
            <li><a tabindex="0">Etiquetas</a></li>
            <li class="divider"></li>
            <li><a tabindex="0">Arquivos</a></li>
          </ul>
        </li>
        <li class="dropdown-submenu disabled">
          <a tabindex="0" class="">
            Trilha auditoria
          </a>
        </li>
      </ul>
    </li>
  @endif
</ul>