<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravelRequest;
use App\Imports\TravelsImport;
use App\Models\LawFirm;
use App\Models\PracticeArea;
use App\Models\Travel;
use App\Models\TravelLater;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class TravelController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show travels')->only('index');
        $this->middleware('can:create travels')->only(['create', 'store']);
        $this->middleware('can:edit travels')->only(['edit', 'update']);
        $this->middleware('can:delete travels')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('travels.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('travels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $travel = Travel::create([
            'name' => $request->name,
            'place' => $request->place,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'is_pre_budgeted' => $request->is_pre_budgeted,
            'authorized_by' => $request->authorized_by,
            'purpose' => $request->purpose,
            'justification' => $request->justification,
            'previous_travels_related' => $request->previous_travels_related,
        ]);
        if ($request->practice_area_ids)
            foreach ($request->practice_area_ids as $key => $value) {
                $practice_area = \App\Models\PracticeArea::where('name', $value)->first();
                if ($practice_area == null) {
                    $practice_area = \App\Models\PracticeArea::create(['id' => $value]);
                    $travel->practice_areas()->attach($practice_area->id);
                } else {
                    $travel->practice_areas()->attach($value);
                }
            }
        if ($request->partner_ids)
            foreach ($request->partner_ids as $key => $value) {
                # code...
                $travel->partners()->attach($value);
            }
        if ($request->travel_type_ids)
            foreach ($request->travel_type_ids as $key => $value) {
                # code...
                $travel->travel_types()->attach($value);
            }
        if ($request->client_ids)
            foreach ($request->client_ids as $key => $value) {
                # code...
                $clients = \App\Models\Client::where('id', $value)->first();
                if ($clients == null) {
                    $clients = \App\Models\Client::create(['name' => $value]);
                    $travel->clients()->attach($clients->id);
                } else {
                    $travel->clients()->attach($value);
                }
            }
        if ($request->law_firm_ids)
            foreach ($request->law_firm_ids as $key => $value) {
                # code...
                $law_firm = \App\Models\LawFirm::where('id', $value)->first();
                if ($law_firm == null) {
                    $law_firm = \App\Models\LawFirm::create(['name' => $value]);
                    $travel->law_firms()->attach($law_firm->id);
                } else {
                    $travel->law_firms()->attach($value);
                }
            }
        if ($request->previous_travel_ids)
            foreach ($request->previous_travel_ids as $key => $value) {
                # code...
                $travel->previous_travels()->attach($value);
            }
        session()->flash('status', json_encode(['success' => true, 'message' => _('¡Se ha creado correctamente!')]));
        return $travel;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $travel = Travel::findOrFail($id);
        $law_firms = LawFirm::all();
        $practice_areas = PracticeArea::where('is_interest_area', false)->get();
        $practice_area_ids = $travel->practice_areas->pluck('id')->toArray();
        $event_type_ids = $travel->travel_types->pluck('id')->toArray();
        $partner_ids = $travel->partners->pluck('id')->toArray();
        $client_ids = $travel->clients->pluck('id')->toArray();
        $law_firm_ids = $travel->law_firms->pluck('id')->toArray();
        $previous_travel_ids = $travel->previous_travels->pluck('id')->toArray();
        return view(
            'travels.edit',
            [
                'travel' => $travel,
                'practice_area_ids' => $practice_area_ids,
                'event_type_ids' => $event_type_ids,
                'client_ids' => $client_ids,
                'law_firm_ids' => $law_firm_ids,
                'partner_ids' => $partner_ids,
                'previous_travel_ids' => $previous_travel_ids,
                'law_firms' => $law_firms,
                'practice_areas' => $practice_areas,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, TravelRequest $request)
    {
        //
        $travel = Travel::findOrFail($id);
        $travel->name = $request->name;
        $travel->place = $request->place;
        $travel->start_date = $request->start_date;
        $travel->end_date = $request->end_date;
        $travel->is_pre_budgeted = $request->is_pre_budgeted;
        $travel->authorized_by = $request->authorized_by;
        $travel->purpose = $request->purpose;
        $travel->justification = $request->justification;
        $travel->conclutions = $request->conclutions;
        $travel->actions  = $request->actions;
        $travel->message_transmitted  = $request->message_transmitted;
        $travel->save();

        $travel->practice_areas()->sync($request->practice_area_ids);
        $travel->partners()->sync($request->partner_ids);
        $travel->travel_types()->sync($request->travel_type_ids);
        $travel->clients()->sync($request->client_ids);
        $travel->law_firms()->sync($request->law_firm_ids);
        $travel->previous_travels()->sync($request->previous_travel_ids);
        $contacts = collect(json_decode($request->contacts, true));
        $contact_ids = $contacts->pluck('id')->toArray();
        $travel->contacts()->sync($contact_ids);
        $travels_later_ids = collect($request->travels_later)->pluck('law_firm_id')->toArray();
        /**
         * Deletes records from the TravelLater table where the travel_id matches the given travel's ID
         * and the law_firm_id is not in the specified array of $travels_later_ids.
         *
         * @param int $travel->id The ID of the travel record to match.
         * @param array $travels_later_ids An array of law firm IDs to exclude from deletion.
         * @return void
         */
        TravelLater::where('travel_id', $travel->id)->whereNotIn('law_firm_id', $travels_later_ids)->delete();
        foreach ($request->travels_later as $key => $value) {
            $travel_later = TravelLater::where('travel_id', $travel->id)->where('law_firm_id', $value['law_firm_id'])->first();
            if ($travel_later == null) {
                $travel_later = TravelLater::create([
                    'law_firm_id' => $value['law_firm_id'],
                    'message_transmitted' => $value['message_transmitted'],
                    'actions' => $value['actions'],
                    'conclutions' => $value['conclutions'],
                    'travel_id' => $travel->id,
                ]);
            } else {
                $travel_later->message_transmitted = $value['message_transmitted'];
                $travel_later->actions = $value['actions'];
                $travel_later->conclutions = $value['conclutions'];
                $travel_later->save();
            }
        }
        session()->flash('status', json_encode(['success' => true, 'message' => _('¡Se ha actualizado correctamente!')]));
        return $travels_later_ids;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        $travel = Travel::findOrFail($id);
        // $travel->practice_areas()->detach();
        // $travel->partners()->detach();
        // $travel->travel_types()->detach();
        // $travel->clients()->detach();
        // $travel->law_firms()->detach();
        // $travel->previous_travels()->detach();
        // $travel->contacts()->detach();
        $travel->delete();
        session()->flash('status', json_encode(['success' => true, 'message' => _('¡Se ha eliminado correctamente!')]));
        return response()->json(['message' => __('Travel deleted successfully')]);
    }

    public function download_previous(string $id)
    {
        $travel = Travel::findOrFail($id);
        $practice_area =  implode(', ', $travel->practice_areas->pluck('name')->toArray());
        $partners =  implode(', ', $travel->partners->pluck('name')->toArray());
        $travels =  implode(', ', $travel->previous_travels->pluck('name')->toArray());
        $travel_types =  implode(', ', $travel->travel_types->pluck('name')->toArray());
        $clients =  $travel->clients->pluck('name')->toArray();
        $law_firms =  $travel->law_firms->pluck('name')->toArray();
        $clients_law_firms = implode(', ',  array_merge($clients, $law_firms));

        $spreadsheet = null;
        if (App::hasDebugModeEnabled()) {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("Formato-Aviso-Previo.xlsx");
        } else {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("./Formato-Aviso-Previo.xlsx");
        }
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $spreadsheet->getActiveSheet()->setCellValue('B10', $travel->place);
        $spreadsheet->getActiveSheet()->setCellValue('B14', $practice_area);
        $spreadsheet->getActiveSheet()->setCellValue('B17', $partners);
        if ($travel->is_pre_budgeted) {
            $spreadsheet->getActiveSheet()->setCellValue('F23', 'SI:   X');
            $spreadsheet->getActiveSheet()->setCellValue('G23', '*NO:');
        } else {
            $spreadsheet->getActiveSheet()->setCellValue('G23', '*NO:   X');
            $spreadsheet->getActiveSheet()->setCellValue('F23', 'SI:');
        }
        $spreadsheet->getActiveSheet()->setCellValue('B20', $travel_types);
        $spreadsheet->getActiveSheet()->setCellValue('B27', $travel->purpose);
        $spreadsheet->getActiveSheet()->setCellValue('B31', $travels);
        $spreadsheet->getActiveSheet()->setCellValue('B31', $travels);
        $spreadsheet->getActiveSheet()->setCellValue('B35', $clients_law_firms);
        $spreadsheet->getActiveSheet()->setCellValue('B39', $travel->justification);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . "Formato Aviso Previo - $travel->name.xlsx" . '"');
        $writer->save('php://output');
    }
    function close(Request $request)
    {
        $travel = Travel::findOrFail($request->id);
        // $travel->conclutions = $request->conclutions;
        // $travel->actions  = $request->actions;
        // $travel->message_transmitted  = $request->message_transmitted;
        $travel->is_closed = true;
        $travel->save();
        return $travel;
    }
    public function download_after(string $id)
    {
        $travel = Travel::findOrFail($id);
        $practice_area =  implode(', ', $travel->practice_areas->pluck('name')->toArray());
        $partners =  implode(', ', $travel->partners->pluck('name')->toArray());
        $travels =  implode(', ', $travel->previous_travels->pluck('name')->toArray());
        $travel_types =  implode(', ', $travel->travel_types->pluck('name')->toArray());
        $clients =  $travel->clients->pluck('name')->toArray();
        $law_firms =  $travel->law_firms->pluck('name')->toArray();
        $clients_law_firms = implode(', ',  array_merge($clients, $law_firms));

        $spreadsheet = null;
        if (App::hasDebugModeEnabled()) {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("Formato-Aviso-Posterior.xlsx");
        } else {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("./Formato-Aviso-Posterior.xlsx");
        }
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        $spreadsheet->getActiveSheet()->setCellValue('B10', $travel->place);
        $spreadsheet->getActiveSheet()->setCellValue('B14', $practice_area);
        $spreadsheet->getActiveSheet()->setCellValue('B17', $partners);
        $spreadsheet->getActiveSheet()->setCellValue('B20', $travel_types);
        $spreadsheet->getActiveSheet()->setCellValue('B23', $clients_law_firms);
        $spreadsheet->getActiveSheet()->setCellValue('B31', $travel->message_transmitted);
        $spreadsheet->getActiveSheet()->setCellValue('B34', $travel->actions);
        $spreadsheet->getActiveSheet()->setCellValue('B38', $travel->conclutions);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . "Formato Aviso Posterior - $travel->name.xlsx" . '"');
        $writer->save('php://output');
    }

    function upload()
    {
        return view('travels.upload');
    }
    function uploading(Request $request)
    {
        if ($request->hasFile('excel_file')) {
            // $file = $request->file('excel_file');
            // $filePath = $file->store('excel', 'public');

            $data = Excel::import(new TravelsImport, $request->file('excel_file'));

            // Process the file (e.g., read and store data in the database)
            // You can use a library like PhpSpreadsheet for reading Excel files
            // return response()->json(['data' => $data]);
            return response()->json([
                'message' => 'File uploaded successfully',
                'data' => $data,
            ]);
        }

        return response()->json([
            'message' => 'No file uploaded',
        ], 400);
    }
    public function removeRepeatedTravelTypes()
    {
        $travelTypes = \App\Models\TravelType::all();
        $uniqueTravelTypes = $travelTypes->unique('name');

        $duplicateTravelTypes = $travelTypes->diff($uniqueTravelTypes);
        foreach ($duplicateTravelTypes as $duplicate) {
            $duplicate->delete();
        }

        return response()->json(['message' => 'Repeated travel types removed successfully']);
    }
}
