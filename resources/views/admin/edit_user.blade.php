@include('admin.head')
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">


<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-GLhlTQ8iNl4fh6TpoHk7l9pOV2Rgfy4L" crossorigin="anonymous">


@include('admin.navbar')


@include('admin.header')
@include('sweetalert::alert')




        <div class="main-panel">
          <div class="content-wrapper pb-0">



            <div class="row">



                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Edit Account</h4>
                        <p class="card-description">Edit Account</p>
                        <form action="{{ route('update', ['user' => $user->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                          <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" value="{{$user->name}}" name="name" id="exampleInputName1" placeholder="Name" />
                          </div>
                          <div class="form-group">
                            <label for="exampleInputName1">Username</label>
                            <input type="text" class="form-control" value="{{$user->username}}" name="username" id="exampleInputName1" placeholder="Name" />
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail3">Email address</label>
                            <input type="email" class="form-control"  value="{{$user->email}}" name="email" id="exampleInputEmail3" placeholder="Email" />
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail3">Phone Number</label>
                            <input type="number" class="form-control"  value="{{$user->phone}}" name="phone" id="exampleInputEmail3" placeholder="phone" />
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail3">City</label>
                            <input type="text" class="form-control"  value="{{$user->city}}" name="city" id="exampleInputEmail3" placeholder="city" />
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail3">State</label>
                            <input type="text" class="form-control"  value="{{$user->state}}" name="state" id="exampleInputEmail3" placeholder="state" />
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail3">Address</label>
                            <input type="text" class="form-control"  value="{{$user->address}}" name="address" id="exampleInputEmail3" placeholder="address" />
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail3">Nationality</label>
                            <input type="text" class="form-control"  value="{{$user->Nationality}}" name="Nationality" id="exampleInputEmail3" placeholder="Nationality" />
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail3">Next Of Kin Relation</label>
                            <input type="text" class="form-control"  value="{{$user->next_kin_relation}}" name="next_kin_relation" id="exampleInputEmail3" placeholder="Next Of Kin Relation" />
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail3">Next Of Kin Relation</label>
                            <input type="text" class="form-control"  value="{{$user->next_kin_address}}" name="next_kin_address" id="exampleInputEmail3" placeholder="Next Of Kin Relation" />
                          </div>



                          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        </form>
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
        </div>


 
      


        @include('admin.footer')
      