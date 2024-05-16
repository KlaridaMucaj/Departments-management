<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserService
{
    // private UserRepository $userRepository;
    // public function __construct(UserRepository $userRepository) {
    //     $this->userRepository = $userRepository;
    // }

    public function createUser(Request $request): User
    {
        if ($request->hasFile('image')) {
            $data = $request->input('image');
            $photo = $request->file('image')->getClientOriginalName();
            $destination = '\uploads';
            $user = User::create([
                'departament_id' => $request->departament_id,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'image' =>  $request->file('image')->move($destination, $photo),
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        } else {
            $user = User::create([
            'departament_id' => $request->departament_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }
        return $user;
    }
    public  function updateUser(Request $request, User $user)
    {
        $input = $request->except(['_token', '_method', 'password_confirmation']);

        if ($request->hasFile('image')) {
            $photo = $request->file('image')->getClientOriginalName();
            $destination = '\uploads';
            $user = User::where('id', '=', $user->id)->update([
                'departament_id' => $request->departament_id,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'created_at' => Carbon::now()->toDateTimeString(),
                'image' =>  $request->file('image')->move($destination, $photo),

            ]);
        } else {
            unset($input['image']);
            $user = User::where('id', '=', $user->id)->update([
                'departament_id' => $request->departament_id,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'created_at' => Carbon::now()->toDateTimeString(),

            ]);
        }
    }
}
