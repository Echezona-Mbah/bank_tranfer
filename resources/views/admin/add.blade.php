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



                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <form action="{{ route('add-money', ['user' => $user->id]) }}" method="post">
                            @csrf
                        <h4 class="card-title">Credit Account</h4>
                        <div class="form-group">
                          <label>Amount (in dollars)</label>
                          <input type="amount" class="form-control form-control-lg" name="amount" placeholder="amount" aria-label="amount" />
                        </div>
                        <button type="submit" class="btn btn-primary btn-rounded btn-fw"> Submit </button>
                    </form>
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
      