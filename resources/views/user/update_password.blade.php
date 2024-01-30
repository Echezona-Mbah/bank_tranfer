@include('user.head')
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyUTOBm61zFuFJl5I2j3ZumC7Jh4xjG2jc" crossorigin="anonymous">

<!-- Bootstrap JavaScript and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js" integrity="sha384-ZkFYC5QsV8ZHrlSiF7kkK56QV5XtNekBRq/AHoO1p4Eg/pfGgF6p3EomlQz3KkX" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyUTOBm61zFuFJl5I2j3ZumC7Jh4xjG2jc" crossorigin="anonymous"></script>


<style>

    .validation-error {
    color: red;
    font-size: 0.875rem; /* Optional: Adjust the font size to match your design */
}
</style>

@include('user.navbar')

@include('user.header')
@include('sweetalert::alert')





            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Password</h4>
                    <form class="forms-sample" method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="exampleInputPassword1">Current password</label>
                            <input type="password" class="form-control" name="current_password" id="exampleInputPassword1" placeholder="Current Password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 validation-error" />
                          </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 validation-error" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Confirm password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="exampleInputConfirmPassword1" placeholder="Password" />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 validation-error" />
                      </div>
                      <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                    </form>
                  </div>
                </div>
              </div>
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright swiftshieldcu.com 2020<br>
              
              </span>
            </div>
          </footer>

        @include('user.footer')
      