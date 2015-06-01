@extends('eusalud2')
@section('content')
<div class="container container-fluid">
    <h1>Usuarios</h1>
    <hr/>
        <a class="btn-green" href="{{ url('/auth/register') }}">Nuevo usuario</a>
    <hr/>            
    <div class="row">
        <table class="table-striped green usuarios">
            <tr>               
                <th>Nombre</th>
                <th>Correo</th>
                <th>Cedula</th>
                <th>Tipo</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        
        @foreach( $usuarios as $u )
        <tr>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->num_id }}</td>
            <td>{{ $u->user_type }}</td>
            <td><a href="{{ url('usuarios/'.$u->id.'/edit' ) }}">Editar</a></td>
            <td><a href="{{ url('usuarios/'.$u->id.'/delete' ) }}" class="delete">Eliminar</a></td>
        </tr>
        @endforeach
        </table>
    </div>
</div>
<script>
    $().ready(function(){
        $("a.delete").on('click', function(e){     
        
            e.preventDefault();
            var c = confirm("Esta seguro de que quiere eliminar el usuario?");
            if( c ){
                location.replace($(this).attr('href'));
            }
        });
    });
    
</script>
@stop

