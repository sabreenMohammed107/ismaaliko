<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ismaaliko</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('webssets/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('webssets/css/animate.css')}}">

    <link rel="stylesheet" href="{{ asset('webssets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('webssets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('webssets/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{ asset('webssets/css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('webssets/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{ asset('webssets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('webssets/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset('webssets/css/style.css')}}">



  	<link rel="stylesheet" type="text/css" href="{{ asset('webssets/css/bootstrap.min.css')}}">
  	<link rel="stylesheet" type="text/css" href="{{ asset('webssets/css/owl.carousel.css')}}">
  	<link rel="stylesheet" type="text/css" href="{{ asset('webssets/css/owl.theme.default.css')}}">
  	<!--<link rel="stylesheet" type="text/css" href="{{ asset('webssets/css/slider.css')}}">-->
      @if(isset($canonical))
      <link rel="canonical" href="{{ $canonical }}" />
      @endif

  	<link type="text/css" rel="stylesheet" href="{{ asset('webssets/css/style-menu.css')}}" />
      <link type="text/css" rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" />

      @yield('style')
  </head>
