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

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Loan History</h4>
                        </p>
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Email</th>
                                <th>Fullname</th>
                                <th>Amount</th>
                                <th>Loan Type</th>
                                <th>Description</th>
                                <th>Application Date</th>
                       
                              </tr>
                            </thead>
                            <tbody>
                              @forelse  ($users as $user)
                              <tr>
                                <td>{{$user->user->email}}</td>
                                <td>{{$user->user->name}}</td>
                                <td>{{$user->amount}}</td>
                                <td>{{$user->loan_type}}</td>
                                <td>{{$user->message}}</td>
                                <td>{{ $user->created_at->format('M d, Y ') }}</td>
                              </tr>
                              @empty
                              <tr>
                                  <td colspan="8">No Loan available.</td>
                              </tr>
                              @endforelse
                            
                     
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


 
      


        @include('admin.footer')
      