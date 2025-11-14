@extends('layouts.master')

@section('title')
    Reglamento estacionamiento | Galicia App
@endsection

@section('css')
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/parking_regulation.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <style nonce="newN0nc3ForS3cur1ty" >
        body[data-topbar=dark] .page-content{
            padding: 0px !important;
        }
        body{
            background-color:rgb(255, 198, 53) !important;
        }
        .page-content .container-fluid{
            max-width: 100% !important;
        }
        .container-fluid, .container-sm, .container-md, .container-lg, .container-xl, .container-xxl{
            padding: 0px !important;
        }
        .bg-color{
            background-color: #1D1D1D;
            border: none;
            border-radius: 0px;
        }
    </style>
@endsection

@section('body')
    <body data-topbar="dark" >
@endsection

@section('content')

<!-- Header -->
<header class="header">
    <div class="header-container">
        <div class="header-logo">
            <img src="{{ asset('images/galicia-dark-logo.svg') }}" alt="Galicia Logo" class="logo-image">
        </div>
    </div>
</header>

<div class="parking-regulation-container">

<!-- Hero -->
<section class="hero bg-yellow">
    <div class="container">
        <div class="hero-content">
            <div class="typewriter-text" id="typewriter" data-aos="fade-up">#AppGalicia</div>
            <h2 class="hero-subtitle" data-aos="fade-down">Reglamento estacionamiento
                        <br> SOMA CHAPULTEPEC</h2>
        </div>
    </div>
