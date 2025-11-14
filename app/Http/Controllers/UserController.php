<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        if (count($request->roles)) {
            $user->assignRole($request->roles);
        }
        session()->flash('status', _('Created successfully!'));
        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::findOrFail($id);
        $user->roles;
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->syncRoles($request->roles);
        $user->save();
        session()->flash('status', _('Updated successfully!'));
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('status', _('Deleted successfully!'));
        return $id;
    }
    /**
     * Show the import form
     */
    public function import()
    {
        return view('users.import');
    }

    /**
     * Process the imported Excel file
     */
    public function processImport(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls,csv|max:10240', // Max 10MB
        ]);

        try {
            $file = $request->file('excel_file');

            // Read the Excel file and process manually for better error handling
            $data = Excel::toArray([], $file)[0]; // Get first sheet

            if (empty($data)) {
                return response()->json([
                    'success' => false,
                    'message' => 'El archivo está vacío o no se pudo leer.'
                ], 400);
            }

            // Remove header row if exists
            $headers = array_shift($data);

            // Expected headers (case insensitive)
            $expectedHeaders = ['last name', 'first name', 'number', 'directory name', 'direct number', 'email', 'position'];

            // Process each row
            $importedCount = 0;
            $updatedCount = 0;
            $skippedCount = 0;
            $errors = [];

            foreach ($data as $index => $row) {
                $rowNumber = $index + 2; // +2 because we removed header and Excel rows start at 1

                try {
                    // Skip empty rows
                    if (empty(array_filter($row))) {
                        continue;
                    }

                    // Map data based on column position
                    // Headers: Last Name, First Name, Number, Directory Name, Direct Number, Email, Position
                    $lastName = trim($row[0] ?? '');
                    $firstName = trim($row[1] ?? '');
                    $number = trim($row[2] ?? '');
                    $directoryName = trim($row[3] ?? '');
                    $directNumber = trim($row[4] ?? '');
                    $email = strtolower(trim($row[5] ?? ''));
                    $email = $this->quitarTildes($email); // Remove accents from email
                    $position = trim($row[6] ?? '');
                    $work_team = trim($row[7] ?? ''); // Optional, can be used later
                    $birthdate = null;
                    if (isset($row[8]) && !empty($row[8])) {
                        try {
                            $birthdate = Carbon::createFromFormat('d/m/Y', $row[8])->format('Y-m-d');
                        } catch (\Exception $e) {
                            $birthdate = null;
                        }
                    }

                    $partnerData = [
                        'name' => $firstName . ' ' . $lastName,
                        'last_name' => $lastName,
                        'first_name' => $firstName,
                        'number' => $number,
                        'directory_name' => $directoryName,
                        'direct_number' => $directNumber,
                        'email' => $email,
                        'position' => $position,
                        'area' => null, // Can be set later or from another column if needed
                        'birthdate' => $birthdate,
                        'work_team' => $work_team, // Optional, can be used later
                        'avatar' => null, // Can be set later or from another column if needed
                    ];

                    // Validate required fields
                    if (empty($firstName) && empty($lastName)) {
                        $errors[] = "Fila {$rowNumber}: Nombre es obligatorio (First Name o Last Name).";
                        $skippedCount++;
                        continue;
                    }

                    if (empty($email)) {
                        $errors[] = "Fila {$rowNumber}: Email es obligatorio.";
                        $skippedCount++;
                        continue;
                    }

                    // Validate email format
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors[] = "Fila {$rowNumber}: Email inválido {$email}.";
                        $skippedCount++;
                        continue;
                    }

                    // Check if user exists and update or create
                    $existingUser = User::where('email', $email)->first();

                    if ($existingUser) {
                        // Update existing user
                        $existingUser->update($partnerData);
                        $existingUser->assignRole('partner'); // Ensure role is assigned
                        $updatedCount++;
                    } else {
                        // Create new user
                        $partnerData['password'] = Hash::make('#Pass.S3cur3ñ+'); // Set a default password
                        $user = User::create($partnerData);
                        $user->assignRole('partner'); // Assign default role
                        $importedCount++;
                    }
                } catch (\Exception $e) {
                    $errors[] = "Fila {$rowNumber}: Error al procesar - " . $e->getMessage();
                    $skippedCount++;
                }
            }

            // Prepare response message
            $message = "Importación completada. {$importedCount} usuarios nuevos importados";
            if ($updatedCount > 0) {
                $message .= ", {$updatedCount} usuarios actualizados";
            }
            if ($skippedCount > 0) {
                $message .= ", {$skippedCount} filas omitidas";
            }
            if (!empty($errors)) {
                $message .= ". Ver detalles de errores.";
            }

            return response()->json([
                'success' => true,
                'message' => $message,
                'imported' => $importedCount,
                'updated' => $updatedCount,
                'skipped' => $skippedCount,
                'errors' => $errors
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al procesar el archivo: ' . $e->getMessage()
            ], 500);
        }
    }
    function quitarTildes($cadena)
    {
        $acentos = [
            'á' => 'a',
            'é' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ú' => 'u',
            'Á' => 'A',
            'É' => 'E',
            'Í' => 'I',
            'Ó' => 'O',
            'Ú' => 'U',
            'ñ' => 'n',
            'Ñ' => 'N',
            'ü' => 'u',
            'Ü' => 'U'
        ];

        return strtr($cadena, $acentos);
    }
}
