<?php

namespace App\Http\Controllers;

use App\Tipo_de_pregunta;
use Illuminate\Http\Request;
use App\Http\Requests\Tipo_de_preguntaFormRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Tipo_de_preguntaController extends Controller
{

    public function index(Request $request)
    {

        $tipo_de_preguntas=Tipo_de_pregunta::orderBy('Id_Tipo_De_Pregunta','DESC')->paginate();
        return view('Tipo_de_pregunta.index',compact('tipo_de_preguntas'));
    }

    public function create()
    {

        return view('Tipo_de_pregunta.create',['tipo_de_pregunta'=>new Tipo_de_pregunta()]);
    }


    public function store(Tipo_de_preguntaFormRequest $request)
    {

        $tipo_de_pregunta= new Tipo_de_pregunta();
        $tipo_de_pregunta->Pregunta=$request->input('pregunta');      
        $tipo_de_pregunta->save();

        return redirect()->route('Tipo_de_pregunta.index')->with('success','Registro creado satisfactoriamente');
    }      

    public function show($id)
    {

        $tipo_de_preguntas=Tipo_de_pregunta::find($id);
        return view('Tipo_de_pregunta.index',compact('tipo_de_preguntas'));
    
    }

    public function edit($Id_Tipo_De_Pregunta)
    {

        $tipo_de_pregunta=Tipo_de_pregunta::where('Id_Tipo_De_Pregunta',$Id_Tipo_De_Pregunta)->first();
        return view('Tipo_de_pregunta.edit',compact('tipo_de_pregunta'));
    }

    public function update(Tipo_de_preguntaFormRequest $request, $Id_Tipo_De_Pregunta)
    {

        $tipo_de_pregunta=Tipo_de_pregunta::where('Id_Tipo_De_Pregunta', $Id_Tipo_De_Pregunta)->update([


        'Pregunta'=>$request->pregunta,
        
        ]);

        return redirect()->route('tipo_de_preguntaslistado');

    }


    public function destroy(Tipo_de_pregunta $tipo_de_pregunta, $Id_Tipo_De_Pregunta)
    {

        $tipo_de_pregunta=Tipo_de_pregunta::where('Id_Tipo_De_Pregunta',$Id_Tipo_De_Pregunta)->delete();
        return redirect()->route('tipo_de_preguntaslistado');

    }
}
