<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Session;
use App\Service;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware('ValidateSession');
        
    }

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
        $services = Service::all();

        return view('Role.add')->with('services', $services);
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

        $this->validate($request, [
            'name' => 'required|min:3'
        ]);

        $role = new Role;
        $name = $request->input('name');
        $rl = $role->where('name','=',$name)->first();

        if($rl === null){

            try{

                $role->name = $name;
                $role->save();
                $role->services()->attach($request->input('services'));
                $message = "Rol Insertado con Exito!!";

            }catch(\Exception $e){
                $message = "Error al Intentar Registrar el Rol!!!";
            }

        }else{
            $message = "El Rol que Intenta Insertar ya Existe!!!";
        }

        Session::flash('message',$message);

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
        $services = Service::all();

        $data = [
            'role' => $role,
            'services' => $services
        ];

        return view('Role.update')->with('data',$data);
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
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);
        //-----------Update Data---------------------------
        $role = new Role;
        $id = $request->input('id');
        $name = $request->input('name');

        $rl = $role->where('name','=',$name)->first();

        print_r($role->services->toArray());

        if($rl === null){
            try{
                $role->id = $id;

                $role::where('id',$id)
                    ->update(['name' => $name]);

                $role->services()->attach($request->input('services'));

                $message = "Rol Modificado con Exito!!";
            }catch(\Exception $e){
                $message = "Ocurrio un error al Tratar de Modificar el Rol!!".$e->getMessage();
            }
        }else{
            $message = "El Rol que Intenta Modificar ya Existe!!";
        }

        Session::flash('message',$message);        

        //return redirect('roles');
    }

    public function activate($id){

        $role = Role::find($id);

        $role->isactive = 'Y';

        try{
             $role->save();
             $message = "Rol Activado con Exito!!";
        }catch(\Exception $e){
            $message = "Ocurrio un error al Tratar de Activar el Rol!!";
        }

        Session::flash("message",$message);

        return redirect('roles');
    }

    public function inactivate($id){

        $role = Role::find($id);

        $role->isactive = 'N';

        try{
            $role->save();
            $message = "Rol Desactivado con Exito!!";
        }catch(\Exception $e){
            $message = "Ocurrio un error al tratar de Desactivar el Rol!!";
        }

        Session::flash("message",$message);

        return redirect('roles');
    }
}
