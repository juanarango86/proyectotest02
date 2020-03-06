<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Proyecto;
use App\Formulario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Http\Requests\EncuestaFormRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Illuminate\Support\Facades\Redirect;
use DB;


class EncuestaController extends Controller
{

    public function index(Request $request)
    {
        
        if($request){
            $sql=trim($request->get('buscarTexto'));
            $encuestas=DB::table('encuestas')
            ->join('proyectos','proyectos.Id_Proyecto','encuestas.Id_Proyecto')
            ->join('formularios','formularios.Id_Formulario','encuestas.Id_Formulario')
            ->select('encuestas.*','proyectos.Nombre_Proyecto','formularios.Nombre  as formularios_Nombre')
            ->where('proyectos.Id_Proyecto','LIKE','%'.$sql.'%')
            ->where('formularios.Id_Formulario','LIKE','%'.$sql.'%')
            ->orderBy('encuestas.Id_Encuesta','desc')
            ->groupBy('encuestas.Id_Encuesta','encuestas.Nombre','proyectos.Nombre_Proyecto','encuestas.Estado','formularios.Nombre')
            ->paginate(8);
             return view('Encuesta.index',["encuestas"=>$encuestas,"buscarTexto"=>$sql]);
        //
       // $encuestas=Encuesta::orderBy('Id_Encuesta','DESC')->paginate();
       // return view('Encuesta.index',compact('encuestas'));
    }
  }   

    public function create()
    {
        $proyectos=DB::table('proyectos')->get();
        $formularios=DB::table('formularios')->get();
        return view('Encuesta.create',["proyectos"=>$proyectos, "formularios"=>$formularios]);
        //return view('Encuesta.create',['encuesta'=>new Encuesta()]);
    }


    public function store(EncuestaFormRequest $request)
    {

        $encuesta= new Encuesta();
		$encuesta->Nombre=$request->input('nombre');
        $encuesta->Id_Proyecto=$request->input('id_Proyecto');
        $encuesta->Estado=$request->input('estado');   
        $encuesta->Id_Formulario=$request->input('id_Formulario');        
        $encuesta->save();

        return redirect()->route('Encuesta.index')->with('success','Registro creado satisfactoriamente');
    }      

    public function show($id)
    {

        $encuestas=Encuesta::find($id);
        return view('Encuesta.index',compact('encuestas'));
    
    }

    public function edit($Id_Encuesta)
    {
		$proyectos=DB::table('proyectos')->get();
        $formularios=DB::table('formularios')->get();
        $encuestas=Encuesta::where('Id_Encuesta',$Id_Encuesta)->first();
        return view('Encuesta.edit',compact('encuestas','proyectos','formularios'));
        //$encuesta=Encuesta::where('Id_Encuesta',$Id_Encuesta)->first();
        //return view('Encuesta.edit',compact('encuesta'));
    }

    public function update(EncuestaFormRequest $request, $Id_Encuesta)
    {
        $encuesta= Encuesta::findOrFail($Id_Encuesta);
		$encuesta->Nombre=$request->input('nombre');
        $encuesta->Id_Proyecto=$request->input('id_Proyecto');
        $encuesta->Estado=$request->input('estado');   
        $encuesta->Id_Formulario=$request->input('id_Formulario');        
        $encuesta->save();
        
        return redirect()->route('encuestaslistado'); 
/*         $encuesta=Encuesta::where('Id_Encuesta', $Id_Encuesta)->update([

        'Nombre'=>$request->nombre,
        'Id_Proyecto'=>$request->id_Proyecto,
        'Estado'=>$request->estado,
        'Id_Formulario'=>$request->id_Formulario,
        
        ]);

        return redirect()->route('encuestaslistado'); */

    }


    public function destroy(Encuesta $encuesta, $Id_Encuesta)
    {

        $encuesta=Encuesta::where('Id_Encuesta',$Id_Encuesta)->delete();
        return redirect()->route('encuestaslistado');

    }
}
