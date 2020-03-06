<?php

namespace App\Http\Controllers;

use App\Opcione;
use Illuminate\Http\Request;
use App\Http\Requests\OpcioneFormRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class OpcioneController extends Controller
{

    public function index(Request $request)
    {

        $opciones=Opcione::orderBy('Id_Opcion','DESC')->paginate();
        return view('Opcione.index',compact('opciones'));
    }

    public function create()
    {

        return view('Opcione.create',['opcione'=>new Opcione()]);
    }


    public function store(OpcioneFormRequest $request)
    {

        $opcione= new Opcione();
        $opcione->Id_Pregunta=$request->input('id_Pregunta');      
        $opcione->save();

        return redirect()->route('Opcione.index')->with('success','Registro creado satisfactoriamente');
    }      

    public function show($id)
    {

        $opciones=Opcione::find($id);
        return view('Opcione.index',compact('opciones'));
    
    }

    public function edit($Id_Opcion)
    {

        $opcione=Opcione::where('Id_Opcion',$Id_Opcion)->first();
        return view('Opcione.edit',compact('opcione'));
    }

    public function update(OpcioneFormRequest $request, $Id_Opcion)
    {

        $opcione=Opcione::where('Id_Opcion', $Id_Opcion)->update([


        'Id_Pregunta'=>$request->id_Pregunta,
        
        ]);

        return redirect()->route('opcioneslistado');

    }


    public function destroy(Opcione $opcione, $Id_Opcion)
    {

        $opcione=Opcione::where('Id_Opcion',$Id_Opcion)->delete();
        return redirect()->route('opcioneslistado');

    }
}
