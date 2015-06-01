@extends('eusalud2')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registro de nuevo usuario</div>
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

					<form id="register_form" class="form-horizontal" role="form" method="POST" action="{{ url('register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Correo</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" >
							</div>
						</div>
                                                
                                                <div class="form-group">
							<label class="col-md-4 control-label">Número de identificación</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="num_id" id="num_id" value="{{ old('num_id') }}" >
							</div>
						</div>
                                               
                                                <div class="form-group">
							<label class="col-md-4 control-label">Tipo de usuario</label>
							<div class="col-md-6">
                                                            <select name="user_type" id="user_type">
                                                                <option value="User">Profesional</option>
                                                                <option value="Provider">Proveedor</option>
                                                                <option value="Admin">Administrador</option>
                                                                @if( \Auth::user()->user_type == 'Super Admin' )
                                                                   <option value="Super Admin">Super Admin</option>
                                                                @endif    
                                                            </select>
							</div>
						</div>

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

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
                                                            <button type="submit" class="btn btn-green" id="submit">Registrar</button>						
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
     //Validación de formularios
     $().ready(function(){
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
                     required: true,
                     minlength: 6
                 },
                 password_confirmation: {
                     required: true,
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
                     required: "Por favor ingrese su clave",
                     minlength: "Su clave debe contener minimo 6 caracteres"
                 },
                 password_confirmation: {
                     required: "Por favor confirme su clave",
                     minlength: "La clave debe contener minimo 6 caracteres",
                     equalTo: "La clave no coincide"
                 }
             }
         });
     });
     
     

</script>
    
@stop
