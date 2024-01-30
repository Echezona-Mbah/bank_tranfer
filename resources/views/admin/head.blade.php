<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themewagon.github.io/Breeze-Free-Bootstrap-Admin-Template/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2024 15:55:22 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Breeze Admin</title>
    <link rel="stylesheet" href="{{asset('asset/vendors/mdi/css/materialdesignicons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/vendors/flag-icon-css/css/flag-icon.min.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/vendors/css/vendor.bundle.base.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}" />
    <link rel="shortcut icon" href="{{asset('asset/images/favicon.png')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
      .page-header {
         padding: 10px;
         background-color: #f0f0f0;
         display: flex;
         justify-content: space-between;
     }

     .page-title {
         margin: 0;
     }

     .btn-group-page-header {
         display: flex;
         align-items: center;
     }
     .notification {
        display: none;
        transition: transform 0.5s ease; /* Define the transition effect */
    }

    .notification.show {
        display: block;
        transform: translateY(0); /* Slide down */
    }
</style>
  </head>