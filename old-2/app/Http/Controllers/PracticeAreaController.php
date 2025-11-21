<?php

namespace App\Http\Controllers;

use App\Models\PracticeArea;
use Illuminate\Http\Request;

class PracticeAreaController extends Controller
{
    //
    function seed()  {
        $data = array('Customs and International Trade',
'Environmental',
'Arbitration',
'Banking and Finance',
'Life Sciences',
'Competition and Regulated Industries',
'Energy (Oil & Gas, Renewables & Power)',
'Project Finance',
'Tax (Consultancy, Controversy & Litigation)',
'Mergers & Acquisitions',
'Wealth Management',
'Infrastructure',
'Real Estate',
'Compliance and Investigations',
'Labor',
'Administrative Litigation',
'Civil & Commercial Litigation',
'Capital Markets',
'Mining',
'Intellectual Property',
'Restructuring & Insolvency',
'Insurance',
'Corporate Services',
'Technology & Telecomm',
'Environmental, Social and Governance (ESG)',);
        foreach ($data as $key => $value) {
            
            $practice_area = PracticeArea::where('name', $value)->first();
            if(!$practice_area){
                $practice_area = PracticeArea::create([
                    'name' => $value,
                    'is_interest_area' => false,
                ]);
            } else {
                $practice_area->is_interest_area = false;
                $practice_area->save();
            }
        }
    }
}
