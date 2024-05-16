<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Departament;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexD()
    {
        return view('layouts.datatable');
    }
    public function index()
    {
        $users = User::all(); 

        $departaments = Departament::all(); 
        
        return view('home' , ['departaments'=>$departaments,'users'=>$users]);
    }
    
    public function getDepartament()
    {
        $departaments = Departament::where('parent_id', '=', null)->get();

       $allDepartaments = Departament::pluck('name','id')->all(); 
    
        return view('dep',compact('departaments','allDepartaments'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
    $input = $request->all();
    $input['parent_id'] = empty($input['parent_id']) ? null: $input['parent_id'];
    
    Departament::create($input);
    return back()->with('success', 'New Departament added successfully.');
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function show(Departament $departament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function edit(Departament $departament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departament $departament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departament  $departament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departament $departament)
    {
        //
    }
}
