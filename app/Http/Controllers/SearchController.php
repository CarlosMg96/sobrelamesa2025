<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    function index(Request $request) {
        $query = Deal::with('practice_areas')->with('clients')->with('contacts')->with('partners')->where('name', 'like', '%' . $request->q . '%')->limit(5);
        // $query = Deal::with('practice_areas')->with('clients')->with('contacts')->with('partners')->whereRelation('contacts', 'name', 'like', '%' . $request->q . '%')->limit(5);
        $deals = $query->get();
        $query = Travel::with('practice_areas')->with('clients')->with('contacts')->with('partners')->where('name', 'like', '%' . $request->q . '%')->limit(3);
        $travels = $query->get();
        $data = ['deals' => $deals, 'travels' => $travels];
        return view('search.index', $data);
    }
    function quick_search(Request $request)
    {
        if (!$request->q) return ['deals' => [], 'travels' => []];
        $query = Deal::with('practice_areas')->with('clients')->with('contacts')->with('partners')->where('name', 'like', '%' . $request->q . '%')->limit(5);
        // $query = Deal::with('practice_areas')->with('clients')->with('contacts')->with('partners')->whereRelation('contacts', 'name', 'like', '%' . $request->q . '%')->limit(5);
        $deals = $query->get();
        $query = Travel::with('practice_areas')->with('clients')->with('contacts')->with('partners')->where('name', 'like', '%' . $request->q . '%')->limit(3);
        $travels = $query->get();
        return ['deals' => $deals, 'travels' => $travels];
    }
}
