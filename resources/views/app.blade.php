<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eusalud</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="icon" href="{{ asset('/img/favicon.ico') }}">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
        <style>
	.no_border {
		width: auto;
		padding: 30px !important;
	}
	
	.green {
		font-size:1.2em;
		border-radius: 20px;
	}

	.green th{
		color: #fff;
		text-align:center;
                background-color: #1E7F74;
	}

	.green tr{text-align: center;}

	.green > tbody > tr:nth-of-type(odd){
		background-color: #e7e7e7 !important;

	}

	.logo-eusalud {
		margin-left: 20px;
	}

	</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			
                        <div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
                                    <li><a href="{{ url('/') }}">
                                            <img class="logo-eusalud" src="http://192.168.0.37/test2/public/img/logo colores.png" width="350" >
                                        </a>
                                    </li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Iniciar Sesión</a></li>
						<li><a href="{{ url('/auth/register') }}">Registro</a></li>
                                                
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                            {{ Auth::user()->name }} 
                                                            <span class="caret"></span>
                                                        </a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Cerrar Sesión</a></li>
							</ul>
						</li>
                                                <li><a href="{{ url('/info') }}">Informes</a></li>
					@endif
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Censo</a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{ url('/censo/3') }}">Piso 1</a></li>
                                                <li><a href="{{ url('/censo/7') }}">Piso 4</a></li>
                                            </ul>
                                        </li>
				</ul>
			</div>
		</div>
	</nav>
    <div class="container no_border">
        @yield('content')
    </div>
	

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
