@extends('layouts.app')

@section('content')

<div class="form-group">
    <a class="btn btn-primary float-right my-3" href="{{ route('refacciones.create')}}" role="button"><span data-feather="plus-circle"></span> Agregar</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

<div class="form-group">
    <input type="text" class="form-control pull-right" style="width:100%; margin-top:3rem;" id="search" placeholder="Escribe para buscar">
</div>

<table class="table-bordered table table-responsive-lg" id="mytable" cellspacing="0">
    <thead class="table-light">
        <tr role="row">
            <th scope="col">Opciones</th>
            <th scope="col">No. serie</th>
            <th scope="col">Refacción</th>
            <th scope="col">Descripción</th>
            <th scope="col">Costo</th>
        </tr>
    </thead>
    <tbody>
        @foreach($refacciones as $refaccion)
            <tr>
                <th scope="row">
                    <div class="row clearfix">
                    
                        <button type="button" class="btn">
                            <a class="btn btn-danger" href="{{ route('refacciones.show', $refaccion->numSerie) }}" role="button"><span data-feather="trash"></span></a>
                        </button>
                        <button type="button" class="btn">
                            <a class="btn btn-primary" href="{{ route('refacciones.edit', $refaccion->numSerie) }}" role="button"><span data-feather="edit"></span></a>
                        </button>
                    </div>

                </th>
                <td>{{ $refaccion->numSerie }}</td>
                <td>{{ $refaccion->nombre_refaccion  }}</td>
                <td>{{ $refaccion->descripcion }}</td>
                <td>{{ $refaccion->costo }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


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