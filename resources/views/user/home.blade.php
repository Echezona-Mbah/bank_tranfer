@include('user.head')
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
@include('user.navbar')

@include('user.header')
@include('sweetalert::alert')











        {{-- <div class="main-panel">
          <div class="content-wrapper pb-0">
            @if(auth()->user()->status=='pending')
            <div id="updateAccountNotification" class="alert alert-warning" style="display:none;">
              Please update your account information. <a href="">Update Now</a>
          </div>
@endif --}}



            





            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Hi, welcome back! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">.</span>
              </h3>
              <div class="d-flex">
                <a href="{{route('singleTransfer')}}" class="btn btn-sm bg-white btn-icon-text border ml-3">
                  <i class="mdi mdi-printer btn-icon-prepend"></i> Transaction
              </a>

              <a href="{{route('loan')}}" class="btn btn-sm ml-3 btn-success">
                <i class="mdi mdi-printer btn-icon-prepend"></i> Loan
            </a>
              </div>
            </div>
            <div class="page-header">
              <h4 class="page-title d-none d-md-block">Dashboard</h4>
              <div class="btn-group-page-header ml-auto">
                  <select name="currency" id="currencySelector" class="form-control">
                      <option disabled selected>Choose Currency</option>
                      @foreach($currencies as $currency)
                          <option value="{{ $currency->app }}">{{ $currency->name }}</option>
                      @endforeach
                  </select>
              </div>
          </div>
  
            <div class="row">
              <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
                <div class="row">

                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                    <div class="card bg-primary">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Account Balance</p>
                            <h2 style="color: white" class="amount" data-amount="{{ $user->balance }}"> <span id="displayTotalAccountBalance">
                              <span class="displayCode">EURO EUR</span>
                              <span class="displayAmount">{{ $user->balance }}</span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                        </div>
                        {{-- <h6 class="text-white">67.98% Since last month</h6> --}}
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h6 class="card-title">Quick Funds Tranfer </h6>
                    <p class="card-description">Tranfer funds to other accounts more faster. Click the link below to continue
                    </p>
                    <button type="button" class="btn btn-primary"> <a style="color: white" href="{{route('tranfer')}}">Transfer funds</a></button>
                  </div>
                </div>
              </div>
            </div>

            


            <div class="row">
              <div class="col-xl-8 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body px-0 overflow-auto">
                    <h4 class="card-title pl-4">Purchase History</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="bg-light">
                          <tr>
                            <th style="font-display: 30px">{{($user->account_type) }} Information</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Full Name:</td>
                            <td>{{($user->name) }}</td>
                          </tr>
                          <tr>
                              <td>Account Number:</td>
                              <td>{{($user->account_number) }}</td>
                          </tr>
                          <tr>
                              <td>Account Type:</td>
                              <td>{{($user->account_type) }}</td>
                          </tr>
                          <tr>
                              <td>Mortgage Balance:</td>
                              <td class="amount" data-amount="{{ $user->amount }}"><span id="displayTotalAccountBalance">
                                  <span class="displayCode">EURO EUR</span>
                                  <span class="displayAmount">{{ $user->amount }}</span>
                                  
                              </span></td>
                          </tr>
                          <tr>
                              <td>Card Balance:</td>
                              <td class="amount" data-amount="{{ $user->amount }}"><span id="displayTotalAccountBalance">
                                  <span class="displayCode">EURO EUR</span>
                                  <span class="displayAmount">{{ $user->amount }}</span>
                                  
                              </span></td>
                          </tr>
                          <tr>
                              <td>Account balance:</td>
                              <td class="amount" data-amount="{{ $user->balance }}"><span id="displayTotalAccountBalance">
                                  <span class="displayCode">EURO EUR</span>
                                  <span class="displayAmount">{{ $user->balance }}</span>
                                  
                              </span></td>
                          </tr>
                          <tr>
                              <td>Total Account balance:</td>
                              <td class="amount" data-amount="{{ $user->balance }}"><span id="displayTotalAccountBalance">
                                  <span class="displayCode">EURO EUR</span>
                                  <span class="displayAmount">{{ $user->balance }}</span>
                                  
                              </span></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
              </div>

       </div>


            {{-- <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <p class="card-description"> Add class <code>.table-striped</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>User</th>
                            <th>First name</th>
                            <th>Progress</th>
                            <th>Amount</th>
                            <th>Deadline</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                            </td>
                            <td>Herman Beck</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$ 77.99</td>
                            <td>May 15, 2015</td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
                            </td>
                            <td>Messsy Adam</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$245.30</td>
                            <td>July 1, 2015</td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />
                            </td>
                            <td>John Richards</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$138.00</td>
                            <td>Apr 12, 2015</td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-4.png" alt="image" />
                            </td>
                            <td>Peter Meggik</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$ 77.99</td>
                            <td>May 15, 2015</td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                            </td>
                            <td>Edward</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$ 160.25</td>
                            <td>May 03, 2015</td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
                            </td>
                            <td>John Doe</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$ 123.21</td>
                            <td>April 05, 2015</td>
                          </tr>
                          <tr>
                            <td class="py-1">
                              <img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />
                            </td>
                            <td>Henry Tom</td>
                            <td>
                              <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </td>
                            <td>$ 150.00</td>
                            <td>June 16, 2015</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

          </div> --}}
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©swiftshieldcu.com2020<br>
               
              
              </span>
            </div>
          </footer>
        </div>
        @include('user.footer')
  

      