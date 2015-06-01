<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eusalud</title>
       

	<!-- Fonts 
        Esta fuente produce un error en la generación del documento de excel
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
        <style>
	table {
		font-size:1.2em;
		border-radius: 20px;
                border-collapse: collapse;
                border-spacing: 0;
	}

	.principal th{
		color: #fff;
		text-align:center;
                background-color: #1E7F74;
	}

	table tr{text-align: center;}

	.principal > tbody > tr:nth-of-type(odd){
		background-color: #e7e7e7 !important;

	}
        .no_border {
		width: auto;
		padding: 30px !important;
	}
        
        .logo {
            position: absolute;
            margin-left: 30px;
            margin-top: 0;
        }


	</style>
        <script language="JavaScript" type="text/javascript" src="{{ asset('/js/jquery-1.8.3.js') }}"></script>
</head>
<body>
    <!--<div class='logo'>
        <img src="../img/logo_colores.png" width="350" />
    </div>-->
    <div class="no_border">
        @yield('content')
    </div>
    
</body>
</html>
