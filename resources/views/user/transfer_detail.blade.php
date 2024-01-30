@include('user.head')



@include('user.navbar')


@include('user.header')
<style>

.no-print {
display: none;
}
</style>




        <!-- Example displaying amounts and currency code -->
        {{-- <div>
            <p class="amount" data-amount="{{ $user->balance }}">Amount: <span id="displayAmount">{{ $user->balance }}</span></p>

            <p class="amount" data-amount="100">Amount: <span id="displayAmount">100</span></p>
            <p class="-code">Currency Code: <span id="displayCode">EURO EUR</span></p>
            <!-- Add more elements with class 'amount' and 'currency-code' if needed -->
        </div> --}}

      


        
                
                  <div class="card">
                    <div class="card-body px-0 overflow-auto">
                      <h4 class="card-title pl-4">{{$transaction->fund_tranfer}}</h4>
                      <div class="table-responsive">
                        <table class="table">
                          <thead class="bg-light">
                            <tr>
                              <th style="font-display: 30px">{{($user->account_type) }} Information</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td>Date:</td>
                                <td>{{($transaction->created_at) }}</td>
                            </tr>
                            <tr>
                                <td>Transaction ID:</td>
                                <td>{{($transaction->transaction_id) }}</td>
                            </tr>
                            <tr>
                              <td>Full Name:</td>
                              <td>{{($transaction->fund_tranfer) }}</td>
                            </tr>
                            <tr>
                                <td>Account Number:</td>
                                <td>{{($transaction->reciever_name) }}</td>
                            </tr>
                            <tr>
                                <td>Amount:</td>
                                <td>{{($transaction->amount) }}</td>
                            </tr>
                            {{-- <tr>
                                <td>Transaction Type:</td>
                                <td>{{($transaction->type) }}</td>
                            </tr> --}}
                            <tr>
                                <td>Total Balance:</td>
                                <td>{{($user->balance) }}</td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <button type="button" class="btn btn-success" onclick="printAccountStatement()">Print Details</button>
                                </td>
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
 
        


          <script>
            function printAccountStatement() {
              window.print();
          }
              </script>
      
       


        @include('user.footer')
      