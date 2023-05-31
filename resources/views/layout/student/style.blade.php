<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HTI - SPACE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link href="{{ asset('img/logo.png') }}" rel="shortcut icon">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('web-assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('web-assets/css/style.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style>
    .successfully-saved {
  display: none;
  color: #1b7c18;
  border-radius: 5px;
  border: 2px solid #1b7c18;
  padding: 0.5em 0.75em;
  background: #d6f8dd;
  width: 25%;
  margin-top: 20px;
    }
    .successfully-saved .show {
    display: block;
  }
</style>
@yield('add-style')
<body>
