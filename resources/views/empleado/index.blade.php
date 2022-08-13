@extends('layouts.app')
@section('content')
<div class="container">


@if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('mensaje') }}
</div>
@endif    




<a href="{{ url('empleado/create') }}" class="btn btn-success">Registrar nuevo empleado</a>
</br>
</br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{ $empleado->id }}</td> 
            <td><img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width="150" alt=""></td>
            <td>{{ $empleado->Nombre }}</td>
            <td>{{ $empleado->Apellido }}</td>
            <td>{{ $empleado->Correo }}</td>
            <td>
                
                <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-primary">
                Editar 
                </a>
                

                <form action="{{ url('/empleado/'.$empleado->id) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input class="btn btn-warning" type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">

                </form>


            </td>
        </tr>
        @endforeach
    </tbody>

</table>
</div>
@endsection