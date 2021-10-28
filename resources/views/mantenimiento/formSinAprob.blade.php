@section('content')
    @section('styles')
    <style>
        * {
    margin: 0;
    padding: 0
}

html {
    height: 100%
}

#grad1 {
    /* background-color: : #9C27B0;
    background-image: linear-gradient(120deg, #FF4081, #81D4FA) */
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
    content: "\f812"
}

#progressbar #personal:before {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f46d"
}

#progressbar #payment:before {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f7d9"
}

#progressbar #order:before {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f788"
}

#progressbar #confirm:before {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f00c"
}

#progressbar #final:before {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f15b"
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

#carreraText {
    size: 0.2px;
}
    </style>
@endsection

@section('content')
<div class="container-fluid" id="grad1">
@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="row justify-content-center mt-0">
        <div>
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <center><h2><strong>Formulario Matenimiento</strong></h2></center>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" method="POST" action="{{route('mantenimiento.store', $servicio->id)}}">
                            {!! @csrf_field() !!}
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>1. REGISTRO DE DISPOSITIVO</strong></li>
                                <li id="order"><strong>2. MANTENIMIENTO PREVENTIVO</strong></li>
                                <li id="order"><strong>3. MANTENIMIENTO CORRECTIVO</strong></li>
                                @if(Route::current()->getName() =='mantenimiento.request')
                                    <li id="order"><strong>4. NUEVA COTIZACIÓN</strong></li>
                                    <li id="final"><strong>5. RESUMEN DE MANTENIMIENTO</strong></li>
                                    <li id="confirm"><strong>6. TERMINAR</strong></li>
                                @else                                
                                    <li id="final"><strong>4. RESUMEN DE MANTENIMIENTO</strong></li>
                                    <li id="confirm"><strong>5. TERMINAR</strong></li>

                                @endif
                            </ul> <!-- fieldsets -->

                            <!-- INFORMACION DEL DISPOSITIVO -->

                            <fieldset>
                                <div class="form-card">
                                    <h3 class="fs-title">INFORMACIÓN GENERAL DISPOSITIVO</h3>
                                    <div class="form-group">
                                        <label for="cliente">A.1 Cliente: </label>
                                        <input class="form-control" type="text" name="cliente" id="cliente" placeholder="Ingresa cliente" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$servicio->ordenServicio->cliente->id. ' - '.$servicio->ordenServicio->cliente->nombre_cliente." ".$servicio->ordenServicio->cliente->apellido_paterno." ".$servicio->ordenServicio->cliente->apellido_materno}}" disabled>
                                        <input id="cliente_id" name="cliente_id" type="hidden">
                                        <input class="form-control" type="text" name="tipo" id="tipo" placeholder="Ingresa el tipo de dispositivo" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $servicio->dispositivo->tipoDispositivo->tipo_dispositivo }}" disabled>
                                        <input id="tipoDispositivo_id" name="tipoDispositivo_id" type="hidden">
                                    </div>
                                        
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="numSerie" id="numSerie" placeholder="No. de serie" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $servicio->dispositivo->numSerie }}" disabled />
                                        <input type="text" class="form-control" name="nombre_dispositivo" id="nombre_dispositivo" placeholder="Nombre" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $servicio->dispositivo->nombre_dispositivo }}" disabled/>
                                        <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $servicio->dispositivo->marca }}" disabled />
                                        <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{ $servicio->dispositivo->modelo }}" disabled/>
                                    </div>     
                                </div>
                                <a class="action-button-previous" href="{{route('mantenimiento.index')}}" type="button">Cancelar</a>
                                <input type="button" name="next" class="next action-button" value="Siguiente" />
                            </fieldset>                          
                            <!-- MANTENIMIENTO PREVENTIVO -->
                            <fieldset>
                                <div class="form-card">
                                    <h3 class="fs-title">MANTENIMIENTO PREVENTIVO</h3>
                                    <div class="form-group">
                                    <input type="text" class="form-control" name="actividad" id="actividad" placeholder="Actividad" onkeyup="javascript:this.value=this.value.toUpperCase();" />
                                    <label>Descripción:</label>
                                    <textarea name="descripcionActividad" id="descripcionActividad" rows="5" cols="20" onkeyup="javascript:this.value=this.value.toUpperCase();"></textarea>
                                    <label >Listar los insumos utilizados en el mantenimiento (separar por comas ',').</label>
                                        <input type="text" class="form-control" name="insumosUtilizados" id="insumosUtilizados" placeholder="Insumos Utilizados" onkeyup="javascript:this.value=this.value.toUpperCase();" />
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Anterior" />
                                <input type="button" name="next" class="next action-button" value="Siguiente" />
                            </fieldset>

                            <!-- MANTENIMIENTO CORRECTIVO -->
                            <fieldset>
                                <div class="form-card">
                                    <h3 class="fs-title">MANTENIMIENTO CORRECTIVO</h3>
                                    <div class="form-group">
                                        <label>Software Actual</label>
                                    <input type="text" class="form-control" name="softwareActual" id="softwareActual" onkeyup="javascript:this.value=this.value.toUpperCase();" />
                                    <label>Hardware Actual Actual</label>
                                    <input type="text" class="form-control" name="hardwareActual" id="hardwareActual"onkeyup="javascript:this.value=this.value.toUpperCase();" />                                                                            
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Anterior" />
                                <input type="button" name="next" class="next action-button" value="Siguiente" />
                            </fieldset>         
                            <!-- Nueva cotización para aprobar solo en caso de solicitud-->
                            @if(Route::current()->getName() =='mantenimiento.request') 
                            <fieldset>
                                <div class="form-card"> 
                                    <h3 class="fs-title">NUEVA COTIZACIÓN</h3> 
                                    <div class="form-group">
                                        <label>Costo Estimado</label>
                                        <input type="text" name="costo_estimado" disabled value="{{ $servicio->ordenServicio->costo_estimado }}"> 
                                        <label>Costo Nueva Cotización</label>        
                                        <input type="number" class="form-control" name="costoFinal1" id="costoFinal1" step="0.01" placeholder="Costo nueva cotización"/>
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Anterior" />
                                <input type="button" name="next" class="next action-button" value="Siguiente" />                                                                        
                            </fieldset>  
                            @endif                                      
                            <!-- RESUMEN DEL SERVICIO -->
                            <fieldset>
                                <div class="form-card">
                                    <h3 class="fs-title">RESUMEN DE MANTENIMIENTO</h3>
                                    <div class="form-group">
                                        <div class="container">
                                            <label><b>Mantenimiento Preventivo:</b></label>
                                            <input type="text" id="actividad2" disabled/>
                                            <input type="text" id="descripcionActividad2" disabled/>
                                            <input type="text" id="insumosUtilizados2" disabled/>
                                            <label><b>Mantenimiento Correctivo:</b></label>
                                            <input type="text" id="softwareActual2" disabled/>
                                            <input type="text" id="hardwareActual2" disabled/>
                                            @if(Route::current()->getName() =='mantenimiento.request')
                                                <label>Nueva Cotización</label>
                                                <input type="text" name="costoFinal" id="costoFinal" disabled>
                                            @elseif(Route::current()->getName() =='mantenimiento.edit')
                                            <input type="hidden" name="costoFinal" id="costoFinal" value="{{ $servicio->ordenServicio->costo_estimado }}"> 
                                            @endif                                            

                                            <input type="hidden" name="servicio_id" id="servicio_id" value="{{ $servicio->id }}">
                                            <input type="hidden" name="vista" id="vista" value="@if(Route::current()->getName() =='mantenimiento.request')1 @elseif(Route::current()->getName() =='mantenimiento.edit')2 @endif">
                                        </div>                                
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Anterior" />
                                <input type="submit" name="make_payment" class="next action-button" value="@if(Route::current()->getName() =='mantenimiento.request') Solicitar @elseif(Route::current()->getName() =='mantenimiento.edit') Terminar @endif"/>
                            </fieldset>

                            <!-- FINAL -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">¡LISTO!</h2> <br><br>
                                    {{-- <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                    </div> <br><br> --}}
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>MANTENIMIENTO REALIZADO</h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- <div class="form-group">
  <label for=""></label>
  <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
  <small id="helpId" class="form-text text-muted">Help text</small>
