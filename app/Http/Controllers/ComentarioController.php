<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;
class ComentarioController extends Controller
{
    public function show($id){
    	$coment= Comentario::where('idMovie', $id)->get();
    	return response()->json(['comentario'=>$coment]);
    }

    public function store(Request $request){
    	if (empty($request->nombre)||empty($request->descripcion)||empty($request->idMovie)) {
    		return response()->json(['mensaje'=>"Campos Vacios",'code'=>'401']);
    	}
    	$coment=new Comentario();
    	$coment->nombre=$request->nombre;
    	$coment->descripcion=$request->descripcion;
    	$coment->idMovie=$request->idMovie;
    	$coment->save();

    	return response()->json(['mensaje'=>"Comentario Guardado",'code'=>'200']);
    }
}
