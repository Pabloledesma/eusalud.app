@extends('eusalud2')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Iniciar Sesión</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Hay problemas con su información.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form id="login_form" class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Correo</label>
                            <div class="col-md-6">
                                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Clave</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" checked="true"> Recuerdeme
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-green">Iniciar Sesión</button>
                                
                                
                                <a class="btn btn-link" href="{{ url('/password/email') }}">Olvido su clave?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $().ready(function(){
        var form = $("login_form");
        form.validate({
            rules: {
                 email: {
                     required: true,
                     email: true
                 },
                 password: {
                     required: true,
                     minlength: 6
                 }
            },
            messages: {
                email: {
                     required: "Por favor ingrese su correo",
                     email: "Correo invalido"
                 },
                  password: {
                     required: "Por favor ingrese su clave",
                     minlength: "Su clave debe contener minimo 6 caracteres"
                 }
            }
        });
        if(form.valid()){
            alert('funciona');
        }
        
    });
</script>
@endsection
