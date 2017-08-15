<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $roles = Role::all()->sortBy('name');

        return view('Role.all')->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //----------------Insert Data--------------------
        $role = new Role;

        $name = $request->input('name');

        $role->name = $name;

        $role->save();
        
        return redirect('roles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $role = Role::find($id);

        return view('Role.update')->with('role',$role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //-----------Update Data---------------------------
        $role = new Role;

        $id = $request->input('id');
        $name = $request->input('name');

        $role::where('id',$id)
        ->update(['name' => $name]);

        //---------------Get All Data--------------------
        return redirect('roles');
    }

    public function activate($id){

        $role = Role::find($id);

        $role->isactive = 'Y';

        $role->save();

        return redirect('roles');
    }

    public function inactivate($id){

        $role = Role::find($id);

        $role->isactive = 'N';

        $role->save();

        return redirect('roles');
    }
}
