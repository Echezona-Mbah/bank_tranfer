@include('user.head')
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>


@include('user.navbar')

@include('user.header')
@include('sweetalert::alert')





            @if($user->status == 'pending')
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3 >Profile Information</h3><br>
                    <h6 class="card-title">Update your account's profile information</h6><br>
                    <form class="forms-sample"method="POST" action="{{ url('/updateProfile') }}">
                        @csrf
                        @method('PUT')
                      <div class="form-group">
                        <label for="exampleInputName1">Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{( $user->name) }}" id="exampleInputName1" placeholder="Name" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Username</label>
                        <input type="text" class="form-control" name="username" value="{{($user->username) }}"id="exampleInputName1" placeholder="username" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{($user->email) }}" id="exampleInputEmail3" placeholder="Email" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Phone Number</label>
                        <input type="text" class="form-control" name="phone" value="{{($user->phone) }}" id="exampleInputName1" placeholder="phone" />
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Account Type</label>
                        <select class="form-control" id="exampleSelectGender"  value="{{( $user->account_type) }}" name="account_type">
                          <option>Savings Account</option>
                          <option>Checking accounts</option>
                          <option>Money market accounts (MMAs)</option>
                          <option>ertificate of deposit accounts (CDs)</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Address</label>
                        <input type="text" class="form-control" name="address" value="{{($user->address) }}" id="exampleInputName1" placeholder="address" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">City </label>
                        <input type="text" class="form-control" value="{{($user->city) }}" id="exampleInputName1" name="city" placeholder="city" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">State</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{($user->state) }}" name="state" placeholder="State" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Nationality</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{($user->Nationality) }}" name="Nationality" placeholder="Nationality" />
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <select class="form-control" id="exampleSelectGender" value="{{($user->gender) }}" name="gender">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Next of Kin Relation</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{($user->next_kin_relation) }}" name="next_kin_relation" placeholder="Next of Kin Relation" />
                      </div>

                      <div class="form-group">
                        <label for="exampleInputCity1">Next of Kin Address</label>
                        <input type="text" class="form-control" id="exampleInputCity1" value="{{($user->next_kin_address) }}" name="next_kin_address" placeholder="Next of Kin Address" />
                      </div>
                      <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                    </form>
                  </div>
                </div>
              </div>
              @else




              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3 >Profile Information</h3><br>
                    <h6 class="card-title">Update your account's profile information</h6><br>
                    <form class="forms-sample"method="POST" action="{{ url('/updateProfile') }}">
                        @csrf
                        @method('PUT')
                      <div class="form-group">
                        <label for="exampleInputName1">Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{( $user->name) }}" id="exampleInputName1" placeholder="Name" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Username</label>
                        <input type="text" class="form-control" name="username" value="{{($user->username) }}"id="exampleInputName1" placeholder="username" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{($user->email) }}" id="exampleInputEmail3" placeholder="Email" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Phone Number</label>
                        <input type="text" class="form-control" name="phone" value="{{($user->phone) }}" id="exampleInputName1" placeholder="phone" />
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Account Type</label>
                        <input type="text" class="form-control" name="phone" value="{{($user->account_type) }}" id="exampleInputName1" placeholder="phone" />

                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Address</label>
                        <input type="text" class="form-control" name="address" value="{{($user->address) }}" id="exampleInputName1" placeholder="address" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">City </label>
                        <input type="text" class="form-control" value="{{($user->city) }}" id="exampleInputName1" name="city" placeholder="city" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">State</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{($user->state) }}" name="state" placeholder="State" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Nationality</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{($user->Nationality) }}" name="Nationality" placeholder="Nationality" />
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <input type="text" class="form-control" name="phone" value="{{($user->gender) }}" id="exampleInputName1" placeholder="phone" />

                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Next of Kin Relation</label>
                        <input type="text" class="form-control" id="exampleInputName1" value="{{($user->next_kin_relation) }}" name="next_kin_relation" placeholder="Next of Kin Relation" />
                      </div>

                      <div class="form-group">
                        <label for="exampleInputCity1">Next of Kin Address</label>
                        <input type="text" class="form-control" id="exampleInputCity1" value="{{($user->next_kin_address) }}" name="next_kin_address" placeholder="Next of Kin Address" />
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              @endif









          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © swiftshieldcu.com 2020<br>
              
              </span>
            </div>
          </footer>

        @include('user.footer')
      