@extends('layouts.master')
@section('title')
    @lang('Nueva Propuesta de Servicio')
@endsection
@section('css')
    {{-- select2 Css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" integrity="sha384-OXVF05DQEe311p6ohU11NwlnX08FzMCsyoXzGOaL+83dKAb3qS17yZJxESl8YrJQ" crossorigin="anonymous">
    {{-- select2 bootstrap theme --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" integrity="sha384-IrMr0LFnIMa9H6HhC5VVqVuWNEIwspnRLKQc0SUyPj4Cy4s02DiWDZEoJOo5WNK6" crossorigin="anonymous">
    <!-- alertifyjs Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- alertifyjs default themes  Css -->
    <link href="{{ URL::asset('libs/alertifyjs/build/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- quill css -->
    <link href="{{ URL::asset('libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('libs/flatpickr/flatpickr.min.css') }}">
@endsection
@section('page-title')
@lang('Nueva Propuesta de Servicio')
@endsection
@section('breadcrumb')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('service.proposals') }}">@lang('Propuestas de Servicio')</a></li>
            <li class="breadcrumb-item active">@lang('Nueva Propuesta')</li>
        </ol>
    </div>
@endsection
@section('body')
<body data-layout="horizontal" data-topbar="dark">
@endsection
@section('content')
<div class="row align-items-center">
    <div class="col-md-6">
        <div class="mb-3">
            <h5 class="card-title">@lang('Nueva Propuesta de Servicio')</h5>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('service.proposals') }}">@lang('Propuestas de Servicio')</a></li>
                    <li class="breadcrumb-item active">@lang('Nueva Propuesta')</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3 mt-1">
            <div>
                <button type="button" id="btn-save" class="btn btn-warning">
                    <i class="bx bx-save me-1"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-h-100">
            <div class="card-body">
                <h3>PROPUESTA DE SERVICIOS</h3>
                <p class="card-title-desc mb-3">Este formato puede ajustarse según las necesidades de cada cliente</p>
                <form action="{{ route('service.proposals.store') }}" id="form-store" method="POST">
                    @csrf
                    <div class="row justify-content-between">
                        <div class="col-md-6 col-lg-4 order-md-last">
                            <div class="mb-2">
                                <label class="form-label mb-0" for="date">Fecha</label>
                                <input type="date" class="form-control" id="date" name="person_whom_addressed">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="mb-2">
                                <label class="form-label mb-0" for="person_whom_addressed">Persona a quien se dirige la propuesta</label>
                                <input type="text" class="form-control" id="person_whom_addressed" name="person_whom_addressed">
                            </div>
                        </div>
                    </div>
                    <div class="row pb-4 mb-4 border-bottom">
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label class="form-label mb-0" for="person_charge">Cargo de la persona</label>
                                <input type="text" class="form-control" id="person_charge" name="person_charge">
                            </div>
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label class="form-label mb-0" for="clients_full_name">Nombre completo del Cliente / Denominación o Razón Social</label>
                                <input type="text" class="form-control" id="clients_full_name" name="clients_full_name">
                            </div>
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <label class="form-label mb-0" for="address">Dirección</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </div>
                    </div>
                    <h5>Estimado(a): </h5>
                    <p class="mb-1">
                        En respuesta a su amable solicitud, nos permitimos presentarle la propuesta de servicios legales (la "Propuesta") que Galicia Abogados, S.C. ("Galicia") prestaría a
                    </p>
                    <div class="row mb-3 align-items-center">
                        <div class="col-12 col-xl">
                            <input type="text" id="clients_short_name" name="clients_short_name" class="form-control" placeholder="Nombre del cliente" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-md-6 col-lg-4 col-form-label">en adelante</label>
                        <div class="col-md-6 col-lg-4">
                            <input type="email" class="form-control" id="clients_short_name" placeholder="Nombre del cliente en declaración">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-md-6 col-lg-4 col-form-label">en relación con (el “Proyecto”).</label>
                        <div class="col-md-6 col-lg-6 ">
                            <input type="email" class="form-control" id="name" placeholder="Nombre de la propuesta o proyecto">
                        </div>
                    </div>
                    <p>Una vez que la presente Propuesta sea firmada o aceptada, será considerada como una carta contrato para todos los efectos legales</p>
                    <h6>I. DESCRIPCIÓN DE LOS SERVICIOS </h6>
                    <p class="text-muted">[Nota al usuario de GA: Por favor incluir un título en cada inciso o numeral, por ejemplo, due diligence, preparación de contratos, cierre, etc., o bien la etapa procesal que corresponda y siempre la descripción detallada de los servicios]</p>
                    <p>Con base en la información que hemos recibido al día de hoy, entendemos que nuestros servicios consistirán en las siguientes actividades (los “Servicios”):</p>
                    <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="[Insertar un título y descripción del Servicio. (ej. Auditoria legal, Reporte de Riesgos, Revisión Contractual y describir el alcance de los servicios)];"></textarea>
                    </div>
                    <h6>II. HONORARIOS </h6>
                    <p class="text-muted">[Nota al usuario de GA: Este apartado contiene redacciones diferentes dependiendo del tipo de cobro de honorarios, escoger la que corresponda al caso particular]</p>
                    <p class="text-muted">[Nota al usuario de GA: Usar el siguiente apartado cuando se tenga cobro por hora, seleccionar la tabla que sea aplicable]</p>
                    <p>Como la mayoría de los principales despachos, normalmente cobramos a nuestros clientes tarifas por hora por el tiempo que inviertan nuestros abogados en la prestación de los servicios. Dichas tarifas varían de acuerdo con su antigüedad y experiencia. Nuestras tarifas horarias vigentes son las siguientes: </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>CARGO</th>
                                            <th>TARIFA HORARIA <span class="fw-light">(MXN, sin incluir IVA)</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Socio</td>
                                            <td>$11,200 - $13,600</td>
                                        </tr>
                                        <tr>
                                            <td>Consultor</td>
                                            <td>$10,400</td>
                                        </tr>
                                        <tr>
                                            <td>Consejeros</td>
                                            <td>$10,200</td>
                                        </tr>
                                        <tr>
                                            <td>Asociados</td>
                                            <td>$6,000 - $10,000</td>
                                        </tr>
                                        <tr>
                                            <td>Pasantes</td>
                                            <td>$3,400 - $5,800</td>
                                        </tr>
                                        <tr>
                                            <td>Paralegal</td>
                                            <td>$2,700</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>CARGO</th>
                                            <th>TARIFA HORARIA <span class="fw-light">(USD, sin incluir IVA)</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Socio</td>
                                            <td>$620- $740</td>
                                        </tr>
                                        <tr>
                                            <td>Consultor</td>
                                            <td>$570</td>
                                        </tr>
                                        <tr>
                                            <td>Consejeros</td>
                                            <td>$545</td>
                                        </tr>
                                        <tr>
                                            <td>Asociados</td>
                                            <td>$330 - $530</td>
                                        </tr>
                                        <tr>
                                            <td>Pasantes</td>
                                            <td>$180 - $315</td>
                                        </tr>
                                        <tr>
                                            <td>Paralegal</td>
                                            <td>$145</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <p class="fst-italic">*Tarifas horarias vigentes en 2025. Galicia se reserva el derecho de ajustar o actualizar estas tarifas en cualquier momento y/o al menos de manera anual.</p>
                    <p class="text-muted">[Nota al usuario de GA: Usar el siguiente apartado cuando se tenga cobro por Cap]</p>
                    <p>No obstante lo anterior y, sujeto a las consideraciones y exclusiones que se detallan a continuación, [de acuerdo con su solicitud,] estamos dispuestos a limitar nuestros honorarios por la prestación de los Servicios a la cantidad de $[*], más IVA aplicable. [Esta cantidad considera la(s) siguiente(s) estimación(es) indicativa(s) para cada una de las secciones descritas anteriormente:</p>
                    <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Por preparación de [Insertar título del Servicio]: $[*] más IVA aplicable,"></textarea>
                    </div>
                    <p class="text-muted">[Nota al usuario de GA: Usar el siguiente apartado cuando se tenga cobro por estimado / Estimated fees]</p>
                    <p>Tomando en consideración la descripción de los Servicios y, sujeto a las consideraciones y exclusiones que se detallan a continuación, estimamos que nuestros honorarios serían los siguientes:</p>
                    <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="1.	Por los Servicios descritos en la Sección [*] denominada [insertar título del Servicio]: entre $[*] y $[*], &#10;2.	Por los Servicios descritos en la Sección [*] denominada [insertar título del Servicio]: entre $[*] y $[*].
                        "></textarea>
                    </div>
                    <p>Mensualmente le compartiremos el estatus de nuestros honorarios, a través del cual monitorearemos que el tiempo invertido se encuentre dentro de los rangos arriba descritos. En el caso de que superemos el máximo de dichos rangos, le informaremos inmediatamente para acordar mutuamente los ajustes de nuestra cotización, si procede.</p>
                    <p class="text-muted">[Nota al usuario de GA: Usar el siguiente apartado cuando se tenga cobro fijo/ Fixed Fee]</p>
                    <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Por los Servicios de [insertar título del Servicio ej. Due Dilligence, revisión de contrato, etc.]: descritos en el apartado [*] de la Descripción de los Servicios, nuestros honorarios ascenderán a la cantidad de $[*], más el IVA aplicable."></textarea>
                    </div>
                    <p class="text-muted">[Nota al usuario de GA: Usar el siguiente apartado cuando se tenga cobro fijo por Etapas. En este caso referenciar la etapa establecida en la descripción de los servicios con el fee u honorario referenciado en este apartado]</p>
                    <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="Por los Servicios descritos en el apartado [Incluir número de párrafo o inciso y el título de la etapa] de la Descripción de los Servicios, nuestros honorarios deberán pagarse de la siguiente manera:&#10;1.	$[*], más el IVA aplicable, al inicio de las actividades señaladas en el apartado [*] de la Descripción de los Servicios;&#10;2.	$[*], más el IVA aplicable, al inicio de las actividades señaladas en el apartado [*] de la Descripción de los Servicios; y&#10;3.	$[*], más el IVA aplicable, al inicio de las actividades señaladas en el apartado [*] de la Descripción de los Servicios. "></textarea>
                    </div>
                    <p class="text-muted">[Nota al usuario de GA: Usar el siguiente apartado cuando se tenga cobro de “success fee”]</p>
                    <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="En caso de [*], cobraremos un honorario de éxito de $[*], que se pagará de la siguiente manera: [*]."></textarea>
                    </div>
                    <p class="text-muted">[Plazo de Pago] [Nota al usuario de GA: los Términos y Condiciones generales ya establecen que el pago se debe realizar en 30 días. Usar esta redacción en caso de que se acuerden esquemas de pago distintos]</p>
                    <p>Nuestros honorarios deberán pagarse cuando ocurra el primero entre:</p>
                    <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="1.	El cierre de la [Transacción/Operación/Proyecto/Asunto];&#10;2.	La decisión de cualquiera de las partes de no proceder con la [Transacción/Operación/Proyecto/Asunto], o&#10;3.	Han transcurrido [*] meses desde el inicio de la prestación de nuestros Servicios. "></textarea>
                    </div>
                    <p class="text-muted">[Nota al usuario de GA: usar esta redacción cuando se tenga descuento por cancelación del asunto / busted deal discount]</p>
                    <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="Si en algún momento se cancela el [Proyecto/asunto], concederemos un descuento del [*]% sobre nuestros honorarios generados hasta ese momento (busted deal discount)."></textarea>
                    </div>
                    <h6>III. CONSIDERACIONES Y EXCLUSIONES </h6>
                    <p class="text-muted">[Nota al usuario de GA: Determinar cuáles “consideraciones y exclusiones” aplican al asunto en particular, eligiendo, adicionando o eliminando las que correspondan]</p>
                    <p>Nuestros honorarios están sujetos a que se cumplan las siguientes consideraciones y exclusiones: </p>
                    <div class="mb-4">
                        <div id="snow-editor"  nonce="newN0nc3ForS3cur1ty" style="height: 500px;">
                            <ol>
                                <li>Nuestros Servicios estarán limitados a las tareas descritas en el Apartado I. (Descripción de los Servicios) de esta Propuesta;</li>
                                <li>Los Servicios se relacionan exclusivamente con asuntos bajo las leyes de México. No expresaremos comentario u opinión respecto de cualquier otra ley distinta a las leyes mexicanas;</li>
                                <li>Lo Servicios no incluyen asesoría en materia [fiscal], mercantil, contable, financiera, de seguros o técnica. Sin embargo, en caso de requerirlo, estaríamos en posibilidad de proporcionarle una cotización de servicios para brindarle asesoría en [*] y [*];</li>
                                <li>En caso de que se requieran servicios adicionales de Galicia distintos de los mencionados en esta Propuesta, éstos serán cotizados de manera independiente;</li>
                                <li>Los documentos que se elaboren como parte de la prestación de los Servicios se redactarán en [español/inglés], y no se proporcionarán traducciones;</li>
                                <li>No será necesario realizar viajes fuera de la Ciudad de México o Monterrey;</li>
                                <li>No participaremos en la obtención de consentimientos o la realización de notificaciones a terceros que sean necesarias para el Proyecto;</li>
                                <li>Habrá una buena y eficaz cooperación entre las partes involucradas</li>
                                <li>Las dificultades no previstas pueden incrementar nuestros honorarios;</li>
                                <li>No realizaremos investigaciones, revisiones, trámites ni gestiones ante registros públicos u otras entidades;</li>
                                <li>Los honorarios y gastos de los notarios públicos, expertos (por ejemplo, traductores) y otros profesionales (que solo serán consultados o contratados según sus instrucciones o aprobación previa) se facturarán por separado. Por favor considere que podemos solicitarle el pago de los costos externos directamente a la autoridad, proveedor o profesional en cuestión;</li>
                                <li>No redactaremos más de [*] número de versiones de los documentos descritos en el Apartado I. (Descripción de los Servicios);</li>
                                <li><b>Nota al usuario de GA: [Redacción respecto al tiempo del asunto en general] </b>La prestación de nuestros Servicios no tomará más de [*] meses, a partir del momento en que se nos instruya iniciar con los mismos;] </li>
                            </ol>
                        </div> <!-- end Snow-editor-->
                    </div>
                    <h6>IV. CONTACTO</h6>
                    <p>Si tuviera alguna pregunta respecto de esta Propuesta, por favor no dude en contactar a 
                        <input type="text" class="form-control input-inline input-200px" placeholder="[Nombre del Socio]">, 
                        Socio de <input type="text" class="form-control input-inline input-200px" placeholder="[Área de práctica]">, 
                        <input type="text" class="form-control input-inline input-200px" placeholder="[correo electrónico]">, 
                        <input type="text" class="form-control input-inline input-200px" placeholder="[número telefónico: (+52) 5540 XXXX]">, 
                        quien fungirá como Socio líder de este proyecto.
                    </p>
                    <h6>V. ANEXOS</h6>
                    <p>
                        Finalmente, encontrará adjuntos a este documento el Anexo 1 que describe al equipo de Galicia que lo asistirá en el Proyecto y el Anexo 2 que contiene los Términos y Condiciones aplicables a los servicios de Galicia y a esta Propuesta.
                    </p>
                    <h6>VI. ACEPTACIÓN DE LA PROPUESTA</h6>
                    <p>En representación del <b>"Cliente"</b>, confirmo que he leído y aceptado la presente Propuesta de servicios de asesoría legal, así como todos los anexos que forman parte de la misma, incluyendo los Términos y Condiciones detallados en los mismos, los cuales se tienen por incorporados a la presente como si a la letra se insertasen. 
                        <b>Una vez que esta Propuesta sea firmada o aceptada, deberá ser considerada como una Carta Contrato para todos los efectos legales. </b>
                    </p>
                    <p>Esta Propuesta será efectiva en la siguiente fecha: <input type="date" class="form-control input-inline input-200px" placeholder="[correo electrónico]"></p>
                    <p>Nombre del firmante: <input type="text" class="form-control input-inline input-200px"></p>
                    <p>Cargo del firmante: <input type="text" class="form-control input-inline input-200px"></p>

                    <h5>ANEXO 1. EQUIPO</h5>
                    <p>Nuestro principal objetivo es garantizar que los integrantes del equipo que ponemos a su consideración tengan las habilidades y experiencia necesarias para brindarle los servicios legales requeridos.</p>
                    <p>Los Servicios serán prestados por las y los siguientes integrantes de Galicia, [*] (Socio), [*] (Asociado) y [*] (pasante). Este equipo será liderado por [*].</p>
                    <h5>ANEXO 2. TÉRMINOS Y CONDICIONES</h5>
                    <h6>Costos</h6>
                    <p>El Cliente será responsable y se compromete a pagar de manera directa, a los terceros que correspondan, todos los costos, cargos, desembolsos y gastos relacionados a la prestación de los Servicios, de manera enunciativa más no limitativa, el pago de derechos, honorarios notariales, gastos de mensajería, gastos de envíos exprés, cargos por investigaciones, traducciones, viáticos y honorarios y gastos de otros especialistas (en lo sucesivo, los “Costos”). En el supuesto de que, por excepción y previa aprobación expresa de Galicia, sea Galicia quien pague en nombre del Cliente tales Costos, el Cliente será responsable por tales pagos y deberá reembolsarlos o restituirlos a Galicia íntegramente, es decir, pagando las cantidades adicionales que se requieran para que después de que Galicia pague los impuestos correspondientes, mantenga una cantidad neta igual a la que habría recibido si Galicia no hubiera pagado los Costos. </p>
                    <p>Sin embargo, Galicia no realizará pagos en nombre del Cliente cuando se encuentren relacionados a cualquiera de las operaciones enunciadas en los incisos (a) a (e) de la fracción XI del Artículo 17 de la Ley Federal para la Prevención e Identificación de Operaciones con Recursos de Procedencia Ilícita; por ejemplo, la compraventa de bienes inmuebles o la cesión de derechos sobre estos; la constitución, escisión, fusión, operación y administración de personas morales, sociedades mercantiles o vehículos corporativos (incluido el fideicomiso); así como los relacionados con la compra o venta de entidades mercantiles.</p>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="formCheck1">
                        <label class="form-check-label" for="formCheck1">
                            Incluir Depósito de anticipo (retainer)
                        </label>
                    </div>
                    <h6>Depósito de anticipo</h6>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
    <div style='clear:both'></div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" integrity="sha384-d3UHjPdzJkZuk5H3qKYMLRyWLAQBJbby2yr2Q58hXXtAGF8RSNO9jpLDlKKPv5v3" crossorigin="anonymous"></script>
