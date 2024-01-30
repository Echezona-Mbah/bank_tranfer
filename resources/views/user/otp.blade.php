@include('user.head')
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>



@include('user.navbar')


@include('user.header')
@include('sweetalert::alert')
<style>

    .validation-error {
    color: red;
    font-size: 0.875rem; /* Optional: Adjust the font size to match your design */
}
</style>




                    <!-- select currency -->
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

        <!-- Example displaying amounts and currency code -->
        {{-- <div>
            <p class="amount" data-amount="{{ $user->balance }}">Amount: <span id="displayAmount">{{ $user->balance }}</span></p>

            <p class="amount" data-amount="100">Amount: <span id="displayAmount">100</span></p>
            <p class="-code">Currency Code: <span id="displayCode">EURO EUR</span></p>
            <!-- Add more elements with class 'amount' and 'currency-code' if needed -->
        </div> --}}



<div>
    <!-- ... Other elements ... -->

    <p class="amount" data-amount="{{ $user->balance }}">
        Total Account balance:
        <span id="displayTotalAccountBalance">
            <span class="displayAmount">{{ $user->balance }}</span>
            <span class="displayCode">EURO EUR</span>
        </span>
    </p>
</div>

<h2>Enter OTP</h2>

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form class="form-sample" method="POST" action="{{ route('process-otp') }}">
            @csrf
        <h4 class="card-title">OTP</h4>
        <div class="form-group">
          <label>OTP</label>
          <input type="text" class="form-control" name="otp" value="" required />
          @error('otp')
          <div class="validation-error">{{ $message }}</div>
      @enderror
        </div>

        <input type="hidden" name="transfer_id" value="{{ $transactionId }}">
        
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
    </form>
      </div>
    </div>
  </div>


            





          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020<br>
                Distributed By <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a>
              
              </span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard template</a> from Bootstrapdash.com</span>
            </div>
          </footer>


 
       


        @include('user.footer')
      