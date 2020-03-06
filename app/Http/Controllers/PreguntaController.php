<?php

namespace App\Http\Controllers;

use App\Pregunta;
use Illuminate\Http\Request;
use App\Http\Requests\PreguntaFormRequest;
use App\Http\Controllers\Controller; 
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use DB;

class PreguntaController extends Controller
{

    public function index(Request $request)
    {
       
        if($request){
            $sql=trim($request->get('buscarTexto'));
            $preguntas=DB::table('preguntas')
            ->join('formularios','formularios.Id_Formulario','preguntas.Id_Formulario')
            ->join('tipo_de_preguntas','tipo_de_preguntas.Id_Tipo_De_Pregunta','preguntas.Id_Tipo_De_Pregunta')
            ->select('preguntas.*','formularios.Nombre','tipo_de_preguntas.Pregunta as tipo_de_preguntas')
          
            ->where('formularios.Nombre','LIKE','%'.$sql.'%') 
            ->where('preguntas.Pregunta','LIKE','%'.$sql.'%') 
            ->where('tipo_de_preguntas.Id_Tipo_De_Pregunta','LIKE','%'.$sql.'%')
            ->orderBy('preguntas.Id_Pregunta','desc')
            ->groupBy('preguntas.Id_Pregunta','preguntas.Pregunta',
            'preguntas.Pregunta', 'preguntas.Pregunta','formularios.Nombre','tipo_de_preguntas.Pregunta')
            ->paginate(8);
             return view('Pregunta.index',["preguntas"=>$preguntas,"buscarTexto"=>$sql]);
        }

    }

    public function create()
    {
        $formularios=DB::table('formularios')->get();
        $tipo_de_preguntas=DB::table('tipo_de_preguntas')->get();
        return view('Pregunta.create',["formularios"=>$formularios, "tipo_de_preguntas"=>$tipo_de_preguntas]);
        /* return view('Pregunta.create',['pregunta'=>new Pregunta()]); */
    }

    public function store(PreguntaFormRequest $request)
    {
        $pregunta= new Pregunta();
        $pregunta->Id_Formulario=$request->input('id_Formulario');
        $pregunta->Pregunta=$request->input('pregunta');   
        $pregunta->Id_Tipo_De_Pregunta=$request->input('id_Tipo_De_Pregunta');        
        $pregunta->save();

        return redirect()->route('Pregunta.index')->with('success','Registro creado satisfactoriamente');
    }      

    public function show($id)
    {

        $preguntas=Pregunta::find($id);
        return view('Pregunta.index',compact('preguntas'));
    
    }

    public function edit($Id_Pregunta)
    {

        $formularios=DB::table('formularios')->get();
        $tipo_de_preguntas=DB::table('tipo_de_preguntas')->get();
        $pregunta=Pregunta::where('Id_Pregunta',$Id_Pregunta)->first();
        return view('Pregunta.edit',compact('pregunta','formularios','tipo_de_preguntas'));
    }

    public function update(PreguntaFormRequest $request, $Id_Pregunta)
    {

        $pregunta=Pregunta::where('Id_Pregunta', $Id_Pregunta)->update([

        'Id_Formulario'=>$request->id_Formulario,
        'Pregunta'=>$request->pregunta,
        'Id_Tipo_De_Pregunta'=>$request->id_Tipo_De_Pregunta,
        
        ]);

        return redirect()->route('preguntaslistado');

    }


    public function destroy(Pregunta $pregunta, $Id_Pregunta)
    {

        $pregunta=Pregunta::where('Id_Pregunta',$Id_Pregunta)->delete();
        return redirect()->route('preguntaslistado');

    }

}
