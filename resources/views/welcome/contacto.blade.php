@extends('eusalud2')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Formulario de contacto</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>UPS! </strong> Hay problemas con los datos ingresados por favor verifique.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {!! Form::open(['method' => 'POST', 'url' => 'contacto', 'class' => 'form-horizontal', 'id' => 'contact_form']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Nombre</label>
                        <div class="col-md-6">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Correo</label>
                        <div class="col-md-6">
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Asunto</label>
                        <div class="col-md-6">
                            {!! Form::text('asunto', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">A quien va dirigido el mensaje?</label>
                        <div class="col-md-6">
                            <select class="form-control" name="departamento" id="departamento">
                                <option selected="true" value=>---Seleccione---</option>
                                <option value="pablo.ledesma@eusalud.com">Clínica de Traumatología</option>
                                <option value="pablo.ledesma@eusalud.com">Clínica Materno-Infantil</option>
                                <option value="pablo.ledesma@eusalud.com">Clínica de Pacientes Crónicos</option>
                                <option value="pablo.ledesma@eusalud.com">Mercadeo</option>
                                <option value="pabloledes83@gmail.com">Calidad</option>
                                
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Mensaje</label>
                        <div class="col-md-6">
                            {!! Form::textarea('mensaje', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    
                    <!--<div class="form-group">
                        <label class="col-md-4 control-label">Demuestranos que no eres un robot</label>
                        <div class="col-md-2">
                            
                            <input class="form-control" type="text" id="CaptchaCode" name="CaptchaCode">
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>-->
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-green" id="submit" name="submit">Enviar</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $().ready(function(){
        $("#contact_form").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                asunto: "required", 
                departamento: "required",
                mensaje: "required"
            },
            messages: {
                name: {
                    required: "Debe ingresar su nombre.",
                    minlength: "El nombre debe tener minimo 3 letras."
                },
                email: {
                    required: "Debe ingresar su correo electrónico.",
                    email: "El correo ingresado no es válido"
                },
                asunto: {
                    required: "Debe ingresar un asunto"
                },
                departamento: {
                    required: "Debe seleccionar un departamento"
                },
                mensaje: {
                    required: "Debe ingresar un mensaje"
                }
            }
        });
    });
</script>
@stop
