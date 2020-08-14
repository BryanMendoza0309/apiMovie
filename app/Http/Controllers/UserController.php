<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->name)||empty($request->email)||empty($request->password)) {
            return response()->json(['mensaje'=>'Campos vacios','color'=>'danger','code'=>406]);
        }

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();

        return response()->json(['mensaje'=>'Registro Guardado','color'=>'success','code'=>201]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name,$password)
    {
        if (empty($name)||empty($password)) {
            return response()->json(['mensaje'=>"Campos vacios",'code'=>'406', 'value'=>'false']);
        }

        $user = User::where('name',$name)->first();

        if (empty($name)) {
            return response()->json(['mensaje'=>"Usuario inexistente",'code'=>'406', 'value'=>'false']);
        }

        if($user->password == $password){
            return response()->json(['mensaje'=>"Bienvenido", 'value'=>'true']);
        }
        return response()->json(['mensaje'=>"Ingrese datos correctos",'code'=>'406', 'value'=>'false']);
    }  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
