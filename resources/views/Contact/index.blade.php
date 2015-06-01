@extends('eusalud2')
@section('content')
<div class="container container-fluid">
    <h1>Contactos</h1>
    <hr/>
        <a class="btn-green" href="#">Nuevo Contacto</a>
    <hr/>
    
    <div class="row">
        @if( count( $contacts ) > 0 )
            <table class="table-striped green usuarios">
                <tr>               
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>

            @foreach( $contacts as $c )
            <tr>
                <td>{{ $c->name }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->address }}</td>
                <td>{{ $c->phone }}</td>
                <td><a href="#">Editar</a></td>
                <td><a href="#" class="delete">Eliminar</a></td>
            </tr>
            @endforeach
            </table>
        @else
        <div class="alert alert-info">
            <p>No hay contactos registrados.</p>
        </div>
        @endif
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

