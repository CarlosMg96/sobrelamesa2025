<?php

namespace App\Imports;

use App\Models\Travel;
use App\Models\TravelType;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TravelsImport implements ToCollection, WithHeadingRow
{
    /**
     * Handle the collection of rows.
     *
     * @param \Illuminate\Support\Collection $rows
     * @return void
     */
    public function collection(\Illuminate\Support\Collection $rows)
    {
        foreach ($rows as $row) {
            if (!isset($row['tituloaviso']))
                continue;
            
            $travel = Travel::updateOrCreate([
                'name' => $row['tituloaviso'],
            ], [
                'name' => $row['tituloaviso'],
                'start_date' => Carbon::createFromFormat('d/m/y', $row['fecha_inicio']),
                'end_date' => Carbon::createFromFormat('d/m/y', $row['fecha_fin']),
                'purpose' => $row['objetivoestrategia'],
                'justification' => $row['justificacion'],
                'event_type' => $row['tipodeevento'],
                'previous_travels_related' => $row['viajespreviosrelacionados'],
                'clients_to_visit' => $row['nombresclientesavisitar'],
                'attendees' => $row['asistentes'],
                'practices_areas' => $row['areaspractica'],
                'is_pre_budgeted' => $row['eventopresupuestado'] == 'Si' ? true : ($row['eventopresupuestado'] == 'No' ? false : null),
                'place' => $row['lugar'],
            ]);

            if (isset($row['tipoevento'])){
                $tipoevento = explode(',', $row['tipoevento']);
                foreach ($tipoevento as $tipo) {
                    $travel_type = TravelType::where('name', trim($tipo))->first();
                    if (!$travel_type) {
                        $travel_type = TravelType::create([
                            'name' => trim($tipo),
                        ]);
                    }
                    $travel->travel_types()->attach($travel_type->id);
                }
            }
        }
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // $travel = Travel::updateOrCreate(['name' => $row[0]],
        // []);
        // $travel = Travel::where('name', $row[0])->first();
        return new Travel([
            //
            'name' => $row[0],
            'start_date' => $row[1],
            'end_date' => $row[2],
            'place' => $row[3],
        ]);
        // if ($travel) {

        // } else {

        // }
    }
}
