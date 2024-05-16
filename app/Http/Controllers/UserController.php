<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Departament;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Request\UserUpdateRequest;
use App\Http\Request\UserStoreRequest;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome');
    }



    public function getUsers(Request $request, Departament $departament)
    {
        if ($request->ajax()) {
            $data = User::latest()->where('departament_id', '=', $departament->id)->where('role', '=', 'employee')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = "<a href='/edit/" . $row->id . "' class='edit btn btn-primary btn-sm'>Update</a>";
                    $btn .= "<a href='/delete/" . $row->id . "' class='delete btn btn-danger btn-sm'>Delete</a>";
                    return $btn;
                })
                ->rawColumns(['action'])

                ->make(true);
        }
        return view('layouts.datatable');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserStoreRequest $request, UserService $userService)
    {

        if ($request->validated()) {

            $userService->createUser($request);

            return redirect('/home')->with('message', 'Employee created and logged in');
        }
    }
    public function edit(User $user, Departament $departament)
    {
        // $user = User::latest()->where('departament_id', '=', $departament->id)->where('role', '=', 'employee')->get();
        $this->authorize('update', $user);

        return view('user.update', ['users' => $user]);
    }

    public function update(UserUpdateRequest $request, UserService $userService, User $user, Departament $departament)
    {
        $this->authorize('update', $user);
        if ($request->validated()) {

            $userService->updateUser($request, $user);

            $success = 'User has been updated successfully';
            return redirect('/home')->with('success', $success);
        }
    }
    public function destroy(User $user)
    {
        $user = User::find($user);
        $user->each->delete();
        return redirect('/home')->with('success', 'Employee has been deleted Successfully.');
    }
}
