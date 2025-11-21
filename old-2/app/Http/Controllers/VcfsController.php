<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;


class VcfsController extends Controller
{
    public function show_for_email($username)
    {
        $user = User::where('email', 'like', $username . '@%')->first();
    
        if (!$user) {
            abort(404, 'Usuario no encontrado');
        }
    
        return view('vcfs.show_for_email', compact('user'));
    }

    public function download_for_email($username)
    {
        $user = User::where('email', 'like', $username . '@%')->first();

        if (!$user) {
            abort(404, 'Usuario no encontrado');
        }

        // Generar contenido VCF
        $name = $user->name ?? '';
        $email = $user->email ?? '';
        $directPhone = preg_replace('/\D/', '', $user->direct_number ?? '');
        $extension = $user->number ?? '';
        $org = 'Galicia';

        $slug = Str::slug($name, '-');
        $map = explode('-', $user->map_section ?? '');
        $floor = $map[0] ?? '';
        $section = $map[1] ?? '';
        $zone = $floor && $section ? "Piso " . str_replace('p', '', $floor) . " Sección $section," : '';
        $address = "Av. Campos Eliseos 204, $zone Polanco, Ciudad de México, C.P. 11550";
        $url = "https://www.galicia.com.mx/links/equipo?que=" . urlencode($user->type_user) . "&n=" . urlencode($slug);
        $workPhone = '5555409202';
        $workPhoneWithExt = $extension ? "$workPhone;ext=$extension" : $workPhone;

        $vcard = [
            "BEGIN:VCARD",
            "VERSION:3.0",
            "FN;CHARSET=utf-8:$name",
            "N;CHARSET=utf-8:$name;;;;",
            "EMAIL;CHARSET=utf-8:$email",
        "TEL;TYPE=CELL,VOICE;CHARSET=utf-8:$directPhone",
        "TEL;TYPE=WORK,VOICE;CHARSET=utf-8:$workPhoneWithExt",
        "ORG:$org",
        "ADR;TYPE=WORK:$address",
        ];

        if ($extension) {
            $vcard[] = "X-EXTENSION:$extension";
        }

        if (in_array($user->type_user, ['Consejeros', 'Socios'])) {
            $vcard[] = "URL:$url";
        }

        $vcard[] = "END:VCARD";

        $vcardContent = implode("\r\n", $vcard);
        $filename = $slug . '.vcf';

        // Forzar descarga
        return response($vcardContent)
            ->header('Content-Type', 'text/vcard; charset=utf-8')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}
