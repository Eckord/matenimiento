<!DOCTYPE html>
<html>
<title>RESUMEN ORDEN DE SERVICIO</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
            font-family: arial;
            border-collapse: collapse;
            width:100%;
        }
        td,th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #dddddd;
        }
        textarea {
            font-family: arial;
        }
        .licencia {
            color: red;
        }
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 30px; /* Should be removed. Only for demonstration */
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .subraya {
            text-decoration: underline;
        }
        p {
            text-align: justify;
        }

        h2 {
            text-align: center;
        }
        .centro {
            text-align: center;
        }


    </style>
</head>
<body>
    <div class="form-card">
        <h2>RESUMEN DE ORDEN</h2>
        <div class="form-group">
            <div class="container">
                <label>CLIENTE: {{$servicios->ordenServicio->cliente->nombre_cliente." ".$servicios->ordenServicio->cliente->apellido_paterno." ".$servicios->ordenServicio->cliente->apellido_materno }}</label>  
                <hr>
                <label>TIPO DE DISPOSITIVO: {{ $servicios->dispositivo->tipoDispositivo->tipo_dispositivo }}</label>
                <hr>
                <label> DATOS DEL DISPOSITIVO: </label> <br>
                <table>
                    <thead>
                        <tr role="row">
                            <th scope="col">Atributo</th>
                            <th scope="col">Descripción</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>Núm serie</td>
                                <td>{{ $servicios->dispositivo->numSerie }}</td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td>{{ $servicios->dispositivo->nombre_dispositivo}}</td>
                            </tr>
                            <tr>
                                <td>Marca</td>
                                <td>{{ $servicios->dispositivo->marca}}</td>
                            </tr>
                            <tr>
                                <td>Modelo</td>
                                <td>{{ $servicios->dispositivo->modelo}}</td>
                            </tr>
                    </tbody>
                </table>
                <hr>
                <label>SOFTWARE EN EQUIPO: </label><br>
                <textarea>{{ $servicios->dispositivo->software->nombre_software }} </textarea>
                @if ($servicios->dispositivo->software->licencia == 1 ) 
                    <label class="licencia">* TIENE LICENCIA EN TODO EL SOFTWARE ENLISTADO</label>
                @else
                    <label class="licencia">* NO TIENE LICENCIA EN NINGUN SOFTWARE</label>
                @endif

                <hr>
                <label> ESTADO DEL DISPOSITIVO: </label> <br><br>
                <table>
                    <thead>
                        <tr role="row">
                            <th scope="col">Característica</th>
                            <th scope="col">Estado</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>¿Enciende?</td>
                                @switch(true)
                                    @case($servicios->dispositivo->estadoDispositivo->enciende  == 1)
                                        <td>ENCIENDE CORRECTAMENTE</td>
                                        @break
                                    @case($servicios->dispositivo->estadoDispositivo->enciende  == 2)
                                        <td>NO APLICA A ESTE DISPOSITIVO </td>
                                        @break
                                    @case($servicios->dispositivo->estadoDispositivo->enciende  == 0)
                                        <td>NO ENCIENDE</td>
                                        @break
                                @endswitch
                            </tr>
                            <tr>
                                <td>¿Colores correctos?</td>
                                @switch(true)
                                    @case($servicios->dispositivo->estadoDispositivo->colores_correctos  == 1)
                                        <td>COLORES CORRECTOS</td>
                                        @break
                                    @case($servicios->dispositivo->estadoDispositivo->colores_correctos  == 2)
                                        <td>NO APLICA A ESTE DISPOSITIVO </td>
                                        @break
                                    @case($servicios->dispositivo->estadoDispositivo->colores_correctos  == 0)
                                        <td>COLORES INCORRECTOS</td>
                                        @break
                                @endswitch
                            </tr>
                            <tr>
                                <td>¿Botones completos?</td>
                                @if ($servicios->dispositivo->estadoDispositivo->botones_completos  == 1 )
                                    <td>BOTONES COMPLETOS</td>
                                @else 
                                    <td>BOTONES INCOMPLETOS</td>
                                @endif
                            </tr>
                            <tr>
                                <td>¿Se encuentra golpeado?</td>
                                @if ($servicios->dispositivo->estadoDispositivo->golpeado  == 1 )
                                    <td>SE ENCUENTRA GOLPEADO</td>
                                @else
                                    <td>NO SE ENCUENTRA GOLPEADO</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Condiciones físicas</td>
                                <td>{{ $servicios->dispositivo->estadoDispositivo->condiciones_fisicas }}</td>
                            </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="column">
                        <label>SISTEMA OPERATIVO: </label><label class="subraya">{{ $servicios->dispositivo->estadoDispositivo->sistema_operativo }}</label>
                    </div>
                    <div class="column">
                        <label>CONTRASEÑA DEL EQUIPO: </label><label class="subraya">{{ $servicios->dispositivo->estadoDispositivo->contrasenia }}</label>
                    </div>
                </div>
                <hr>
                <label>DIAGNÓSTICO Y COSTO: </label>
                <textarea type="text" id="diagnostico_rapido2" rows="5" cols="20" disabled>{{ $servicios->ordenServicio->diagnostico_rapido }}</textarea>
                <div class="row">
                    <div class="column">
                        <label>FECHA ENTREGA: {{ $servicios->seguimientoOrden->fecha_entrega->format('d-m-Y') }}</label>
                    </div>
                    <div class="column">
                        <label style="color:red;">COSTO ESTIMADO: $ {{ $servicios->ordenServicio->costo_estimado }}</label>
                    </div>
                </div>
            </div>
            <hr>
            <h2>AVISO DE PRIVACIDAD</h2>
            <div>
                
                    <p>De acuerdo con lo establecido en la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, <b>NOMBRE EMPRESA</b>
                    pone a su disposición el siguiente aviso de privacidad.</p>

                    <p><b>NOMBRE EMPRESA</b>, es responsable del uso y protección de sus datos personales, en este sentido y atendiendo las obligaciones legales
                    establecidad en la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, a través de este instrumento se 
                    informa a los titulares de los datos, la información que de ellos se recaba y los fines que se le darán a dicha información.</p>

                    <p>Además de lo anterior, informamos a usted que <b>NOMBRE EMPRESA</b> , tiene su domicilio ubicado en <b>CALLE FRIDA KAHALO, 20; COL. LOMAS DE ORO,
                    CP. 91190, XALAPA, VER.</b></p>

                    <p>Los datos personales que recabamos de usted serán utilizados para las siguientes finalidades, las cuales son necesarias para concretar
                    nuestra relación con usted, así como para atender los servicios y/o pedidos que solicite:</p>

                    <b>
                        <ul>
                            <li type="square">Brindar el servicio de mantenimiento correctivo y/o preventivo de sus equipos de cómputo.</li>
                        </ul>
                    </b>

                    <p>Para llevar a cabo las finalidades descritas en el presente aviso de privacidad, utilizaremos los siguientes datos personales:
                    <b>
                        <ul>
                            <li type="square">Nombre completo.</li>
                            <li type="square">Calle y número.</li>
                            <li type="square">Colonia.</li>
                            <li type="square">Código postal.</li>
                            <li type="square">Teléfono de casa y celular.</li>
                            <li type="square">Correo electrónico.</li>
                        </ul>
                    </b>
                    </p>

                    <p>Por otra parte, informamos a usted, que sus datos personales no serán compartidos con ninguna autoridad, empresa, organización o 
                    persona distintas a nosotros y serán utilizados exclusivamente para los fines señalados.</p>

                    <p>Usted tiene en todo momento el derecho a conocer qué datos personales tenemos de usted, para qué los utilizamos y las condiciones del uso
                    que les damos (Acceso). Asímismo, es su derecho solicitar la corrección de su información personal en caso de que esté desactualizada,
                    sea inexacta o incompleta (Rectificación); de igual manera, tiene derecho a que su información se elimine de nuestros registros o bases de
                    datos cuando considere que la misma no está siendo utilizada adecuadamente (Cancelación); así como también a oponerse al uso de sus datos 
                    personales para fines específicos (Oposición). Estos derechos se conocen como derechos ARCO.</p>

                    <p>Por el ejercicio de cualquiera de los derechos ARCO, se deberá presentar la solicitud resepctiva a través del correo electrónico CORREO@CORREO.COM,
                    con la finaidad de conocer el procedimiento y requisitos para el ejercicio de los derechos ARCO, no obstante, la soliciutd de ejercicio de
                    estos derechos debe contener la siguiente información:</p><br> 
                    <b>
                        <ul>
                            <li type="square">Nombre completo.</li>
                            <li type="square">Teléfonos de contacto.</li>
                            <li type="square">Motivo de la solicitud.</li>
                        </ul>
                    </b>
                    <p>La respuesta a la solicitud se dará en el siguiente plazo: máximo <b>15 días hábiles</b>, y se comunicará a través del correo electrónico proporcionado en
                    la solicitud. Los datos de contacto de la persona o departamento de datos personales, que está a cargo de dar trámite a las solicitudes de derechos
                    ARCO, son los siguientes:</p>

                    <ol>
                        <li value="a">Nombre del responsable:<b> NOMBRE DEL RESPONSABLE</b></li>
                        <li>Domicilio:<b> Calle Frida Kahalo, 20; Col. Lomas de Oro, CP. 91190; Xalapa, Ver.</b></li>
                        <li>Teléfono: <b>PONER TELÉFONO</b></li>
                        <li>Correo electrónico: <b>pruebainfo@test.com </b></li>
                    </ol>
                    <p>Cabe mencionar, que en cualquier momento usted puede revocar su consentimiento para el uso de sus datos personales. Del mismo modo, usted puede revocar
                    el consentimiento que, en su caso, nos haya otorgado para el tratamiento de sus datos personales. Asímismo, usted deberá considerar que para ciertos
                    fines la revocación de su consentimiento implicará que no podamos seguir prestando el servicio que nos solicitó, o la conclusión de su relación con
                    nosotros.</p> 

                    <p>Para revocar el consentimiento que usted otorga en este acto o para limitar su divulgación, se deberá presentar la solicitud respectiva a través del
                    correo electrónico <b>CORREO</b>. Del mismo modo, podrá solicitar la información para conocer el procedimiento y requisitos para la revocación del
                    consentimiento, así como limitar el uso y divulgación de su información personal.</p>

                    <p>En cualquier caso, la respuesta a las peticiones se dará a conocer en el plazo de <b>15 días hábiles</b>. Por cambios en nuestro modelo de negocio, o por otras 
                    causas, nos comprometemos a mantenerlo informado sobre las modificaciones que pueda sufrir el presente aviso de privacidad, sin embargo, usted puede
                    solicitar información sobre si el mismo ha sufrido algún cambio a través del correo electrónico <b>CORREO</b>. </p>
                <br><br><br><br>
                <p class="centro">__________________________________________________</p>
                <p class="centro">Nombre y firma del titular de los datos personales</p>
            </div>



        </div>
    </div>
</body>
</html>