</div> --}}

@section('scripts')
<script type="text/javascript">

$(document).ready(function () {
    $("#cliente").keyup(function () {
        var value = $(this).val();
        $("#cliente2").val(value);
    });
    $("input[name=tipo]").change(function() {
        let name;
        let valor;
        let dataString = $('#tipo').val();
        separador = " ", // un espacio en blanco
        limite    = 1,
        arregloTipo = dataString.split(separador, limite);
        $("#tipoDispositivo_id").val(arregloTipo);
    });
    $("#actividad").keyup(function () {
        var value = $(this).val();
        $("#actividad2").val("Actividad: "+value);
    });
    $("#descripcionActividad").keyup(function () {
        var value = $(this).val();
        $("#descripcionActividad2").val("Descripción: "+value);
    }); 
    //control de estados de mantenimiento                
    $("#insumosUtilizados").keyup(function () {
        var value = $(this).val();
        $("#insumosUtilizados2").val("Insumos: "+value);
    });    
    $("#softwareActual").keyup(function () {
        var value = $(this).val();
        $("#softwareActual2").val("Software Actual: "+value);
    });  
    $("#hardwareActual").keyup(function () {
        var value = $(this).val();
        $("#hardwareActual2").val("Hardware Actual: "+value);
    }); 
@if(Route::current()->getName() == 'mantenimiento.request')  
    $("#costoFinal1").keyup(function () {
        var value = $(this).val();
        $("#costoFinal").val(value);
    });  
@endif             
//here 
    $("input[name=cliente]").change(function() {
        let name;
        let valor;
        let dataString = $('#cliente').val();
        separador = " ", // un espacio en blanco
        limite    = 1,
        arregloDeSubCadenas = dataString.split(separador, limite);
        $("#cliente_id").val(arregloDeSubCadenas);
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
<script>
    $(document).ready(function() {
        var iCnt = 0;

        // Crear un elemento div añadiendo estilos CSS
        var container = $(document.createElement('div'));

        $('#btAdd').click(function() {
            if (iCnt <= 19) {

            iCnt = iCnt + 1;

            // Añadir caja de texto.
            $(container).append('<input type="text" class="form-control" name="nombre_software" id="nombre_software" placeholder="Nombre software" onkeyup="javascript:this.value=this.value.toUpperCase();" />');
            $(container).append('<label>¿Tiene licencia?</label>');
            $(container).append('<select class="form-control" name="licencia" id="licencia">s<option value="" disabled selected>Selecciona opción</option><option value="1">Sí</option><option value="0">No</option></select>');
            $(container).append('<hr>');

            $('#listaSoftware').after(container);
            }
            else { //se establece un limite para añadir elementos, 20 es el limite

            $(container).append('<label>Limite Alcanzado</label>');
            $('#btAdd').attr('class', 'bt-disable');
            $('#btAdd').attr('disabled', 'disabled');

            }
        });

        
    });

</script>
@endsection