<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(session()->get("type") == 1)
      <title>Magnethub - Raising Dashboard</title>
    @else
      <title>Magnethub - Seller Dashboard</title>
    @endif
    <!-- Font Awesome-->
    <link rel="icon" type="image/x-icon" href="/website/images/black.png" />
    <link rel="stylesheet" type="text/css" href="/raising/assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="/raising/assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="/raising/assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="/raising/assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="/raising/assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="/raising/assets/css/select2.css">
    <link rel="stylesheet" type="text/css" href="/raising/assets/css/dropzone.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/raising/assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/raising/assets/css/style.css">
    <link id="color" rel="stylesheet" href="/raising/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/raising/assets/css/responsive.css">
    <!-- Own Style-->
    <link href="/dashboard/assets/css/own.css" rel="stylesheet" />
  </head>
