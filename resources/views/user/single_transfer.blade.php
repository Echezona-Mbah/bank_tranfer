@include('user.head')
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>



@include('user.navbar')


@include('user.header')
@include('sweetalert::alert')
<style>
        .table-scroll-wrapper {
        overflow-x: auto;
    }

    .validation-error {
    color: red;
    font-size: 0.875rem; /* Optional: Adjust the font size to match your design */
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>



                    <!-- select currency -->
        <div class="page-header">
            <h4 class="page-title d-none d-md-block">Transactions</h4>
            <div class="btn-group-page-header ml-auto">
                <select name="currency" id="currencySelector" class="form-control">
                    <option disabled selected>Choose Currency</option>
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->app }}">{{ $currency->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Example displaying amounts and currency code -->
        {{-- <div>
            <p class="amount" data-amount="{{ $user->balance }}">Amount: <span id="displayAmount">{{ $user->balance }}</span></p>

            <p class="amount" data-amount="100">Amount: <span id="displayAmount">100</span></p>
            <p class="-code">Currency Code: <span id="displayCode">EURO EUR</span></p>
            <!-- Add more elements with class 'amount' and 'currency-code' if needed -->
        </div> --}}



{{-- <div>
    <!-- ... Other elements ... -->

    <p class="amount" data-amount="{{ $user->balance }}">
        Transactions:
        <span id="displayTotalAccountBalance">
            <span class="displayAmount">{{ $user->balance }}</span>
            <span class="displayCode">EURO EUR</span>
        </span>
    </p>
</div> --}}
{{-- @php
    print_r($transfers);die();
@endphp --}}

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Transactions</h4>
        <p class="card-description"> 
        </p>
        <div class="table-scroll-wrapper">
            <table id="yourDataTableId" class="table table-striped">
            <thead>
              <tr>
                <th>Date</th>
                <th>Transaction ID</th>
                <th>Transaction <br> Type</th>
                <th>Fullname</th>
                <th>Account <br> Number</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Service <br> Charge</th>
                <th>Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($transfers as $transfer)
              <tr>
                <td>{{ $transfer->created_at->format('M d, Y') }}</td>
                <td>{{$transfer->transaction_id}}</td>
                <td>{{$transfer->fund_tranfer}}</td>
                <td>{{$transfer->reciever_name}}</td>
                <td>{{$transfer->reciever_account_number}}</td>
                <td>{{$transfer->amount}}</td>
                <td>{{$transfer->status}}</td>
                {{-- <td>
                    @if($transfer->pin_confirmed == 0)
                        <h6 style="color: red;">Transfer Pin <br> Required</h6>
                    @elseif($transfer->status == 'approved')
                        <h6 style="color: rgb(136, 186, 240);">Approved</h6>
                    @elseif($transfer->status == 'Awaiting OTP')
                        <h6 style="color: rgb(240, 226, 136);">Awaiting OTP</h6>
                    @else
                        <span>Unknown Status</span>
                    @endif
                </td> --}}
                <td>{{$transfer->service_charge}}</td>
                @if($user->id == $transfer->tra_id)
                <td style="color: rgb(31, 218, 109)">credit</td>
            @else
                <td style="color: rgb(30, 28, 33)">{{$transfer->type}}</td>
            @endif
                {{-- <td>
                    @if($transfer->pin_confirmed == 0)
                        <button type="button" style="background-color: red" class="btn btn-success btn-rounded btn-fw">
                            <a style="color: white" href="{{ route('insertpin', ['transaction_id' => $transfer->transaction_id]) }}">
                                Enter Transfer Pin
                            </a>
                        </button>
                    @elseif($transfer->status == 'Awaiting OTP')
                        <button type="button" class="btn btn-warning btn-rounded btn-fw">
                            <a style="color: white" href="{{ route('otp', ['transaction_id' => $transfer->transaction_id]) }}">
                                Enter OTP
                            </a>
                        </button>
                    @else
                        <button type="button" class="btn btn-info btn-rounded btn-fw" disabled>Approved</button>
                    @endif
                </td> --}}
                
                <td>
                    <button type="button" class="btn btn-danger btn-rounded btn-fw">
                        <a style="color: white" href="{{ route('singleTransferDetail', ['transaction_id' => $transfer->transaction_id]) }}">
                            View Details
                        </a>
                    </button>
                </td>
              </tr>
              @empty
            </tbody>
            <tr>
                <td colspan="3">No transfers found</td>
            </tr>
        @endforelse
          </table>
          {{ $transfers->links() }}
        </div>
      </div>
    </div>
</div>
  
            





          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©swiftshieldcu.com 2020<br>
              
              </span>
            </div>
          </footer>


          <script>
new DataTable('#yourDataTableId');
        </script>


        @include('user.footer')
      