<ul class="nav navbar-nav navbar-right">
  <li>
    <a href="#"><i class="fa fa-question fa-fw"></i>
      Ajuda
    </a>
  </li>
  <!-- Authentication Links -->
  @if (Auth::guest())
    <li>
      <a href="{{ route('login') }}"><i class="fa fa-sign-in fa-fw"></i>
        Login
      </a>
    </li>
    <li>
      <a href="{{ route('register') }}"><i class="fa fa-id-card-o fa-fw"></i>
        Register
      </a>
    </li>
  @else
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        <i class="fa fa-user fa-fw"></i>
        {{ Auth::user()->name }} <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        <li>
          <a  href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="fa fa-sign-out fa-fw"></i>
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </li>
  @endif
</ul>