</section>
    <section class="section-white">
        <div class="container">
            <div class="row">
                <div class="col-12 content-box">

                    <h2 class="text-black heading-lg mb-3" data-aos="fade-up">Reglamento estacionamiento privado</h2>
                    <br>
                    <p class="text-black text-md mb-3" data-aos="fade-up">
                        Para el caso de automóviles de visitantes, el acceso al estacionamiento será mediante el valet parkin que se encuentra en el motor lobby.
                    </p>
                    
                    <p class="text-black text-md mb-4" data-aos="fade-up">
                        En su carácter de usuario del estacionamiento de <strong>SOMA CHAPULTEPEC</strong> el tenedor de este servicio acepta por este hecho sujetarse en estricto sentido a las normas, políticas, y reglamentos de operación y seguridad que para tal fin se establezcan, debiendo observar las siguientes disposiciones, o pena de la suspensión temporal o definitiva del servicio de estacionamiento.
                    </p>
                   
                    <ol class="text-md text-black" data-aos="fade-up">
                            <li class="mb-1">Para el íngreso a los estacionamientos, cada conductor deberá polar su tarjeta de empleado y pasar la tarjeta de estacionamiento autorizada e intransferible frente a la lectora.</li>
                            <li class="mb-1">En caso de que el dueño de la tarjeta cambie de vehículo, deberá de notitcarlo a la Administración del edińcio o de o contrario se deberá de atener a la pena correspondiente.</li>
                            <li class="mb-1">En caso de extravío o pérdida de la tarjeta, se deberá reportar ínmedíatamente por escrito a la Administración del Edificio y pagar <strong>$200 mxp</strong> (doscientos pesos) por reposicíón de tarjeta.</li>
                            <li class="mb-1">Si la pérdida de la tarjeta fuera previa al ingreso del vehículo al estacionamiento deberá ingresar por la zona comercial y pagar el costo del servicio comercial de estacionamiento, si la pérdida de la tarjeta fuera posterior al ingreso del vehículo al estacionamiento deberá pagar el costo del equivalente a boleto perdido de la zona comercial del estacionamiento.</li>
                            <li class="mb-1">Todo usuario debe sujetarse a los horarios de acceso y permitir la revisión total o parcial del vehículo cuando sea requerido por el personal de seguridad. Ser cortés con sus hábitos de manejo, abstenerse de cometer faltas a la moral, ceder el paso a los peatones, circular con el cinturón de seguridad cuando el vehículo se encuentre encendido y mantener las luces del vehículo encendidas.</li>
                            <li class="mb-1">Se deben respetar los límites de velocidad y las disposiciones que marca la señalización vial. La velocidad máxima permitida dentro de los estacionamientos y en las vías de acceso al conjunto es de <strong>10 Km por hora.</strong></li>
                            <li class="mb-1">La altura máxima del estacionamiento es de <strong>2.10 mts</strong> a confirmar en caso de ingresar con un exceso de dimensiones y causar un daño deberá cubrir el importe por los daños según lo determine la administración.</li>
                            <li class="mb-1">Los vehículos deben estacionarse exclusivamente en el lugar asignado sin invadir espacios adyacentes.</li>
                            <li class="mb-1">Se debe evitar el derrame de líquidos inflamables, aceites y sustancias tóxicas o perniciosas.</li>
                            <li class="mb-1"><strong>SOMA CHAPULTEPEC</strong> no se hace responsable por daños, robo parcial o total del vehículo, ni por la pérdida de objetos dejados al interior del mismo.</li>
                            <li class="mb-1">En caso de accidente dentro del estacionamiento, <strong>SOMA CHAPULTEPEC</strong> no se hace responsable de los daños ocasionados a los vehículos y los Arrendatarios, usuarios y/o visitantes que hayan ocasionado un daño al inmueble deberán pagarlo a la Administración.</li>
                    </ol>
                    <div class="row row-info" data-aos="fade-up">
                        <p  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px;">El incumplimiento a las disposiciones del presente reglamento, dará lugar a la imposición de una sanción de acuerdo a la siguiente tabla:</p>
                        
                                <div class="col-md-6">
                                    <div class="yellow-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0; text-align: center;">
                                        <strong>FALTA</strong>
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="yellow-box">
                                        <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0; text-align: center;">
                                        <strong>SANCIÓN</strong>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="white-box h-85">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Estacionarse en lugar prohibido o no asignado.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="white-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Inmovilización del vehículo hasta el pago de la sanción de <strong>$250 mxp</strong> (doscientos cincuenta pesos).
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="white-box h-87">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Reiteración de estacionarse en lugar prohibido o no asignado.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="white-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Inmovilización del vehículo hasta el pago de la sanción de <strong>$250 mxp</strong> (doscientos cincuenta pesos) y bloqueo de la tarjeta por <strong>5 días hábiles</strong>.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Conducir en sentido contrario.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Sanción de <strong>$250 mxp (doscientos cincuenta pesos).</strong>
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Exceder límites de velocidad tanto dentro del estacionamiento como en las vías de acceso.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="white-box h-87">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Sanción de <strong>$250 mxp (doscientos cincuenta pesos).</strong>
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Exceder reiteradamente límites de velocidad en estacionamiento y/o vías de acceso.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Sanción de <strong>$250 mxp (doscientos cincuenta pesos) y bloqueo de la tarjeta por 5 días hábiles.</strong>
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="white-box h-95">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Dañar con el vehículo las instalaciones.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Prohibición temporal del acceso del vehículo al área de estacionamiento, dependiendo de la gravedad según determine la comisión de Administración y la empresa a la cual el implicado pertenezca. El usuario que haya ocasionado el daño tendrá que cubrir los gastos correspondientes a la reparación del mismo según lo establezca la Administración del Estacionamiento.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="white-box h-95">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Causar un accidente o poner en riesgo la integridad de otras personas y de sí mismo.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Prohibición temporal del acceso del vehículo al área de estacionamiento, dependiendo de la gravedad según determine la Administración del Estacionamiento. Y la empresa a la cual el implicado pertenezca. El usuario que haya ocasionado el accidente tendrá que cubrir los gastos correspondientes a la reparación del daño causado según lo establezca la Administración del Estacionamiento.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="white-box h-90">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Robo de autopartes, intento de robo de vehículos o daño intencional de los demás vehículos.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Prohibición definitiva del acceso del vehículo al área de estacionamiento, si se comete una infracción, según determine la Administración del Estacionamiento y la empresa a la cual el implicado pertenezca, se dará parte a las autoridades.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="white-box h-90">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Conducir bajo el influjo del alcohol o drogas.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Prohibición temporal del acceso del vehículo al área de estacionamiento, dependiendo de la gravedad según determine la Administración del Estacionamiento y la empresa a la cual el implicado pertenezca.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box h-90">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Falta a la moral.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Prohibición temporal del acceso del vehículo al área de estacionamiento, dependiendo de la gravedad según determine la Administración del Estacionamiento y la empresa a la cual el implicado pertenezca.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box h-90">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Derrame de aceite,anticongelante.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        En caso de que el vehículo derrame aceite, anticongelante o cualquier liquido relacionado con la mecánica del vehículo en su cajón de estacionamiento o en las áreas de circulación deberá pagar el impone de <strong>$25O mxp</strong> (doscientos cincuenta pesos).
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box h-87">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Ingresar o intentar ingresar o retirar dos vehículos con la misma tarjeta.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Sanción de<strong>$25O mxp</strong> (doscientos cincuenta pesos) y bloqueo de la tarjeta por 5 días hábiles.
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box h-90">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Bloqueo del montacargas
                                    </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="white-box">
                                    <p class="text-black"  nonce="newN0nc3ForS3cur1ty" style="font-size: 14px; margin: 0;">
                                        Aviso verbal y por escrito que en caso de reincidir aplicará una sanción por la cantidad de <strong>$250 mxp</strong> (doscientos cincuenta pesos) más las reparaciones de los daños ocasionados. Aviso a la Administración del Estacionamiento
                                    </p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- More Content Sections -->
    <section class="section-white">
        <div class="container">
            <div class="row">
                <div class="col-12 content-box">
                    
                    <h4 class="text-black heading-lg mb-3" data-aos="fade-up">Los conductores de vehículos tienen prohibido</h4>
                    
                    <ol class="text-md text-black" data-aos="fade-up">
                            <li class="mb-1">Conducir cuando sus facultades físicas o mentales se encuentran alteradas por el influjo de bebidas alcohólicas, drogas, medicinas o cualquier estupefaciente</li>
                            <li class="mb-1">Ingresar un vehículo con la misma tarjeta, cuando ya se encuentre otro adentro.</li>
                            <li class="mb-1">Estacionarse en lugares que no les corresponde según la distribución asignada por la Administración del Corporativo SOMA CHAPULTEPEC, así como la asignación de cajones que cada arrendatario otorga a sus empleados.</li>
                            <li class="mb-1">Está prohibido circular en sentido contrario, así como en reversa, con excepción de las maniobras de entrada y salida de cajones de estacionamiento y cuando el espacio que se circule no sea mayor a la longitud del vehículo que lo realice.</li>
                            <li class="mb-1">No está permitido estacionarse en doble fila, sobre los pasos peatonales, invadiendo las líneas marcadas en el piso, en las curvas o retornos, en el motor lobby o en la bahía para el servicio de valet parking.</li>
                            <li class="mb-1">Se prohíbe el uso de equipos de audio a volumen excesivo, emplear el claxon de manera inadecuada realizando ruidos molestos u ofensivos, y emplear las luces altas del vehículo para deslumbrar.</li>
                            <li class="mb-1">Queda estrictamente prohibido efectuar competencias de cualquier tipo, entorpecer la circulación, permanecer dentro de cualquier vehículo estacionado, consumir cualquier tipo de bebidas alcohólicas dentro o fuera del vehículo o en el estacionamiento.</li>
                            <li class="mb-1">No está permitido transportar personas en el exterior del vehículo o en lugares no especificados para pasajeros, ni circular erráticamente o conducir con las puertas del vehículo deliberadamente abiertas.</li>
                    </ol>
                    <br>

                    <h4 class="text-black heading-lg mb-3" data-aos="fade-up">Ingreso de Proveedores</h4>
                    <p class="text-black text-md mb-3" data-aos="fade-up">
                        Cuando un inquilino tenga la necesidad de recibir o mandar un bien, mercancía voluminosa, servicio de comida y requiera ingresar a estacionamiento, <strong>tendrán que avisar a la Administración con un día de anticipación de lunes a viernes de 9:00 a 17:00 hrs.</strong>, mandando un correo electrónico a la Administración proporcionando los siguientes datos:
                    </p>
                    <ol class="text-md text-black mb-4" data-aos="fade-up">
                        <li class="mb-1">Nombre del Proveedor y Compañía que entregará y/o retirará mercancía.</li>
                        <li class="mb-1">Datos del vehículo (marca, color y placas).</li>
                        <li class="mb-1">Horario de entrega.</li>
                        <li class="mb-1">Especificar que ingresará y/o saldrá del Corporativo, en el caso de una salida, deberán de entregar al personal de seguridad el documento que avale dicha salida.</li>
                    </ol>
                    <p class="text-black text-md mb-3" data-aos="fade-up">
                        Se le dará acceso a Sótano 1 al área de proveedores y tendrá un <strong>tiempo límite de 45 minutos</strong>; es importante señalar que el transporte que podrá ingresar no deberá rebasar una altura fija de 2.10 mts.; el incumplimiento a esta medida en su próximo arribo no se le permitirá el acceso previo aviso al inquilino.
                    </p>
                    <p class="text-black text-md mb-3" data-aos="fade-up">
                        En el caso de proveedores que trajeran materias primas orgánicas para la preparación de alimentos en los comedores de los diferentes inquilinos del Corporativo, su ingreso deberá ser controlado con el siguiente horario:
                    </p>
                    <ol class="text-md text-black mb-4" data-aos="fade-up">
                        <li class="mb-1">De lunes a jueves, por la mañana antes de las 10:00hrs., por la tarde después de las 19:00hrs.</li>
                        <li class="mb-1">Viernes, por la mañana antes de las 10:00hrs., por la tarde después de las 17:00hrs.</li>
                        <li class="mb-1">Sábado y Domingo horario abierto</li>
                    </ol>
                    <br>

                    <h4 class="text-black heading-lg mb-3" data-aos="fade-up">Ingreso de Motos</h4>
                    <p class="text-black text-md mb-3" data-aos="fade-up">
                        Cuando un inquilino tenga la necesidad de ingresar una moto al estacionamiento del Corporativo lo podrá hacer solo si tiene derecho a un cajón dentro del mismo, esto quiere decir que tendrá que ocupar una tarjeta de acceso vehicular y deberá ocupar un cajón de estacionamiento. En caso de que el usuario no tenga derecho a un cajón de estacionamiento deberá utilizar el área asignada en el estacionamiento del hotel cubriendo el costo correspondiente y los usuarios deben evitar dejar objetos de valor en la moto ya que la Administración no se hará responsable de ellos.
                    </p>
                    <br>

                    <h4 class="text-black heading-lg mb-3" data-aos="fade-up">Ingreso de Bicicletas</h4>
                    <p class="text-black text-md mb-3" data-aos="fade-up">
                        Los usuarios deberán bajar de su bicicleta por seguridad tanto al ingresar como al salir del complejo para salvaguardar la seguridad tanto de los ciclistas en áreas vehiculares como de los peatones. Los usuarios deberán asegurar sus bicicletas mediante candado propio en las áreas destinadas (ciclo-estaciones) considerando que son para el uso de todos los visitantes del complejo por o que queda estrictamente prohibido bloquear los espacios de manera permanente o para efectos de pernocta.
                    </p>
                    <p class="text-black text-md mb-3" data-aos="fade-up">
                        Cada usuario es responsable de resguardar tanto la bicicleta como sus objetos de valor ya que la Administración no se hará responsable por objetos perdidos o el robo total o parcial de la misma. Cualquier daño generado por los usuarios a cualquier instalación, vehículo o persona derivado de la transportación de la bicicleta dentro de las instalaciones deberá ser cubierto por el propietario responsable.
                    </p>
                    <p class="text-black text-md mb-3  mb-md-5 pb-4" data-aos="fade-up">
                        En caso de incumplimiento de cualquiera de estas disposiciones dará lugar a la imposición de una sanción e incluso cortar el candado para poner en resguardo la bicicleta. (La penalización equivale a $250 mxp por día más el costo de reparación por los daños generados).
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" integrity="sha384-wziAfh6b/qT+3LrqebF9WeK4+J5sehS6FA10J1t3a866kJ/fvU5UwofWnQyzLtwu" crossorigin="anonymous"></script>
    <script src="{{ asset('js/aos-init.js') }}"></script>
@endsection

