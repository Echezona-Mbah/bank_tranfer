@include('user.head')



@include('user.navbar')


@include('user.header')




       
      

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
              
      




          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©swiftshieldcu.com 2020<br>
              
              </span>
            </div>
          </footer>
 
        


 
       


        @include('user.footer')
      