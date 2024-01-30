@include('user.head')
<script src="https://printjs.crabbly.com/print.min.js"></script>
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
<style>
            .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }


        textarea {
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #ced4da;
            width: 100%;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .validation-error {
color: red;
font-size: 0.875rem; /* Optional: Adjust the font size to match your design */
}

        form {
          
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #2980b9;
        }

        .no-print {
        display: none;
    }
</style>

@include('user.navbar')


@include('user.header')
@include('sweetalert::alert')





                    <!-- select currency -->
        <div class="page-header">
            <h4 class="page-title d-none d-md-block">Account Statement</h4>
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
        Total Account balance:
        <span id="displayTotalAccountBalance">
            <span class="displayAmount">{{ $user->balance }}</span>
            <span class="displayCode">EURO EUR</span>
        </span>
    </p>
</div>
             --}}

             <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Account Statement</h4>
                    <p class="card-description">
                    </p>
                    <div class="table-responsive">
                        @if($accountStatements->count() > 0)
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Reciever Account Number</th>
                            <th>Reciever Name</th>
                            <th>Reciever Bank</th>
                            <th>Amount</th>
                            <th>fund Tranfer</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($accountStatements as $statement)
                          <tr>
                            <td>{{$statement->reciever_account_number}}</td>
                            <td>{{$statement->reciever_name}}</td>
                            <td>{{$statement->reciever_bank}}</td>
                            <td>{{$statement->amount}}</td>
                            <td>{{$statement->fund_tranfer}}</td>
                          </tr>
                          @endforeach

                        </tbody>
                      </table>
                      @else
    <p>No account statement data available for the selected date range.</p>
@endif
                      <button type="button" class="btn btn-primary" onclick="printAccountStatement()"> Print Statament </button>
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


 
       
        <script>
      function printAccountStatement() {
        window.print();
    }
        </script>

        @include('user.footer')
      