@extends('layouts.master-without-nav')
@section('css')
<style nonce="newN0nc3ForS3cur1ty" >
@font-face {
            font-family: 'Signerica';
            src: url('{{ asset('fonts/Signerica_Fat.ttf') }}') format('truetype');
            font-weight: bold;
            font-style: normal;
            font-display: swap;
        }

        .qr-container {
    min-height: 100vh;
    width: 100vw;
    background-color: #000000; /* asegúrate que coincida */
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem 1rem;
}


.qr-card {
    background: #000000;
    padding: 3rem 2rem;
    text-align: center;
    max-width: 400px;
    width: 100%;
    color: white;
}

.logo-container {
    margin-bottom: 3rem;
}

.logo-frame {
    border: 3px solid #FFC629;
    width: 120px;
    height: 80px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 2rem;
}

.logo-text {
    font-size: 2.5rem;
    font-weight: 300;
    color: white;
    letter-spacing: -1px;
    font-family: 'Times New Roman', Times, serif;
}

.user-name {
    font-size: 2rem;
    font-weight: bold;
    color: white;
    margin-bottom: 3rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    line-height: 1.2;
}

.qr-code-container {
    margin: 3rem 0;
    display: flex;
    justify-content: center;
}

.qr-code-wrapper {
    background: white;
    padding: 1rem;
    border-radius: 4px;
    display: inline-block;
}

.tagline-container {
    margin-top: 3rem;
}

.tagline-main {
    font-size: 1.1rem;
    color: white;
    margin-bottom: 0.5rem;
    font-weight: 300;
}

.tagline-script {
    font-size: 2rem;
    color: #FFC629;
    font-family: 'Signerica', cursive;
    font-style: italic;
    font-weight: normal;
}
@media (max-width: 768px) {
    #vcard-download {
        display: none;
    }
}


/* Responsive adjustments */
@media (max-width: 480px) {
    .qr-card {
        padding: 2rem 1rem;
    }
    
    .logo-frame {
        width: 100px;
        height: 65px;
    }
    
    .logo-text {
        font-size: 2rem;
    }
    
    .user-name {
        font-size: 1.5rem;
    }
    
    .tagline-script {
        font-size: 1.5rem;
    }
}
</style>
@endsection

@section('body')
<body class="bg-color" >
@endsection

@section('content')
<div class="qr-container">
    <div class="qr-card">
        <!-- Logo Section -->
        <div class="logo-container">
           <img src="{{ asset('images/logo/logo-with-border.jpg') }}" alt="Logo"  nonce="newN0nc3ForS3cur1ty" style="width: 200px; height: 120px; object-fit: cover;" class="logo">
        </div>

        <!-- User Name -->
        <div class="user-name">{{ $user->name ?? 'Usuario no encontrado' }}</div>

        <!-- QR Code -->
        <div class="qr-code-container">
            <div class="qr-code-wrapper">
                <canvas id="qrcode"  nonce="newN0nc3ForS3cur1ty" style="display: block;"></canvas>
            </div>
        </div>

        <!-- Fallback: Botón para descargar vCard -->
        <div id="vcard-download"  nonce="newN0nc3ForS3cur1ty" style="margin-top: 2rem;">
            <a id="download-vcard-btn"
            class="btn btn-warning"
             nonce="newN0nc3ForS3cur1ty" style="color: black; font-weight: bold; padding: 0.6rem 1.2rem; border-radius: 4px; text-decoration: none;">
                Descargar contacto (.vcf)
            </a>
        </div>


        <!-- Tagline -->
        <div class="tagline-container">
            <div class="tagline-main">Legal innovative</div>
            <div class="tagline-script">thinking.</div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- App js -->
