
<nav class="navbar navbar-expand-md navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      Cobain Musical Shop
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/services">Services</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="StoreTypes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Store</a>
          <div class="dropdown-menu" aria-labelledby="StoreTypes">
            @foreach($storetypes as $storetype)
            <a class="dropdown-item" href="/store/{{ $storetype->id }}">{{ $storetype->name }}</a>
            @endforeach
          </div>
        </li>
        @if (Auth::check())
          @if (Auth::user()->permission == 2)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="Admin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
            <div class="dropdown-menu" aria-labelledby="Admin">
              <a class="dropdown-item" href="/product/">View Products</a>
              <a class="dropdown-item" href="/supplier/">View Suppliers</a>
              <a class="dropdown-item" href="/brand/">View Brands</a>
              <a class="dropdown-item" href="/userdetails/">View Customer Accounts</a>
              <a class="dropdown-item" href="/orders/">View Orders</a>
            </div>
          </li>
          @endif
        @endif
        @guest
        <li class="nav-item">
          <a class="nav-link" href="/contactus">Contact Us</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="/usercontactus">Contact Us</a>
        </li> 
        @endguest
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
          @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <?php 
                  $user_id = auth()->user()->id;
                  echo \App\Http\Controllers\UserDetailsController::usersname($user_id);?> <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/userdetails/{{Auth::user()->id}}">View Profile</a>
                <a class="dropdown-item" href="/cart/">View Cart</a>
                <a class="dropdown-item" href="/order/">Order History</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>