<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Session;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $services = Service::all()->sortBy('name');
        return view('Service.all')->with('services',$services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Service.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3',
            'url' => 'required',
            'position' => 'required|numeric',
            'icon' => 'required'
        ]);

        $name = $request->input('name');
        $service = Service::where('name','=',$name)->first();

        if($service === null){
            try{
                Service::create($request->all());
                $message = "Servicio Registrado con Exito!!";
            }catch(\Exception $e){
                $message = "Ocurrio un error al Tratar de Registrar el Servicio";
            }
        }else{
            $message = "El Servicio que intenta Registrar ya Exite!!";
        }

        Session::flash('message', $message);

        return redirect('services');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('Service.update')->with('service', $service);
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
            'name' => 'required|min:3',
            'url' => 'required',
            'position' => 'required|numeric',
            'icon' => 'required'
        ]);
        
        $name = $request->input('name');
        $service = Service::where('name','=',$name)->first();

        if($service === null){
            try{
                Service::where('id','=',$request->input('id'))
                    ->update([
                        'name' => $request->input('name'),
                        'url' => $request->input('url'),
                        'position' => $request->input('position'),
                        'icon' => $request->input('icon')
                    ]);
                $message = "Servicio Modificado con Exito!!";
            }catch(\Exception $e){
                $message = "Ocurrio un error al tratar de modificar el Servicio!!";
            }
        }else{
            $message = "El Servicio que intenta modificar ya Existe!!";
        }

        Session::flash('message', $message);

        return redirect('services');
    }

    public function activate($id){
        try{
            Service::where('id','=',$id)
                ->update(['isactive' => 'Y']);
            $message = "Servicio Activado con Exito!!"; 
        }catch(\Exception $e){
            $message = "Ocurrio un Error al Tratar de Activar el Servicio!!";
        }

        Session::flash('message', $message);

        return redirect('services');
    }

    public function inactivate($id){
        try{
            Service::where('id','=',$id)
                ->update(['isactive' => 'N']);
            $message = "Servicio Desactivado con Exito!!"; 
        }catch(\Exception $e){
            $message = "Ocurrio un Error al Tratar de desactivar el Servicio!!";
        }

        Session::flash('message', $message);

        return redirect('services');
    }
}
