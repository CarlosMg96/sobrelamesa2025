<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    public function index(Request $request)
    {
        $s = $request->input('s');
        $users =  User::whereNotNull('directory_name')
            ->where(function ($query) use ($s) {
                if ($s) {
                    $query->where('directory_name', 'like', "%{$s}%")
                        ->orWhere('name', 'like', "%{$s}%")
                        ->orWhere('email', 'like', "%{$s}%")
                        ->orWhere('number', 'like', "%{$s}%")
                        ->orWhere('direct_number', 'like', "%{$s}%")
                        ->orWhere('position', 'like', "%{$s}%")
                        ->orWhere('area', 'like', "%{$s}%");
                }
            })
            ->orderBy($request->input('sort_by', 'directory_name'))->paginate($request->input('per_page', 15));
        return ApiResponse::success($users, 201);
    }
    public function show($id)
    {
        return ApiResponse::success(User::findOrFail($id), 200);
    }
    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'number' => $request->number,
            'directory_name' => $request->directory_name,
            'direct_number' => $request->direct_number,
            'position' => $request->position,
            'area' => $request->area,
            'birthdate' => $request->birthdate,
            'work_team' => $request->work_team,
            'avatar' => $request->avatar,
            'password' => bcrypt($request->password ?? 'S3cur3.ñ+.P@ssw0rd'), // Ensure password is hashed
        ]);
        return ApiResponse::success($user, 201);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return ApiResponse::success($user, 201);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return ApiResponse::success($id, 201);
    }

    public function getTodaysBirthdays()
    {
        $today = now()->format('m-d');
        $birthdays = User::whereRaw("DATE_FORMAT(birthdate, '%m-%d') = ?", [$today])->get();
        return ApiResponse::success($birthdays, 201);
    }
}
