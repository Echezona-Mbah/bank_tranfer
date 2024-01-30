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


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Your HTML form -->





                    <!-- select currency -->
        {{-- <div class="page-header">
            <h4 class="page-title d-none d-md-block">Tranfer Fund</h4>
            <div class="btn-group-page-header ml-auto">
                <select name="currency" id="currencySelector" class="form-control">
                    <option disabled selected>Choose Currency</option>
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->app }}">{{ $currency->name }}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}

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
        <h4 class="card-title">Tranfer Fund</h4>
        <form class="form-sample" method="POST" action="{{ route('tranfer') }}">
            @csrf
          <div class="row">
            



            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Sender's Account Number</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="sender_account_number" value="{{($user->account_number) }}"readonly />
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Reciever's Account Number </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="reciever_account_number" value="" />
                </div>
                @error('reciever_account_number')
                <div class="validation-error">{{ $message }}</div>
            @enderror
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Reciever's Name </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="reciever_name" value="yy"  />
                  </div>
                  @error('reciever_name')
                  <div class="validation-error">{{ $message }}</div>
              @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Receiving Bank </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-co`ntrol" name="reciever_bank" value="" />
                  </div>
                  @error('reciever_bank')
                  <div class="validation-error">{{ $message }}</div>
              @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Swift/ ABA Routing Number</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="swift" value="" />
                  </div>
                </div>
              </div>
            
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">IBAN </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="iban" value="" />
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">BIC</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="bic" value="" />
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Amount</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="amount" id="amountInput" value="" />
                    </div>
                    @error('amount')
                    <div class="validation-error">{{ $message }}</div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Select Currency </label>
                    <div class="col-sm-9">
                        <select name="currency" id="currencySelector" class="form-control">
                            <option disabled selected>Choose Currency</option>
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->app }}">{{ $currency->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
              </div>
            

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Funds Transfer Option</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="fund_tranfer" value="">
                      <option>.....</option>
                      <option>Internation Transfer</option>
                      <option>Domestic Transfer</option>
                      <option>Local Transfer</option>
                      <option>0</option>
                    </select>
                  </div>
                  @error('fund_tranfer')
                  <div class="validation-error">{{ $message }}</div>
              @enderror
                </div>
              </div>

              

              <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" placeholder="Write your message here..."></textarea>
                @error('message')
                <div class="validation-error">{{ $message }}</div>
            @enderror
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
 
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<!-- JavaScript to update amount based on selected currency -->
<script>
    $(document).ready(function() {
        console.log('jQuery version:', $.fn.jquery); // Log jQuery version
        $('#currencySelector').change(function() {
            console.log('Currency selected:', $(this).val()); // Log selected currency
            var conversionRate = 1.2; // Example conversion rate

            var originalAmount = parseFloat($('#amountInput').val());
            var convertedAmount = originalAmount * conversionRate;

            console.log('Original Amount:', originalAmount);
            console.log('Converted Amount:', convertedAmount.toFixed(2));

            $('#amountInput').val(convertedAmount.toFixed(2));
        });
    });
</script>


        @include('user.footer')
      