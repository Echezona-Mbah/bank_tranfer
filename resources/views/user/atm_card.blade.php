@include('user.head')
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
</style>

@include('user.navbar')


@include('user.header')
@include('sweetalert::alert')




                    <!-- select currency -->
        <div class="page-header">
            <h4 class="page-title d-none d-md-block">Request Credit Card</h4>
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

<div class="container">
<div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Request Credit Card</h4>
        <form class="form-sample" method="POST" action="{{ route('atm') }}">
            @csrf
        
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Card Type</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="card_type">
                                <option value="">.....</option>
                                <option value="Debit Card">Debit Card</option>
                                <option value="Credit Card">Credit Card</option>
                            </select>
                        </div>
                        @error('card_type')
                            <div class="validation-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Card Model </label>
                        <div class="col-sm-9">
                            <select class="form-control" name="card_model">
                                <option value="">.....</option>
                                <option value="VISA Card">VISA Card</option>
                                <option value="Master Card">Master Card</option>
                            </select>
                        </div>
                        @error('card_model')
                            <div class="validation-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary mr-2">Proceed</button>
        </form>
        
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


 
       


        @include('user.footer')
      