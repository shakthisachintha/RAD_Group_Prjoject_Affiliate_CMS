<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-Money Dream Admin Panel</title>


  
  <link rel=stylesheet href="https://s3-us-west-2.amazonaws.com/colors-css/2.2.0/colors.min.css">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>


  <!-- style -->
  <style>
.no-margin
{
  margin-bottom: 0px !important;
}

.yes-margin{
    margin-bottom: 10px !important;
}
footer.page-footer {
  bottom: 0;
  color: #fff;
}

body{
  overflow-x: hidden !important;
}

  footer.page-footer .container-fluid {
    width: auto; }
  footer.page-footer .footer-copyright {
    overflow: hidden;
    background-color: rgba(0, 0, 0, 0.2);
    color: rgba(255, 255, 255, 0.6); }
  footer.page-footer a {
    color: #fff; }

    .elegant-color {
      background-color: #2e2e2e !important; }
    
    .elegant-color-dark {
      background-color: #212121 !important; }
    
    .stylish-color {
      background-color: #4b515d !important; }
    
    .stylish-color-dark {
      background-color: #3e4551 !important; }
    
    .unique-color {
      background-color: #3f729b !important; }
    
    .unique-color-dark {
      background-color: #1c2331 !important; }
    
    .special-color {
      background-color: #37474f !important; }
    
    .special-color-dark {
      background-color: #263238 !important; }




    .bg-black {
      background-color: black !important
    }

    /*!
 * Start Bootstrap - Simple Sidebar (https://startbootstrap.com/template-overviews/simple-sidebar)
 * Copyright 2013-2019 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-simple-sidebar/blob/master/LICENSE)
 */
body {
  overflow-x: hidden;
}

#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }
}


  </style>


  <!--Jqury  -->
 
</head>



</head>

<body class="bg-black">

  <div class="d-flex" id="wrapper">

  <script>
$(document).ready(function(){
  $("#menu-toggle").click(function (e) { 

    $("#wrapper").toggleClass("toggled");
  });

});
  
  </script>