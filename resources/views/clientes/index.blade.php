@extends('layouts.app')
@section('content')
<div class="card-body">
    <a class="btn btn-primary float-right my-3" href="{{ route('clientes.create')}}" role="button"><span data-feather="user-plus"></span> Agregar</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="form-group">
        <input type="text" class="form-control pull-right" style="width:100%; margin-top:3rem;" id="search" placeholder="Escribe para buscar">
    </div>

    <table class="table table-responsive-lg" id="mytable" cellspacing="0">
        <thead class="table-light">
            <tr>
                <th scope="col">Opciones</th>
                <th scope="col">id</th>
                <th scope="col">Nombre(s)</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Calle</th>
                <th scope="col">Colonia</th>
                <th scope="col">C.P.</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <th scope="row">
                        <div class="row clearfix">
                            <button type="button" class="btn">
                                <a class="btn btn-danger" href="{{ route('clientes.show', $cliente->id) }}" role="button"><span data-feather="user-minus"></span></a>
                            </button>
                            <button type="button" class="btn">
                                <a class="btn btn-primary" href="{{ route('clientes.edit', $cliente->id)}}" role="button"><span data-feather="edit"></span></a>
                            </button>
                        </div>

                    </th>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre_cliente  }}</td>
                    <td>{{ $cliente->apellido_paterno }}</td>
                    <td>{{ $cliente->apellido_materno }}</td>
                    <td>{{ $cliente->calle }}</td>
                    <td>{{ $cliente->colonia }}</td>
                    <td>{{ $cliente->codigo_postal}}</td>
                    <td>{{ $cliente->telefono_celular }}</td>
                    <td>{{ $cliente->correo_electronico }}</td>
                </tr>
            @endforeach


        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
 $(document).ready(function(){
     $("#search").keyup(function(){
         _this = this;
         $.each($("#mytable tbody tr"), function() {
             if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
             $(this).hide();
             else
             $(this).show();
             });
             });
             });
</script>

@endsection