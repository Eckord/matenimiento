@extends('layouts.app')

    @if($servicio->estado === 1 || $servicio->estado === 4)
        @include('mantenimiento.formSinAprob')
    
        @elseif($servicio->estado === 3)
            @include('mantenimiento.formAprob')

        @elseif($servicio->estado === 2)
        @section('content')
        <a class="btn btn-primary float-right my-3" href="{{ route('mantenimiento.index')}}" role="button"><span data-feather="chevron-left"></span> Regresar</a>         
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Este mantenimiento tiene una cotización pendiente</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>            
        </div>      
        @endsection  
    
    @endif
    