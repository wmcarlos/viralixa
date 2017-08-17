<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use Session;

class CountryController extends Controller
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
        $countries = Country::all()->sortBy('name');
        return view('Country.all')->with('countries',$countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Country.add');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|min:3',
            'phone_code' => 'required|numeric'
        ]);

        $country = Country::where('name','=',$request->input('name'))->first();

        if($country === null){
            try{
                Country::create($request->all());
                $message = "Pais Registrado con Exito!!";
            }catch(\Exception $e){
                $message = "Ocurrio un error al tratar de Registrar el Pais!!";
            }
        }else{ 
            $message = "El pais que intenta Registrar ya Existe!!";
        }

        Session::flash('message', $message);

        return redirect('countries');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::find($id);

        return view('Country.update')->with('country', $country);
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
        $this->validate($request,[
            'name' => 'required|min:3',
            'phone_code' => 'required|numeric'
        ]);

        $country = Country::where('name','=',$request->input('name'))->first();

        if($country === null){
            try{
                Country::where('id','=',$request->input('id'))
                    ->update([
                        'name' => $request->input('name'),
                        'phone_code' => $request->input('phone_code'),
                        'flag_icon' => $request->input('flag_icon')
                    ]);

                $message = "Pais Modificado con Exito!!";
            }catch(\Exception $e){
                $message = "Ocurrio un error al tratar de Modificar el Pais!!";
            }
        }else{ 
            $message = "El pais que intenta Modificar ya Existe!!";
        }

        Session::flash('message', $message);

        return redirect('countries');
    }

    public function activate($id){
        try{
            Country::where('id','=',$id)
            ->update([
                'isactive' => 'Y'
            ]);

            $message = "Pais Activado con Exito!!";
        }catch(\Exception $e){
            $message = "Ocurrio un error al tratar de activar el Pais!!";
        }

        Session::flash('message', $message);

        return redirect('countries');
    }

    public function inactivate($id){
        try{
            Country::where('id','=',$id)
            ->update([
                'isactive' => 'N'
            ]);

            $message = "Pais Desactivado con Exito!!";
        }catch(\Exception $e){
            $message = "Ocurrio un error al tratar de desactivar el Pais!!";
        }

        Session::flash('message', $message);

        return redirect('countries');
    }
}
