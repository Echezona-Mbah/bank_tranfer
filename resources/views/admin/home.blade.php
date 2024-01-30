@include('admin.head')
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">


<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-GLhlTQ8iNl4fh6TpoHk7l9pOV2Rgfy4L" crossorigin="anonymous">


@include('admin.navbar')


@include('admin.header')
@include('sweetalert::alert')




        <div class="main-panel">
          <div class="content-wrapper pb-0">



            <div class="row">
              <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
                <div class="row">
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-warning">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Registered Members</p>
                            <h2 class="text-white"> {{ $userCount }}
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-danger">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Card Requests</p>
                            <h2 class="text-white"> {{ $atmCount }}
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                    <div class="card bg-primary">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Loans</p>
                            <h2 class="text-white">{{$loanCount}}
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0">
                    <div class="card bg-success">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Total Transactions</p>
                            <h2 class="text-white">{{$tranferCount}}</h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-7">
                        <h5>Business Survey</h5>
                        <p class="text-muted"> Show overview jan 2018 - Dec 2019 <a class="text-muted font-weight-medium pl-2" href="#"><u>See Details</u></a>
                        </p>
                      </div>
                      <div class="col-sm-5 text-md-right">
                        <button type="button" class="btn btn-icon-text mb-3 mb-sm-0 btn-inverse-primary font-weight-normal">
                          <i class="mdi mdi-email btn-icon-prepend"></i>Download Report </button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="card mb-3 mb-sm-0">
                          <div class="card-body py-3 px-4">
                            <p class="m-0 survey-head">Today Earnings</p>
                            <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                              <div>
                                <h3 class="m-0 survey-value">$5,300</h3>
                                <p class="text-success m-0">-310 avg. sales</p>
                              </div>
                              <div id="earningChart" class="flot-chart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card mb-3 mb-sm-0">
                          <div class="card-body py-3 px-4">
                            <p class="m-0 survey-head">Product Sold</p>
                            <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                              <div>
                                <h3 class="m-0 survey-value">$9,100</h3>
                                <p class="text-danger m-0">-310 avg. sales</p>
                              </div>
                              <div id="productChart" class="flot-chart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <div class="card-body py-3 px-4">
                            <p class="m-0 survey-head">Today Orders</p>
                            <div class="d-flex justify-content-between align-items-end flot-bar-wrapper">
                              <div>
                                <h3 class="m-0 survey-value">$4,354</h3>
                                <p class="text-success m-0">-310 avg. sales</p>
                              </div>
                              <div id="orderChart" class="flot-chart"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Registered Members</h4>
                        <p class="card-description">Add class <code>.table-striped</code></p>
                        <div style="overflow-x: auto;">
                          <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Account No</th>
                                        <th>Account <br> Type</th>
                                        <th>Account <br>Balance</th>
                                        <th>Checkings<br> Balance</th>
                                        <th>Account <br>Status</th>
                                        <th>Transaction <br>Status</th>
                                        <th>Suspended</th>
                                        <th>Status</th>
                                        <th>Delete</th>
                                        <th>Add Money</th>
                                        <th>Remove <br>Money</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->account_number}}</td>
                                        <td>{{$user->account_type}}</td>
                                        <td>{{$user->balance}}</td>
                                        <td>0.00</td>
                                        <td>{{$user->status}}</td>
                                        <td>{{$user->transaction_status}}</td>
                                        <td>
                                            <button class="btn btn-social-icon @if($user->transaction_status == 'active') btn-success @else btn-warning @endif" onclick="updateTransactionStatus({{ $user->id }})" style="padding: 8px; font-size: 18px;">
                                                @if($user->transaction_status == 'active')
                                                <i class="mdi mdi-check" style="color: white;"></i>
                                                @else
                                                <i class="mdi mdi-clock" style="color: white;"></i>
                                                @endif
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-social-icon @if($user->status == 'pending') btn-success @else btn-warning @endif" onclick="updateStatus({{ $user->id }})" style="padding: 8px; font-size: 18px;">
                                                @if($user->status == 'pending')
                                                <i class="mdi mdi-check" style="color: white;"></i>
                                                @else
                                                <i class="mdi mdi-clock" style="color: white;"></i>
                                                @endif
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-social-icon btn-youtube" onclick="confirmDelete({{ $user->id }})">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-social-icon btn-twitter">
                                                <a href="{{ route('add-money', ['user' => $user->id]) }}">
                                                    <i class="mdi mdi-cash-usd"></i>
                                                </a>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-social-icon btn-outline-google">
                                                <a href="{{ route('remove-money', ['user' => $user->id]) }}">
                                                    <i class="mdi mdi-cash-usd"></i>
                                                </a>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-social-icon btn-outline-facebook" style="background-color: rgb(0, 255, 128)">
                                                <a href="{{ route('edit', ['user' => $user->id]) }}">
                                                    <i class="mdi mdi-box-cutter" ></i>
                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            

            </div>


            






          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © swiftshieldcu.com 2020<br>
              
              </span>
            </div>
          </footer>
        </div>

        <script>
          function updateTransactionStatus(userId) {
              $.ajax({
                  type: 'POST',
                  url: '/update-transactionstatus/' + userId,
                  data: {_token: '{{ csrf_token() }}'},
                  success: function(response) {
                      if (response.status === 'error') {
                          Swal.fire('Error', 'User not found.', 'error');
                      } else {
                          Swal.fire('Success', 'User status set to ' + response.status + '.', 'success');
                          location.reload(); // Refresh the page after successful update
                      }
                  },
                  error: function() {
                      Swal.fire('Error', 'Something went wrong.', 'error');
                  }
              });
          }
      </script>

 
        <script>
          function updateStatus(userId) {
              $.ajax({
                  type: 'POST',
                  url: '/update-status/' + userId,
                  data: {_token: '{{ csrf_token() }}'},
                  success: function(response) {
                      if (response.status === 'error') {
                          Swal.fire('Error', 'User not found.', 'error');
                      } else {
                          Swal.fire('Success', 'User status set to ' + response.status + '.', 'success');
                          location.reload(); // Refresh the page after successful update
                      }
                  },
                  error: function() {
                      Swal.fire('Error', 'Something went wrong.', 'error');
                  }
              });
          }
      </script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

<!-- Include Axios script -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Script for handling delete confirmation -->
<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // User confirmed, send request to delete
                axios.post('/delete-user/' + userId)
                    .then(response => {
                        Swal.fire({
                            title: 'Deleted!',
                            text: response.data.message,
                            icon: 'success',
                        });
                        // Optionally, you can reload the page or update the UI accordingly
                        location.reload();
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Unable to delete user. ' + error.response.data.error,
                            icon: 'error',
                        });
                    });
            }
        });
    }
</script>


        @include('admin.footer')
      