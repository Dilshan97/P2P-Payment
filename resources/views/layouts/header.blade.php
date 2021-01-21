<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <img src="{{asset('img/logo1.png')}}" alt="Lara PAY" class="brand-image"
             style="margin-top: 2px;">
        <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>
          </li>

          <li class="nav-item">
            <a href="{{route('payment-account')}}" class="nav-link {{ Request::is('transactions') ? 'active' : '' }}">Transactions</a>
          </li>

          

        </ul>

        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item">
            <a href="#" class="nav-link">Welcome {{ Auth::user()->name}} !</a>
          </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          </li>
        </ul>

      </div>

    </div>
  </nav>