<script src="{{ URL::asset('libs/alertifyjs/build/alertify.min.js') }}" nonce="newN0nc3ForS3cur1ty"></script>
<script src="{{ URL::asset('libs/quill/quill.min.js') }}"></script>
<script src="{{ URL::asset('js/app.js') }}"></script>
<script src="{{ URL::asset('libs/flatpickr/flatpickr.min.js') }}"></script>
<script nonce="newN0nc3ForS3cur1ty" >
    $(function(){
        // Snow theme
        var quill = new Quill('#snow-editor', {
            theme: 'snow',
            modules: {
                'toolbar': [[{ 'font': [] }, { 'size': [] }], ['bold', 'italic', 'underline', 'strike'], [{ 'color': [] }, { 'background': [] }], [{ 'script': 'super' }, { 'script': 'sub' }], [{ 'header': [false, 1, 2, 3, 4, 5, 6] }, 'blockquote', 'code-block'], [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }], ['direction', { 'align': [] }], ['link', 'image', 'video'], ['clean']]
            },
        });
        flatpickr('#proposal_date');
        $('#client_id').select2({ theme: 'bootstrap-5' });
        $('#practice_area_id').select2({ theme: 'bootstrap-5' });
        $('#responsible_partner_id').select2({ theme: 'bootstrap-5' });
        $('#btn-save').click(function (e) {
            e.preventDefault();
            $('#form-store').submit()
        })
        $('#form-store').submit(function (e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            Swal.fire({
                icon: 'info',
                title: 'Espera un momento',
                html: 'Estamos procesando la información',
                didOpen: function() {
                    Swal.showLoading()
                },
            });
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    Swal.close();
                    alertify.success('Se ha guardado correctamente');
                    setTimeout(() => {
                        location.href = '/service-proposals/' + data.id + '/edit';
                    }, 1000);
                },
                error: function(request, error) {
                    Swal.close();
                    alertify.error('Ocurrió un error al guardar');
                }
            });
        })
    });
</script>
@endsection
