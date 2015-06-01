<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $title }}</div>
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
                    {!! Form::model($user, ['method' => 'POST', 'url' => $url, 'class' => 'form-horizontal', 'id' => 'register_form']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{ $user->id }}">

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
                        <label class="col-md-4 control-label">Número de identificación</label>
                        <div class="col-md-6">
                            {!! Form::text('num_id', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Tipo de usuario</label>
                        <div class="col-md-6">
                            <select name="user_type" id="user_type">
                                <option value="User" {{ $user->user_type == 'User' ? 'selected' : '' }}>Usuario</option>
                                <option value="Admin" {{ $user->user_type == 'Admin' ? 'selected' : '' }}>Administrador</option>
                                @if( \Auth::user()->user_type == 'Super Admin' )
                                <option value="Super Admin" {{ $user->user_type == 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Modificar clave</label>
                        <div class="col-md-6">
                            <input type="checkbox" name="edit_password" id="edit_password">
                        </div>
                    </div>
                    <div id='div_edit_password'>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Clave</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirme su clave</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" id="submit">{{ $boton }}</button>
                            <a href="{{ url('usuarios') }}" class="btn btn-green">Volver</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //Validación de formularios
    $().ready(function () {
        var check = $("#edit_password"), fields = $("#div_edit_password");
        fields.hide();
        check.on('change', function(){
            fields.toggle("slow");
        });
         
        $("#register_form").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true
                },
                num_id: {
                    required: true,
                    minlength: 8
                },
                password: {                   
                    minlength: 6
                },
                password_confirmation: {                   
                    minlength: 6,
                    equalTo: "#password"
                }
            },
            messages: {
                name: {
                    required: "Por favor ingrese su nombre",
                    minlength: "El nombre debe contener minimo 2 caracteres"
                },
                email: {
                    required: "Por favor ingrese su correo",
                    email: "Correo invalido"
                },
                num_id: {
                    required: "Por favor ingrese su número de identificación",
                    minlength: "El número de identificación debe contener minimo 8 caracteres"
                },
                password: {
                    minlength: "Su clave debe contener minimo 6 caracteres"
                },
                password_confirmation: {
                    minlength: "La clave debe contener minimo 6 caracteres",
                    equalTo: "La clave no coincide"
                }
            }
        });
    });



</script>