<script src="{{ URL::asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js" integrity="sha384-Dr98ddmUw2QkdCarNQ+OL7xLty7cSxgR0T7v1tq4UErS/qLV0132sBYTolRAFuOV" crossorigin="anonymous"></script>
<script nonce="newN0nc3ForS3cur1ty" >
document.addEventListener('DOMContentLoaded', function() {
    // Datos del usuario
    const user = {
        name: @json($user->name ?? ''),
        email: @json($user->email ?? ''),
        direct_number: @json($user->direct_number ?? ''),
        number: @json($user->number ?? ''),
        type_user: @json($user->type_user ?? ''),
        map_user: @json($user->map_section ?? ''),
    };

    function generateSlug(fullName) {
        const accentsMap = {
            'á': 'a', 'é': 'e', 'í': 'i',
            'ó': 'o', 'ú': 'u', 'ñ': 'n',
            'ä': 'a', 'ë': 'e', 'ï': 'i',
            'ö': 'o', 'ü': 'u'
        };
        return fullName
            .toLowerCase()
            .split('')
            .map(char => accentsMap[char] || char)
            .join('')
            .replace(/[.]/g, '')
            .replace(/[,]/g, '')
            .replace(/\s+/g, '-');
    }

    function generateVCard(user) {
        const name = user.name || '';
        const email = user.email || '';
        const phone = (user.direct_number || '').replace(/\D/g, '');
        const extension = user.number || '';
        const org = 'Galicia';
        const slug = generateSlug(name);
        const map_user = user.map_user || '';
        const floor = map_user.split('-')[0];
        const section = map_user.split('-')[1];
        const zone = floor && section ? `Piso ${floor.replace('p', '')} Sección ${section},` : '';
        const address = `Av. Campos Eliseos 204, ${zone} Polanco, Ciudad de México, C.P. 11550`;
        const url = `https://www.galicia.com.mx/links/equipo?que=${encodeURIComponent(user.type_user)}&n=${encodeURIComponent(slug)}`;
        const workPhone = '5555409202';
        const workPhoneWithExt = extension ? `${workPhone};ext=${extension}` : workPhone;

        let vcardLines = [
            'BEGIN:VCARD',
            'VERSION:3.0',
            `FN;CHARSET=utf-8:${name}`,
            `N;CHARSET=utf-8:${name};;;;`,
            `EMAIL;CHARSET=utf-8:${email}`,
            `TEL;TYPE=CELL,VOICE;CHARSET=utf-8:${phone}`,
            `TEL;TYPE=WORK,VOICE;CHARSET=utf-8:${workPhoneWithExt}`
        ];

        if (extension) {
            vcardLines.push(`X-EXTENSION:${extension}`);
        }

        if (user.type_user === 'Consejeros' || user.type_user === 'Socios') {
            vcardLines.push(`URL:${url}`);
        }

        vcardLines.push(`ORG:${org}`);
        vcardLines.push(`ADR;TYPE=WORK:${address}`);
        vcardLines.push('END:VCARD');

        return vcardLines.join('\r\n');
    }

    function isMobileDevice() {
        return /android|iphone|ipad|ipod|opera mini|iemobile|mobile/i.test(navigator.userAgent);
    }

    // 1. Generar el texto vCard
    const qrText = generateVCard(user);

    // 2. Crear el QR con QRious
    try {
        const qr = new QRious({
            element: document.getElementById('qrcode'),
            value: qrText,
            size: 180,
            level: 'M',
            background: 'white',
            foreground: 'black'
        });
    } catch (error) {
        console.error("Error con QRious:", error);
        const canvas = document.getElementById('qrcode');
        const ctx = canvas.getContext('2d');
        canvas.width = 180;
        canvas.height = 180;
        ctx.fillStyle = 'white';
        ctx.fillRect(0, 0, 180, 180);
        ctx.fillStyle = 'red';
        ctx.font = '14px Arial';
        ctx.textAlign = 'center';
        ctx.fillText('Error al', 90, 80);
        ctx.fillText('generar QR', 90, 100);

        if (navigator.clipboard) {
            navigator.clipboard.writeText(qrText).then(() => {
                // console.log('Datos copiados al portapapeles como alternativa');
            }).catch(err => {
                // console.log('No se pudieron copiar los datos:', err);
            });
        }
    }

    // 3. Crear archivo Blob y asignar al enlace de descarga
    const blob = new Blob([qrText], { type: 'text/vcard;charset=utf-8' });
    const urlVCard = URL.createObjectURL(blob);
    const downloadLink = document.getElementById('download-vcard-btn');
    const filename = `${generateSlug(user.name || 'contacto')}.vcf`;

    if (downloadLink) {
        downloadLink.href = urlVCard;
        downloadLink.download = filename;
    }

    // 4. Si es móvil, intentar descargar automáticamente
    if (isMobileDevice()) {
        setTimeout(() => {
            const clickEvent = new MouseEvent("click", {
                view: window,
                bubbles: true,
                cancelable: true
            });
            downloadLink.dispatchEvent(clickEvent);
        }, 1000); 
    }
});
</script>
@endsection
