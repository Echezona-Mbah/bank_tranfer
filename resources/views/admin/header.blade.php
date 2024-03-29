
<div class="container-fluid page-body-wrapper">
    <div id="theme-settings" class="settings-panel">
      <i class="settings-close mdi mdi-close"></i>
      <p class="settings-heading">SIDEBAR SKINS</p>
      <div class="sidebar-bg-options selected" id="sidebar-default-theme">
        <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
      </div>
      <div class="sidebar-bg-options" id="sidebar-dark-theme">
        <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
      </div>
      <p class="settings-heading mt-2">HEADER SKINS</p>
      <div class="color-tiles mx-0 px-4">
        <div class="tiles light"></div>
        <div class="tiles dark"></div>
      </div>
    </div>
    <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index-2.html"><img src="asset/images/logo-mini.svg" alt="logo" /></a>
        <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
          <i class="mdi mdi-menu"></i>
        </button>

        <ul class="navbar-nav navbar-nav-right ml-lg-auto">
          <li class="nav-item dropdown d-none d-xl-flex border-0">
    <!-- select currency -->
    {{-- <div class="page-header">
      <div class="btn-group-page-header ml-auto">
          <select name="currency" id="currencySelector" class="form-control">
              <option disabled selected>Choose Currency</option>
              @foreach($currencies as $currency)
                  <option value="{{ $currency->name }}">{{ $currency->name }}</option>
              @endforeach
          </select>
      </div>
  </div> --}}
          </li>
          <li class="nav-item nav-profile dropdown border-0">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
              <img class="nav-profile-img mr-2" alt="" src="{{ asset('asset/images/faces/tt.png') }}" />
              <span class="profile-name"></span>
            </a>
            <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{route('updateProfile')}}">
                <i class="mdi mdi-cached mr-2 text-success"></i>Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf

              <a class="dropdown-item" href="{{route('logout')}}"
              onclick="event.preventDefault();
                          this.closest('form').submit();">
                <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
              </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>




    