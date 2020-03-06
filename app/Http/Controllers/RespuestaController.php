<?php

namespace App\Http\Controllers;

use App\Respuesta;
use Illuminate\Http\Request;
use App\Http\Requests\RespuestaFormRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class RespuestaController extends Controller
{

    public function index(Request $request)
    {

        $respuestas=Respuesta::orderBy('Id_Respuesta','DESC')->paginate();
        return view('Respuesta.index',compact('respuestas'));
    }

    public function create()
    {

        return view('Respuesta.create',['respuesta'=>new Respuesta()]);
    }


    public function store(RespuestaFormRequest $request)
    {

        $respuesta= new Respuesta();
        $respuesta->Respuesta=$request->input('respuesta');
        $respuesta->Fecha_resp=$request->input('fecha_resp');          
        $respuesta->save();

        return redirect()->route('Respuesta.index')->with('success','Registro creado satisfactoriamente');
    }      

    public function show($id)
    {

        $respuestas=Respuesta::find($id);
        return view('Respuesta.index',compact('respuestas'));
    
    }

    public function edit($Id_Respuesta)
    {

        $respuesta=Respuesta::where('Id_Respuesta',$Id_Respuesta)->first();
        return view('Respuesta.edit',compact('respuesta'));
    }

    public function update(RespuestaFormRequest $request, $Id_Respuesta)
    {

        $respuesta=Respuesta::where('Id_Respuesta', $Id_Respuesta)->update([


        'Respuesta'=>$request->respuesta,
        'Fecha_resp'=>$request->fecha_resp,
        
        ]);

        return redirect()->route('respuestaslistado');

    }


    public function destroy(Respuesta $respuesta, $Id_Respuesta)
    {

        $respuesta=Respuesta::where('Id_Respuesta',$Id_Respuesta)->delete();
        return redirect()->route('respuestaslistado');

    }
}
