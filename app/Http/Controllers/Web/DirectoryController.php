<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PracticeArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the directory.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $group = $request->input('group');
        $tab = $request->input('tab', 'grupos');

        // If a specific group is requested, redirect to the group view
        if ($group) {
            $groupData = collect($this->getGroups())->firstWhere('route', route('directory.index', ['group' => $group]));

            if ($groupData) {
                $groupName = array_search($groupData, $this->getGroups());
                $users = User::where('work_team', 'like', '%' . $groupName . '%')
                    ->orWhere('position', 'like', '%' . strtolower($groupName) . '%')
                    ->orderBy('name')
                    ->get();

                return view('directory.group', [
                    'users' => $users,
                    'groupName' => $groupName
                ]);
            }
        }

        // Get practice areas with user counts using a left join
        $areas = DB::table('practice_areas')
            ->leftJoin('practice_area_user', 'practice_areas.id', '=', 'practice_area_user.practice_area_id')
            ->select('practice_areas.*', DB::raw('COUNT(practice_area_user.user_id) as user_count'))
            ->where('practice_areas.id', '!=', 18) 
            ->groupBy('practice_areas.id')
            ->orderBy('practice_areas.name')
            ->get();
        Log::info($areas);

        // Get all users for search
        $users = collect();
        if ($search) {
            $searchTerm = '%' . $search . '%';
            $users = User::where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', $searchTerm)
                    ->orWhere('email', 'like', $searchTerm)
                    ->orWhere('work_team', 'like', $searchTerm)
                    ->orWhere('position', 'like', $searchTerm);
            })
                ->orderBy('name')
                ->get();
        }

        // Filter groups by search term if provided
        $filteredGroups = $this->getGroups();
        if ($search) {
            $searchLower = strtolower($search);
            $filteredGroups = array_filter($filteredGroups, function ($group, $groupName) use ($searchLower) {
                return stripos($groupName, $searchLower) !== false ||
                    stripos($group['route'], $searchLower) !== false;
            }, ARRAY_FILTER_USE_BOTH);
        }

        // Filter areas by search term if provided
        $filteredAreas = $areas;
        if ($search) {
            $searchLower = strtolower($search);
            $filteredAreas = $areas->filter(function ($area) use ($searchLower) {
                return str_contains(strtolower($area->name), $searchLower);
            });
        }

        // Prepare view data
        $viewData = [
            'groups' => $filteredGroups,
            'areas' => $filteredAreas,
            'activeTab' => $tab,
            'searchTerm' => $search,
            'searchResults' => [
                'users' => $users,
                'groups' => $filteredGroups,
                'areas' => $filteredAreas
            ]
        ];

        // If there's no search, add regular view data
        if (!$search) {
            $viewData['groups'] = $this->getGroups();
            $viewData['areas'] = $areas;
        }

        // Get today's birthdays for the view

        $today = now();
        $todayFormatted = $today->format('m-d');

        // Verify if today is Friday (Carbon: 5 = Friday)
        if ($today->isFriday()) {
            // Dates for Saturday, Sunday, and Monday
            $saturday = $today->copy()->addDay()->format('m-d');
            $sunday = $today->copy()->addDays(2)->format('m-d');
            $monday = $today->copy()->addDays(3)->format('m-d');

            // Get birthdays for today
            $birthdaysToday = User::whereRaw("DATE_FORMAT(birthdate, '%m-%d') = ?", [$todayFormatted])
                ->whereNotNull('birthdate')
                ->get();

            // Get birthdays for Saturday, Sunday, and Monday
            $weekendBirthdays = User::whereRaw("DATE_FORMAT(birthdate, '%m-%d') IN (?, ?, ?)", [$saturday, $sunday, $monday])
                ->whereNotNull('birthdate')
                ->get();

            // Combine: first today, then the weekend and Monday
            $birthdays = $birthdaysToday->concat($weekendBirthdays);
        } else {
            // If it's not Friday, show today and tomorrow
            $tomorrow = $today->copy()->addDay()->format('m-d');

            $birthdaysToday = User::whereRaw("DATE_FORMAT(birthdate, '%m-%d') = ?", [$todayFormatted])
                ->whereNotNull('birthdate')
                ->get();

            $birthdaysTomorrow = User::whereRaw("DATE_FORMAT(birthdate, '%m-%d') = ?", [$tomorrow])
                ->whereNotNull('birthdate')
                ->get();

            $birthdays = $birthdaysToday->concat($birthdaysTomorrow);
        }


        // Add birthdays to view data
        $viewData['birthdays'] = $birthdays;

        // If there's no search, add regular view data
        if (!$search) {
            $viewData['groups'] = $this->getGroups();
            $viewData['areas'] = $areas;
        }

        return view('directory.index', $viewData);
    }

    /**
     * Display the specified area from directory.
     */
    public function area(PracticeArea $area)
    {
        // Eager load users with directory_name and order by name
        $users = $area->users()
            ->orderBy('name')
            ->get();

        return view('directory.area', [
            'area' => $area,
            'users' => $users
        ]);
    }

    /**
     * Obtiene los grupos de trabajo
     */
    /**
     * Get all work groups with their counts and routes
     */
    private function getGroups()
    {
        // Get all directory users once to improve performance
        $allUsers = User::whereNotNull('directory_name')
            ->get();

        $groups = [
            'Socios' => [
                'count' => $allUsers->filter(function ($user) {
                    return stripos($user->work_team, 'socios') !== false ||
                        stripos($user->position, 'socio') !== false;
                })->count(),
                'route' => route('directory.index', ['group' => 'socios'])
            ],
            'Consejeros' => [
                'count' => $allUsers->filter(function ($user) {
                    return stripos($user->work_team, 'consejeros') !== false ||
                        stripos($user->position, 'consejero') !== false;
                })->count(),
                'route' => route('directory.index', ['group' => 'consejeros'])
            ],
            'Asociados' => [
                'count' => $allUsers->filter(function ($user) {
                    return stripos($user->work_team, 'asociados') !== false ||
                        stripos($user->position, 'asociado') !== false;
                })->count(),
                'route' => route('directory.index', ['group' => 'asociados'])
            ],
            'Auxiliares Jurídicos' => [
                'count' => $allUsers->filter(function ($user) {
                    return stripos($user->work_team, 'auxiliar') !== false ||
                        stripos($user->position, 'auxiliar') !== false;
                })->count(),
                'route' => route('directory.index', ['group' => 'auxiliares'])
            ],
            'Equipo de Administración y Finanzas' => [
                'count' => $allUsers->filter(function ($user) {
                    return stripos($user->work_team, 'administracion') !== false ||
                        stripos($user->work_team, 'finanzas') !== false;
                })->count(),
                'route' => route('directory.index', ['group' => 'admin_finanzas'])
            ],
            'Equipo de Negocios' => [
                'count' => $allUsers->filter(function ($user) {
                    return stripos($user->work_team, 'negocios') !== false;
                })->count(),
                'route' => route('directory.index', ['group' => 'negocios'])
            ],
            'Baja temporal' => [
                'count' => $allUsers->filter(function ($user) {
                    return stripos($user->work_team, 'baja temporal') !== false;
                })->count(),
                'route' => route('directory.index', ['group' => 'baja_temporal'])
            ],
            'Consultor' => [
                'count' => $allUsers->filter(function ($user) {
                    return stripos($user->work_team, 'consultor') !== false ||
                        stripos($user->position, 'consultor') !== false;
                })->count(),
                'route' => route('directory.index', ['group' => 'consultor'])
            ],
            'Pasantes' => [
                'count' => $allUsers->filter(function ($user) {
                    return stripos($user->work_team, 'pasante') !== false ||
                        stripos($user->position, 'pasante') !== false;
                })->count(),
                'route' => route('directory.index', ['group' => 'pasantes'])
            ],
            'Varios' => [
                'count' => $allUsers->filter(function ($user) {
                    return stripos($user->work_team, 'varios') !== false;
                })->count(),
                'route' => route('directory.index', ['group' => 'varios'])
            ]
        ];

        // Add a group for users not in any other group
        $usersInGroups = collect($groups)->sum('count');
        $totalUsers = $allUsers->count();
        $unassignedCount = max(0, $totalUsers - $usersInGroups);

        if ($unassignedCount > 0) {
            $groups['Sin grupo'] = [
                'count' => $unassignedCount,
                'route' => route('directory.index', ['group' => 'sin_grupo'])
            ];
        }

        return $groups;
    }

    /**
     * Display the specified user from directory.
     */
    /**
     * Display the specified user from directory.
     */
    public function show(User $user)
    {
        return view('directory.show', compact('user'));
    }

    /**
     * Show today's birthdays.
     */
    public function birthdays()
    {
        $today = now()->format('m-d');
        $birthdays = User::whereRaw("DATE_FORMAT(birthdate, '%m-%d') = ?", [$today])
            ->whereNotNull('birthdate')
            ->get();

        return view('directory.birthdays', compact('birthdays'));
    }
}
