<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Jurisdiction;
use App\Models\LawFirm;
use App\Models\Partner;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function root()
    {
        return view('index');
    }

    public function dashboard()
    {
        $deal_reports = [];
        $travel_reports = [];
        for ($i = 1; $i <= 12; $i++) {
            $deal_report_count = Deal::whereMonth('date_completion', $i)->count();
            $deal_reports[] = $deal_report_count;
            $travel_report_count = Travel::whereMonth('start_date', $i)->count();
            $travel_reports[] = $travel_report_count;
        }
        $jurisdictions = Jurisdiction::orderBy('name')->get();
        $deals_worldwide = [];
        foreach ($jurisdictions as $key => $value) {
            $deals_worldwide[] = [
                'name' => $value->name,
                'coords' => [floatval($value->lat), floatval($value->lon)]
            ];
        }
        $total_deals_by_country = DB::table('deal_jurisdiction')->join('jurisdictions', 'deal_jurisdiction.jurisdiction_id', '=', 'jurisdictions.id')->select('jurisdictions.id', 'jurisdictions.code', 'jurisdictions.name', DB::raw('count(*) as total'))->groupBy('deal_jurisdiction.jurisdiction_id')->limit(10)->get();
        $total_travels_by_country = DB::table('jurisdiction_travel')->join('jurisdictions', 'jurisdiction_travel.jurisdiction_id', '=', 'jurisdictions.id')->select('jurisdictions.id', 'jurisdictions.code', 'jurisdictions.name', DB::raw('count(*) as total'))->groupBy('jurisdiction_travel.jurisdiction_id')->limit(10)->get();
        $labels_travels_by_country = $total_travels_by_country->pluck('name')->toArray();
        $data_travels_by_country = $total_travels_by_country->pluck('total')->toArray();
        $user = auth()->user();

        // Get upcoming birthdays for the dashboard
        $currentMonth = now()->month;
        $currentDay = now()->day;
        $upcomingBirthdays = \App\Models\User::whereNotNull('birthdate')
            ->where(function ($query) use ($currentMonth, $currentDay) {
                $query->where(function ($q) use ($currentMonth, $currentDay) {
                    $q->whereMonth('birthdate', '=', $currentMonth)
                        ->whereDay('birthdate', '>=', $currentDay);
                })->orWhereMonth('birthdate', '>', $currentMonth);
            })
            ->orderByRaw("MONTH(birthdate), DAY(birthdate)")
            ->take(5) // Limit to 5 upcoming birthdays for the dashboard
            ->get();

        $data = array(
            'deal_reports' => $deal_reports,
            'travel_reports' => $travel_reports,
            'deals_worldwide' => $deals_worldwide,
            'total_deals_by_country' => $total_deals_by_country,
            'total_travels_by_country' => $total_travels_by_country,
            'labels_travels_by_country' => $labels_travels_by_country,
            'data_travels_by_country' => $data_travels_by_country,
            'total_partners' => Partner::count(),
            'total_law_firms' => LawFirm::count(),
            'total_deals' => Deal::count(),
            'total_travels' => Travel::count(),
            'user' => $user,
            'upcomingBirthdays' => $upcomingBirthdays, // Add upcoming birthdays to the view data
        );
        return view('dashboard.index', $data);
    }

    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return view('errors.404');
    }

    public function myProfile()
    {
        $user = auth()->user();
        $data = array(
            'user' => $user,
        );
        return view('dashboard.my-profile', $data);
    }

    public function userManual()
    {
        $user = auth()->user();
        $data = array(
            'user' => $user,
        );
        return view('dashboard.user-manual', $data);
    }

    public function profileShare($type)
    {
        $user = auth()->user();
        // tipo puede ser "vcard" o "bio"
        return view('dashboard.profile-share', compact('user', 'type'));
    }

    /**
     * Show the next birthday page.
     *
     * @return \Illuminate\View\View
     */
    public function nextBirthday()
    {
        $currentMonth = now()->month;
        $currentDay = now()->day;

        $upcomingBirthdays = \App\Models\User::whereNotNull('birthdate')
            ->where(function ($query) use ($currentMonth, $currentDay) {
                $query->where(function ($q) use ($currentMonth, $currentDay) {
                    $q->whereMonth('birthdate', '=', $currentMonth)
                        ->whereDay('birthdate', '>=', $currentDay);
                })->orWhereMonth('birthdate', '>', $currentMonth);
            })
            ->orderByRaw("MONTH(birthdate), DAY(birthdate)")
            ->get();

        return view('dashboard.next-birthday', [
            'upcomingBirthdays' => $upcomingBirthdays,
            'currentMonth' => $currentMonth
        ]);
    }
    public function nextBirthdayComplete()
    {
        $currentMonth = now()->month;
        $currentDay = now()->day;

        // Obtener usuarios con cumpleaños en los próximos 11 meses
        $upcomingBirthdays = \App\Models\User::whereNotNull('birthdate')
            ->where(function ($query) use ($currentMonth, $currentDay) {
                // Cumpleaños que son este mes pero aún no han pasado
                $query->where(function ($q) use ($currentMonth, $currentDay) {
                    $q->whereMonth('birthdate', '=', $currentMonth)
                        ->whereDay('birthdate', '>=', $currentDay);
                })
                    // O cumpleaños en los meses siguientes
                    ->orWhereMonth('birthdate', '>', $currentMonth);
            })
            ->orWhere(function ($query) use ($currentMonth, $currentDay) {
                // Cumpleaños que ya pasaron este año (para el próximo año)
                $query->whereMonth('birthdate', '<', $currentMonth)
                    ->orWhere(function ($q) use ($currentMonth, $currentDay) {
                        $q->whereMonth('birthdate', '=', $currentMonth)
                            ->whereDay('birthdate', '<', $currentDay);
                    });
            })
            ->orderByRaw("CASE 
                WHEN (MONTH(birthdate) > $currentMonth) OR 
                     (MONTH(birthdate) = $currentMonth AND DAY(birthdate) >= $currentDay) 
                THEN 0 
                ELSE 1 
            END, 
            CASE 
                WHEN (MONTH(birthdate) >= $currentMonth) 
                THEN MONTH(birthdate) * 100 + DAY(birthdate)
                ELSE MONTH(birthdate) * 100 + DAY(birthdate) + 1200
            END")
            ->get();

        return view('dashboard.next-birthday', [
            'upcomingBirthdays' => $upcomingBirthdays,
            'currentMonth' => $currentMonth
        ]);
    }

    public function parkingRegulation()
    {
        return view('dashboard.parking-regulation');
    }
    public function myCredential()
    {
        $user = auth()->user();
        return view('dashboard.my-credential', compact('user'));
    }
}
