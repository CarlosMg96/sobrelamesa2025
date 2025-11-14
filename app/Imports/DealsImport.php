<?php

namespace App\Imports;

use App\Models\Deal;
use App\Models\DealImports;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
// use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class DealsImport implements ToCollection, WithStartRow
{

    // /**
    //  * @param array $array
    //  * @return void
    //  */
    // public function array(array $array)
    // {
    //     // Implement the logic for handling the array here
    //     return $array;
    // }
    /**
     * @param array $row
     *
     * @return Deal|null
     */
    public function collection(Collection  $rows)
    {
        foreach ($rows as $key => $row) {
            if (!isset($row[1]))
                continue;
            $confidential = false;
            $confidential_text = trim(strtolower($row[9]));
            if ($confidential_text == 'yes' || $confidential_text == 'true' || $confidential_text == '1' || $confidential_text == 'y' || $confidential_text == 't' || $confidential_text == 'confidential') 
                $confidential = true;
            $deal = Deal::updateOrCreate([
                'name'     => $row[1],
            ], [
                'name'     => $row[1],
                'practice_areas'     => $row[0],
                'client'     => $row[2],
                'summary'     => $row[3],
                'dealsize'     => $row[4],
                'lead_partners'     => $row[5],
                'date_of_completion'     => $row[6],
                'lawyers_involved'     => $row[7],
                'law_firm_involved'     => $row[8],
                'confidential'     => $confidential,
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }

    // public function uniqueBy()
    // {
    //     return 'name';
    // }
}
