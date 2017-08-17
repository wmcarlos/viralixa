<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use App\Role;
use App\Country;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->sortBy('name');
        return view('User.all')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->toArray();
        $countries = Country::pluck('name','id')->toArray();
        return view( 'User.add', ['countries' => $countries, 'roles' => $roles] );
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role_id' => 'required',
            'country_id' => 'required'
        ]);

        $user = User::where('email','=',$request->input('email'))->first();

        if($user === null){
            try{

                $user = new User;
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = bcrypt('V1r4l1z4**');
                $user->phone = $request->input('phone');
                $user->role_id = $request->input('role_id');
                $user->country_id = $request->input('country_id');
                $user->avatar = 'ui-sam.jpg';
                $user->active_code = md5('V1r4l1x4**');
                $user->save();

                $message = "Usuario Registrado con Exito!!";
            }catch(\Exception $e){
                $message = "Ocurrio un error al tratar de Registrar el Usuario!!";
            }
        }else{
            $message = "El usuario que intenta Registrar ya Existe";
        }

        Session::flash('message', $message);

        return redirect('users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role_id' => 'required',
            'country_id' => 'required'
        ]);

        $user = User::find($id);

        $data = [
            'user' => $user,
            'roles' => Role::pluck('name','id')->toArray(),
            'countries' => Country::pluck('name','id')->toArray()
        ];

        return view('User.update')->with('data', $data);
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
        $user = User::where('email','=',$request->input('email'))->first();

        if($user === null){
            try{
                User::where('id','=',$request->input('id'))
                    ->update([
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'phone' => $request->input('phone'),
                        'role_id' => $request->input('role_id'),
                        'country_id' => $request->input('country_id')
                    ]);

                $message = "Usuario Modificado con Exito!!";

            }catch(\Exception $e){
                $message = "Ocurrio un error al tratar de actualizar el Usuario!!";
            }
        }else{
            $message = "El usuario que intenta Modificar ya Existe!!";
        }

        Session::flash('message', $message);

        return redirect('users');
    }

    public function activate($id){

        try{
            User::where('id','=',$id)
                ->update([
                    'isactive' => 'Y'
            ]);
            $message = "Usuario Activado con Exito!!";
        }catch(\Exception $e){
            $message = "Ocurrio un error al tratar de Activar el Usuario!!";
        }

        Session::flash('message', $message);

        return redirect('users');

    }

    public function inactivate($id){

        try{
            User::where('id','=',$id)
                ->update([
                    'isactive' => 'N'
            ]);
            $message = "Usuario Desactivado con Exito!!";
        }catch(\Exception $e){
            $message = "Ocurrio un error al tratar de Desactivar el Usuario!!";
        }

        Session::flash('message', $message);

        return redirect('users');

    }

    public function auth(Request $request){

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', '=', $request->input('email'))->where('password','=',sha1($request->input('password')))->first();

        if($user === null){
            $message = "El usuario que ingreso no Existe!!";
            Session::flash('message', $message);
            return redirect('login');
        }else{

            Session([
                'name' => $user->name,
                'email' => $user->email,
                'role_id' => $user->role_id,
                'role' => $user->role()->first()->name,
                'avatar' => $user->avatar,
                'country' => $user->country()->first()->name
            ]);

            return redirect('dashboard');

        }

    }

    public function logout(){

        Session::flush();
        return redirect('login');

    }
}
