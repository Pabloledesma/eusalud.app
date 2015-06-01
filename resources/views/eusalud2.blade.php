<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{ asset('/img/favicon.ico') }}">

        <title>Clínica EuSalud</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- JqueryUi Style Smooth -->
        <link href="{{ asset('/css/jquery-ui-1.9.2.custom.css') }}" rel="stylesheet">

        <!-- Ubuntu Font -->
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <!-- Image Gallery -->
        <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-image-gallery.min.css') }}">

        <!-- Custom styles for this template -->
        <link href="{{ asset('/css/carousel.css') }}" rel="stylesheet">
        
       
        
        <script language="JavaScript" type="text/javascript" src="{{ asset('/js/jquery-1.8.3.js') }}"></script>
        <script language="JavaScript" type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
        <script language="JavaScript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script language="JavaScript" type="text/javascript" src="{{ asset('/js/holder.js') }}"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script language="JavaScript" type="text/javascript" src="{{ asset('/js/ie10-viewport-bug-workaround.js') }}"></script>

        <!-- JqueryUI Core Javascript -->
        <script language="JavaScript" type="text/javascript" src="{{ asset('/js/jquery-ui-1.9.2.custom.min.js') }}"></script>

        <!-- Custom Scripts -->
        <scrpit language="Javascript" type="text/javascript" src="{{ asset('/js/calendarios.js') }}"></scrpit>
        
        <!-- Image Gallery -->
        <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
        <script src="{{ asset('js/bootstrap-image-gallery.min.js') }}"></script>
        
</head>
<!-- NAVBAR
================================================== -->
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <a class="navbar-brand" href="{{ url('inicio') }}">
                    <img src="{{ asset('img/logo_colores.png') }}" />
                </a>
            </div>
            <div class="col-md-4">
                <div class="info-rigth">
                    <h4 style="color: #218076;"><b>CALL CENTER: 5878080</b></h4>
                    <h4 style="color: #218076;"><b>PBX: 5878087</b></h4>    
                </div>
            </div>
        </div>
         @include('partials.nav')  
    </div>


      

    @include('flash::message')

    @yield('content')

    @include('partials.footer')
    <script src="{{ asset('js/jssor.js') }}"></script>
    <script src="{{ asset('js/jssor.slider.js') }}"></script>
</body>
</html>