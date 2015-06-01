<html>
    <head>
        <title>Mensaje de formulario de contacto www.eusalud.com</title>
    </head>
    <body>
        Mensaje de : {{ $data['email'] }} <br>
        para: {{ $data['to'] }} <br>
        asunto: {{ $data['subject'] }} <br>
        <hr>
        {{ $data['message'] }}   
    </body>
</html>