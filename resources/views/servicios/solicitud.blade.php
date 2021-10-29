@extends('layouts.app')
@section('styles')
    <style>
        * {
    margin: 0;
    padding: 0
}

html {
    height: 100%
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px
}

#msform fieldset .form-card {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    padding: 20px 40px 30px 40px;
    box-sizing: border-box;
    width: 94%;
    margin: 0 3% 20px 3%;
    position: relative
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform fieldset .form-card {
    text-align: left;
    color: #9E9E9E
}

#msform input,
#msform textarea {
    padding: 0px 8px 4px 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;

    color: #2C3E50;
    font-size: 16px;
    letter-spacing: 1px
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: none;
    font-weight: bold;
    border-bottom: 2px solid skyblue;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: skyblue;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px
}

#msform .action-button:hover,
#msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
}

select.list-dt {
    border: none;
    outline: 0;
    border-bottom: 1px solid #ccc;
    padding: 2px 5px 3px 5px;
    margin: 2px
}

select.list-dt:focus {
    border-bottom: 2px solid skyblue
}

.card {
    z-index: 0;
    border: none;
    border-radius: 0.5rem;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #2C3E50;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #000000
}

#progressbar li {
    list-style-type: none;
    font-size: 12px;
    width: 25%;
    float: left;
    position: relative
}

 /* #progressbar #account:before {
    font-family: FontAwesome;
    content: "\f007"
} */
#progressbar #account:before {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f007"
}

#progressbar #personal:before {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f2bb"
}

#progressbar #payment:before {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f19d"
}

#progressbar #confirm:before {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 18px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: skyblue
}

.radio-group {
    position: relative;
    margin-bottom: 25px
}

.radio {
    display: inline-block;
    width: 204;
    height: 104;
    border-radius: 0;
    background: lightblue;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
    cursor: pointer;
    margin: 8px 2px
}

.radio:hover {
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
}

.radio.selected {
    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
}

.fit-image {
    width: 100%;
    object-fit: cover
}
    </style>
@endsection

@section('content')
        <a class="btn btn-primary float-right my-3" href="{{ route('servicios.index')}}" role="button"><span data-feather="chevron-left"></span> Regresar</a> <br><br><br><br>
<div class="alert alert-warning">IMPORTANTE! No olvide notificar al cliente antes de aprobar/rechazar cualquier solicitud</div>        


@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Whoops!</strong> Algo salió mal, intenta nuevamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        
    </div>
@endif

<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Aprobar solicitud</strong></h2>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" method="POST" action="">
                            {!! @csrf_field() !!}                              
                                <div class="form-card">
                                    <h2 class="fs-title">Detalles de cambios</h2>
                                    <label align="left">Mantenimiento Preventivo:</label>
                                    <input type="text" class="form-control" name="actividad" id="actividad" placeholder="Sin cambios" disabled value="{{ $mantenimiento->mantenimientoPrev->actividad }}" />
                                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Sin cambios" disabled value="{{ $mantenimiento->mantenimientoPrev->descripcion }}"/>
                                    <input type="text" class="form-control" name="insumos" id="insumos" placeholder="Sin cambios" disabled value="{{ $mantenimiento->mantenimientoPrev->insumos_utilizados }}"/>
                                    <label>Mantenimiento Correctivo:</label>
                                    <input type="text" class="form-control" name="hardware" id="hardware" placeholder="Sin cambios" disabled value="{{ $mantenimiento->mantenimientoCorrect->hardware_actual }}"/>
                                    <input type="text" class="form-control" name="sofware" id="sofware" placeholder="Sin cambios" disabled/ value="{{ $mantenimiento->mantenimientoCorrect->software_actual }}">
                                    <label for="costo_estimado">Cotización:</label>
                                    <input type="text" class="form-control" name="costo_estimado" id="costo_estimado" placeholder="Sin cambios" disabled value="Costo estimado: ${{ $servicio->ordenServicio->costo_estimado }}"/>
                                    <input type="text" class="form-control" name="costo_final" id="costo_final" placeholder="Sin cambios" disabled value="Costo final: ${{ $mantenimiento->costo_final}}"/>
                                </div>     
                                <input type="submit" name="rechazar" id="rechazar" class="next action-button" value="Rechazar" dir="{{route('servicios.rechazarSolicitud', $servicio->id)}}" />
                                <input type="submit" name="aprobar" id="aprobar" class="next action-button" value="Aprobar" dir="{{route('servicios.aprobarSolicitud', $servicio->id)}}" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
  
  $("input[type=submit]").click(function() {
    var accion = $(this).attr('dir');
    $('form').attr('action', accion);
    $('form').submit();
  });
  
});	
$(document).ready(function(){	
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    $(".next").click(function(){
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    $(".previous").click(function(){
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    $('.radio-group .radio').click(function(){
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });

    $(".submit").click(function(){
        return false;
    })

});
    </script>
@endsection