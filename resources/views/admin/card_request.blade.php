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
                        <h4 class="card-title">Request Card History</h4>
                        </p>
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Email</th>
                                <th>Fullname</th>
                                <th>Account <br> Type</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Request<br> status</th>
                                <th>Card Type</th>
                                <th>Card Model</th>
                                <th>Action</th>
                       
                              </tr>
                            </thead>
                            <tbody>
                              @forelse  ($users as $user)
                              <tr>
                                <td>{{$user->user->email}}</td>
                                <td>{{$user->user->name}}</td>
                                <td>{{$user->user->account_type}}</td>
                                <td>{{$user->user->phone}}</td>
                                <td>{{$user->user->address}}</td>
                                <td>{{$user->status}}</td>
                                <td>{{$user->card_type}}</td>
                                <td>{{$user->card_model}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary confirm-btn" data-transaction-id="{{ $user->id }}">
                                        Confirm
                                    </button>
                                </td>
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

        <!-- Add this to your HTML, make sure it's added before your custom scripts -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<!-- Add this script after including SweetAlert and jQuery -->
<script>
    $(document).ready(function() {
        $('.confirm-btn').click(function() {
            var transactionId = $(this).data('transaction-id');

            // Show a confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to confirm this Card Request.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, confirm it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("card-status") }}', 
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': transactionId,
                        },
                        success: function(response) {
                            Swal.fire('Confirmed!', 'The Card is ready.', 'success');
                            location.reload(); 
                        },
                        error: function(error) {
                            // Handle errors, e.g., show an error message
                            Swal.fire('Error!', 'There was an error confirming the card.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>

      


        @include('admin.footer')
      