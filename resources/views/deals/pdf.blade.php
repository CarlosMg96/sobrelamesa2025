<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style nonce="newN0nc3ForS3cur1ty" >
        * {
            font-family: 'Fira Sans', serif !important;
        }

        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Gelasio', serif !important;
            color: #000000;
        }

        .logo-header {
            /* margin-top: -20px; */
            /* margin-left: -20px; */
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        .formato-info {
            background-color: #ebebeb;
            padding: 2rem;
            line-height: 1.6;
            max-width: 800px;
            margin: auto;
            font-size: 24px;
        }

        .formato-info p {
            margin-bottom: .5rem;
        }

        .formato-info strong {
            font-weight: bold;
        }

        .formato-info em {
            font-style: italic;
        }

        .h2 {
            font-size: 1.5rem;
            font-family: 'Gelasio', serif !important;
            margin-bottom: 1rem;
            margin-top: 1rem;
            font-weight: bold;
        } 

        .email {
            background-color: #fff3cd;
            padding: 0.2rem 0.4rem;
            border-radius: 4px;
        }

        .table-striped tbody tr:nth-child(even) {
            background-color: #ebebeb;
        }
        td, th {
            padding: 20px 15px;
            text-align: left;
            font-size: 26px;
        }
        th {
            border-right: 1px solid #979797;
        }
    </style>
</head>

<body>
    <table class="logo-header">
        <tr>
            <td class="text-center">
                @if (app()->environment('local'))
                <img src="images/galicia-logo-bk.png" alt="GALICIA Logo"
                     nonce="newN0nc3ForS3cur1ty" style="width: 200px; height: auto; margin-bottom: 20px; text-align: center;">
                @else
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents('images/galicia-logo-bk.png')) }}" alt="GALICIA Logo"
                 nonce="newN0nc3ForS3cur1ty" style="width: 200px; height: auto; margin-bottom: 20px; text-align: center;">
                @endif
            </td>
        </tr>
    </table>
    <table  nonce="newN0nc3ForS3cur1ty" style="width: 100%;">
        <thead>
            <tr>
                <td>
                    <h1 class="text-center"> Deal Report 2024 </h1>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="formato-info">
                        <p>
                            La información solicitada en este formato es necesaria para la debida recopilación de
                            información de todos los asuntos que cierran las áreas de práctica.
                        </p>
                        <p>
                            Las secciones marcadas con <strong>*asterisco son obligatorias</strong> y el <strong>mínimo
                                de palabras, en algunos casos, es requisito indispensable</strong> para contar con la
                            información necesaria en varios procesos de promoción y marketing con publicaciones, en
                            redes sociales y reportes de asuntos por área de práctica y equipos involucrados.
                        </p>
                        <p>
                            En caso de que se requiera mayor contexto para la debida promoción del asunto autorizado
                            para ello en este formato, o información adicional por cambios en los formatos de
                            <em>submissions</em> y nominaciones a <em>DofY Awards</em>, nos pondremos en contacto con
                            los líderes responsables.
                        </p>
                        <p>
                            <strong>Les pedimos enviar este formato debidamente completado al correo <span
                                    class="email">apoyoprofesional@galicia.com.mx</span>, dentro de los 5 (cinco) días
                                siguientes a cada cierre.</strong>
                        </p>
                    </div>
                </td>
            </tr>
        </thead>
    </table>

    <h2 >Información Requerida</h2>
    <table  nonce="newN0nc3ForS3cur1ty" style="width: 100%;" class="table-striped" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <th  nonce="newN0nc3ForS3cur1ty" style="width: 37%">Practice Area(s)</th>
                <td>{{ $deal->practices_areas->pluck('name')->join(', ') }}</td>
            </tr>
            <tr>
                <th>Asunto para registro en Oficina de</th>
                <td>{{ collect($deal->branches)->join(', ') }}</td>
            </tr>
            <tr>
                <th>Name of Deal</th>
                <td>{{ $deal->name }}</td>
            </tr>
            <tr>
                <th>Send to publications</th>
                <td>{{ $deal->send_publications ? 'Yes' : 'No'}}</td>
            </tr>
            <tr>
                <th>Authorized for publications by</th>
                <td>--</td>
            </tr>
            <tr>
                <th>Confidential</th>
                <td>{{ $deal->confidential ? 'Yes' : 'No'}}</td>
            </tr>
            <tr>
                <th>Client</th>
                <td>{{ $deal->clients->pluck('name')->join(', ') }}</td>
            </tr>
            <tr>
                <th>Client Referees/Contacts</th>
                <td></td>
            </tr>
            <tr>
                <th>Summary of deal</th>
                <td>{{ $deal->summary }}</td>
            </tr>
            <tr>
                <th>For publication in Social Media/Galicia News?:</th>
                <td>{{ $deal->publication_in_social_media ? 'Yes' : 'No'}}</td>
            </tr>
            <tr>
                <th>Deal Size</th>
                <td>{{ $deal->deal_size }}</td>
            </tr>
            <tr>
                <th>Highlights, why this deal is relevant, innovative, first-of- its-kind, has ESG components, or other:</th>
                <td>{{ $deal->highlights }}</td>
            </tr>
            <tr>
                <th>This deal should be considered for nominations to DofY Awards?</th>
                <td>{{ $deal->nomination_dofy_awards ? 'Yes' : 'No'}}</td>
            </tr>
            <tr>
                <th>Lead Partner(s)</th>
                <td>{{ $deal->partners->filter(function ($partner) {
                    return $partner->pivot->is_lead;
                })->pluck('name')->join(', ') }}</td>
            </tr>
            <tr>
                <th>Other team members</th>
                <td>{{ $deal->partners->filter(function ($partner) {
                    return !$partner->pivot->is_lead;
                })->pluck('name')->join(', ') }}</td>
            </tr>
            <tr>
                <th>Partners’ role/contribution</th>
                <td></td>
            </tr>
            <tr>
                <th>Client’s General Counsel</th>
                <td></td>
            </tr>
            <tr>
                <th>Supporting law firms</th>
                <td></td>
            </tr>
            <tr>
                <th>Supporting banks</th>
                <td></td>
            </tr>
            <tr>
                <th>Date of completion</th>
                <td>{{ $deal->date_completion }}</td>
            </tr>
            <tr>
                <th>Is this cross border?</th>
                <td>{{ $deal->is_cross_border ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th>Links to press coverage</th>
                <td>{{ $deal->link_press_converage }}</td>
            </tr>
        </tbody>
    </table>
    <h2 class="text-center"  nonce="newN0nc3ForS3cur1ty" style="margin-top: 50px;">
        Solo asuntos de M&A
    </h2>
    <p>Para cada parte involucrada en la transacción, y su asesor, favor de llenar la siguiente información</p>
    <p>Please use the template below for each party involved (if multiple parties are involved, copy-paste and complete)</p>
    <table  nonce="newN0nc3ForS3cur1ty" style="width: 100%; margin-botom: 50px;" class="table-striped" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <th  nonce="newN0nc3ForS3cur1ty" style="width: 37%">1) Name of Party</th>
                <td></td>
            </tr>
            <tr>
                <th> Role: (Buyer, seller, target or other)</th>
                <td></td>
            </tr>
            <tr>
                <th>In-house Counsel Team on the deal:</th>
                <td></td>
            </tr>
            <tr>
                <th>External counsel:
                    (Submit details of each law firm that advised that party, the country in which it is based, and the names and titles of lawyers working on the deal)</th>
                <td>{{ $deal->send_publications ? 'Yes' : 'No'}}</td>
            </tr>
        </tbody>
    </table>
    <table  nonce="newN0nc3ForS3cur1ty" style="width: 100%; margin-top: 60px;" class="table-striped" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <th  nonce="newN0nc3ForS3cur1ty" style="width: 37%">2) Name of Party</th>
                <td></td>
            </tr>
            <tr>
                <th> Role: (Buyer, seller, target or other)</th>
                <td></td>
            </tr>
            <tr>
                <th>In-house Counsel Team on the deal:</th>
                <td></td>
            </tr>
            <tr>
                <th>External counsel:
                    (Submit details of each law firm that advised that party, the country in which it is based, and the names and titles of lawyers working on the deal)</th>
                <td>{{ $deal->send_publications ? 'Yes' : 'No'}}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
