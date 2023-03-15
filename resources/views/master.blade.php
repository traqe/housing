<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.6
 * @link http://coreui.io
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Hornet">
   <meta name="author" content="Łukasz Holeczek">
   <meta name="keyword" content="Hornet">
   <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
   <title>LoanPro</title>
 
   <!-- Icons -->
   <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
   <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">
   <link href="{{ asset('css/cdn.css') }}" rel="stylesheet">
   {{--<link href="{{ asset('https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}
 
   <!-- Main styles for this application -->
   <link href="{{ asset('css/style.css') }}" rel="stylesheet">
   <!-- Styles required by this views -->
   <link  href="{{ asset('css/custom.css') }}" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
  @stack('page_css')
</head>
 <!-- BODY options, add following classes to body to change options
 '.header-fixed' - Fixed Header
 '.brand-minimized' - Minimized brand (Only symbol)
 '.sidebar-fixed' - Fixed Sidebar
 '.sidebar-hidden' - Hidden Sidebar
 '.sidebar-off-canvas' - Off Canvas Sidebar
 '.sidebar-minimized'- Minimized Sidebar (Only icons)
 '.sidebar-compact'    - Compact Sidebar
 '.aside-menu-fixed' - Fixed Aside Menu
 '.aside-menu-hidden'- Hidden Aside Menu
 '.aside-menu-off-canvas' - Off Canvas Aside Menu
 '.breadcrumb-fixed'- Fixed Breadcrumb
 '.footer-fixed'- Fixed footer
 -->
 
 <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
   @include('panel.navbar')
   
   <div class="app-body">
     @include('panel.sidebar')
     <!-- Main content -->
     <main class="main">
 
       <!-- Breadcrumb -->
       @include('panel.breadcrumb')
 
       @yield('content')
       <!-- /.container-fluid -->
     </main>
 
     @include('panel.asidemenu')
 
   </div>
 
   @include('panel.footer')
 
   @include('panel.scripts')
   @yield('myscript')

   <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/> -->
  <script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1tgY7azkSrpVfVqRmqV85oaqVDFtspEs&callback=initMap&v=weekly"
  defer>
</script>
@stack('page_scripts')
 </body>
 </html>