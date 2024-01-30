<body>
    
    <div class="container-scroller">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href="index-2.html"><img style="height: 150px" src="{{asset('asset/images/remove.png')}}" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index-2.html"><img src="{{asset('asset/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">

                <img src="{{ asset('asset/images/faces/tt.png') }}" alt="default-avatar" />

                <span class="login-status online"></span>
              </div>
              <div class="nav-profile-text d-flex flex-column pr-3">
                <span class="font-weight-medium mb-2"></span>
                <span class="font-weight-normal"></span>
              </div>
              <span class="badge badge-danger text-white ml-3 rounded"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin') }}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              <span class="menu-title">Account Setting</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('pin') }}">Create Transfer Pin</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('updateProfile') }}">Update Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('UpdatePassword') }}">Change Password</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('photo') }}">Upload Profile</a>
                </li>
              </ul>
            </div>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="{{ route('allTranfer') }}">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Transaction</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('allLoan') }}">
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              <span class="menu-title">Loan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('allCard') }}">
              <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Card Requests</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{('/allCurrency') }}">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Currency Rate</span>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('loan') }}">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Loan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('account-statement') }}">
              <i class="mdi mdi-camera-rear menu-icon"></i>
              <span class="menu-title">Account Statement</span>
            </a>
          </li>
          <li class="nav-item">
            <span class="nav-link" href="#">
              <span class="menu-title">Docs</span>
            </span>
          </li> --}}
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
            <a class="nav-link"  href="{{route('logout')}}"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
              <i class="mdi mdi-file-document-box menu-icon"></i>
              <span class="menu-title">Sign Out</span>
            </a>
          </form>
          </li>
        </ul>
      </nav>