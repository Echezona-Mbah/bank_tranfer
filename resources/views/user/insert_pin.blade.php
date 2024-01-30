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

<div class="page-header">
  <h4 class="page-title d-none d-md-block">Insert Pin</h4>
  <div class="btn-group-page-header ml-auto">
      <select name="currency" id="currencySelector" class="form-control">
          <option disabled selected>Choose Currency</option>
          @foreach($currencies as $currency)
              <option value="{{ $currency->app }}">{{ $currency->name }}</option>
          @endforeach
      </select>
  </div>
</div>




            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" method="POST" action="{{ route('insert-pin') }}">
                        @csrf
                    <h4 class="card-title">Insert Transaction Pin</h4>
                    <div class="form-group">
                      <label>Pin</label>
                      <input type="text" class="form-control" name="pin" value="" />
                      @error('pin')
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
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © swiftshieldcu.com 2020<br>
              
              </span>
            </div>
          </footer>
        @include('user.footer')
      