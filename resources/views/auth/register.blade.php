<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from enemabank.com/signup.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Jan 2024 19:14:45 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="demo/html/payyed/images/logo.jpg" rel="icon" />
<title>swiftshieldbank</title>
<meta name="description" content="This professional design html template is for build a Money Transfer and online payments website.">
<meta name="author" content="harnishdesign.net">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap">

<link rel="stylesheet" type="text/css" href="demo/html/payyed/vendor/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="demo/html/payyed/vendor/font-awesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="demo/html/payyed/css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/attention.css" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyUTOBm61zFuFJl5I2j3ZumC7Jh4xjG2jc" crossorigin="anonymous">

<!-- Bootstrap JavaScript and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js" integrity="sha384-ZkFYC5QsV8ZHrlSiF7kkK56QV5XtNekBRq/AHoO1p4Eg/pfGgF6p3EomlQz3KkX" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyUTOBm61zFuFJl5I2j3ZumC7Jh4xjG2jc" crossorigin="anonymous"></script>


<link rel="stylesheet" href="css/style.css">
<script src="js/attention.js"></script>
</head>
<body>

<div id="preloader">
<div data-loader="dual-ring"></div>
</div>

<div id="main-wrapper">
<div class="container-fluid px-0">
<div class="row g-0 min-vh-100">
<div class="col-md-6">

<div class="hero-wrap d-flex align-items-center h-100">
<div class="hero-mask opacity-8 bg-primary"></div>
<div class="hero-bg hero-bg-scroll" style="background-image:url('images/image-3.png');"></div>
<div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
<div class="row g-0">
<div class="col-10 col-lg-9 mx-auto">
<div class="logo mt-5 mb-5 mb-md-0">
<a class="d-flex" href="index.html" title="SwiftShield - HTML Template">
<img src="demo/html/payyed/images/remove.png"  width="350" height="500" alt="SwiftShield">

</a>
</div>
</div>
</div>
<div class="row g-0 my-auto">
<div class="col-10 col-lg-9 mx-auto">
<p class="text-4 text-white lh-base mb-5">Every day, SwiftShield Bank makes thousands of customers happy.</p>
</div>
</div>
</div>
</div>

</div>

<style>
    .form-control{
        border-radius: 50px;
    }
    .validation-error {
    color: red;
    font-size: 0.875rem; /* Optional: Adjust the font size to match your design */
}
</style>

<div class="col-md-6 d-flex align-items-center">

<div class="container my-4">
<div class="row g-0">
<div class="col-11 col-lg-9 col-xl-8 mx-auto">
<h3 class="fw-400 mb-4">Sign Up</h3>
<form method="POST" action="{{ route('register') }}">
    @csrf
<div class="mb-3">
<label for="name" class="form-label">Full Name</label>
<input type="text" class="form-control" name="name" id="name" required placeholder="Enter Your Name">
<x-input-error :messages="$errors->get('name')" class="mt-2 validation-error" />
</div>
<div class="mb-3">
<label for="username" class="form-label">Username</label>
<input type="text" class="form-control" id="username" name="username"  required placeholder="Enter Your Username">
<x-input-error :messages="$errors->get('username')" class="mt-2 validation-error" />
</div>
<div class="mb-3">
<label for="emailAddress" class="form-label">Email Address</label>
<input type="email" class="form-control" id="emailAddress" name="email" required placeholder="Enter Your Email">
<x-input-error :messages="$errors->get('email')" class="mt-2 validation-error" />
</div>
<div class="mb-3">
<label for="number" class="form-label">Phone Number</label>
<input type="text" class="form-control" id="number" name="phone" required placeholder="Enter Your Phone number">
<x-input-error :messages="$errors->get('phone')" class="mt-2 validation-error" />
</div>
<div class="mb-3">
<label for="loginPassword" class="form-label">Password</label>
<input type="password" class="form-control" id="Password" name="password" required placeholder="Enter Password">
<x-input-error :messages="$errors->get('password')" class="mt-2 validation-error" />
</div>
<div class="mb-3">
<label for="loginPassword" class="form-label">Confirm Password</label>
<input type="password" class="form-control" id="confirm Password" name="password_confirmation" required placeholder="Enter Password">
<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 validation-error" />
</div>
<div class="d-grid mt-4 mb-3">
<button id="signup" class="btn btn-primary" type="submit">Sign Up</button>
</div>
</form>
<p class="text-3 text-center text-muted">
Already have an account? <a class="btn-link" href="{{ route('login') }}">Log In</a>
</p>
</div>
</div>
</div>

</div>
</div>
</div>
</div>

<a id="back-to-top" data-bs-toggle="tooltip" title="Back to Top" href="javascript:void(0)">
<i class="fa fa-chevron-up"></i>
</a>

<div id="styles-switcher" class="left">
<h2 class="text-3">Color Switcher</h2>
<hr>
<ul>
<li class="blue" data-bs-toggle="tooltip" title="Blue" data-path="css/color-blue.html"></li>
<li class="indigo" data-bs-toggle="tooltip" title="Indigo" data-path="css/color-indigo.html"></li>
<li class="purple" data-bs-toggle="tooltip" title="Purple" data-path="css/color-purple.html"></li>
<li class="pink" data-bs-toggle="tooltip" title="Pink" data-path="css/color-pink.html"></li>
<li class="red" data-bs-toggle="tooltip" title="Red" data-path="css/color-red.html"></li>
<li class="orange" data-bs-toggle="tooltip" title="Orange" data-path="css/color-orange.html"></li>
<li class="yellow" data-bs-toggle="tooltip" title="Yellow" data-path="css/color-yellow.html"></li>
<li class="teal" data-bs-toggle="tooltip" title="Teal" data-path="css/color-teal.html"></li>
<li class="cyan" data-bs-toggle="tooltip" title="Cyan" data-path="css/color-cyan.html"></li>
<li class="brown" data-bs-toggle="tooltip" title="Brown" data-path="css/color-brown.html"></li>
</ul>
<button class="btn btn-dark btn-sm border-0 fw-400 rounded-0 shadow-none" data-bs-toggle="tooltip" title="Green" id="reset-color">Reset Default</button>
<button class="btn switcher-toggle">
<i class="fas fa-cog"></i>
</button>
</div>


<script src="demo/html/payyed/vendor/jquery/jquery.min.js"></script>
<script src="demo/html/payyed/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="demo/html/payyed/js/signup.js"></script>

<script src="demo/html/payyed/js/switcher.min.js"></script>
<script src="demo/html/payyed/js/theme.js"></script>
</body>

<!-- Mirrored from enemabank.com/signup.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Jan 2024 19:14:45 GMT -->
</html>