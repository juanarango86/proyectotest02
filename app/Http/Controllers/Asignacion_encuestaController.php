<?php

namespace App\Http\Controllers;

use App\Asignacion_encuesta;
use App\Encuesta;
use App\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Http\Requests\Asignacion_encuestaFormRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Illuminate\Support\Facades\Redirect;
use DB;


class Asignacion_encuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if($request){
            $sql=trim($request->get('buscarTexto'));
            $asignacion_encuestas=DB::table('asignacion_encuestas')
            ->join('encuestas','encuestas.Id_Encuesta','asignacion_encuestas.Id_Encuesta')
            ->join('usuarios','usuarios.Id_Usuario','asignacion_encuestas.Id_Usuario')
            ->select('asignacion_encuestas.*','encuestas.Nombre as encuestas_Nombre','usuarios.Nombre')
            ->where('encuestas.Nombre','LIKE','%'.$sql.'%')
            ->where('usuarios.Nombre','LIKE','%'.$sql.'%')
            ->orderBy('asignacion_encuestas.Id_Asignacion_Encuesta','desc')
            ->groupBy('asignacion_encuestas.Id_Asignacion_Encuesta','encuestas.Nombre','usuarios.Nombre')
            ->paginate(8);
             return view('Asignacion_encuesta.index',["asignacion_encuestas"=>$asignacion_encuestas,"buscarTexto"=>$sql]);
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $encuestas=DB::table('encuestas')->get();
        $usuarios=DB::table('usuarios')->get();
        return view('Asignacion_encuesta.create',["encuestas"=>$encuestas, "usuarios"=>$usuarios]);
        //
        //return view('Asignacion_encuesta.create',['asignacion_encuesta'=>new Asignacion_encuesta()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Asignacion_encuestaFormRequest $request)
    {

        $asignacion_encuesta= new Asignacion_encuesta();
        $asignacion_encuesta->Id_Encuesta=$request->input('id_Encuesta');
        $asignacion_encuesta->Id_Usuario=$request->input('id_Usuario');        
        $asignacion_encuesta->save();

        return redirect()->route('Asignacion_encuesta.index')->with('success','Registro creado satisfactoriamente');
    }      


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $asignacion_encuestas=Asignacion_encuesta::find($id);
        return view('Asignacion_encuesta.index',compact('asignacion_encuestas'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_Asignacion_Encuesta)
    {
		$encuestas=DB::table('encuestas')->get();
        $usuarios=DB::table('usuarios')->get();
        $asignacion_encuestas=Asignacion_encuesta::where('Id_Asignacion_Encuesta',$Id_Asignacion_Encuesta)->first();
        return view('Asignacion_encuesta.edit',compact('asignacion_encuestas','encuestas','usuarios'));
        //
        //$asignacion_encuesta=Asignacion_encuesta::where('Id_Asignacion_Encuesta',$Id_Asignacion_Encuesta)->first();
        //return view('Asignacion_encuesta.edit',compact('asignacion_encuesta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Asignacion_encuestaFormRequest $request, $Id_Asignacion_Encuesta)
    {
        $asignacion_encuesta= Asignacion_encuesta::findOrFail($Id_Asignacion_Encuesta);
        $asignacion_encuesta->Id_Encuesta=$request->input('id_Encuesta');
        $asignacion_encuesta->Id_Usuario=$request->input('id_Usuario');        
        $asignacion_encuesta->save();
        
        return redirect()->route('asignacion_encuestaslistado'); 

        //
       // $asignacion_encuesta=Asignacion_encuesta::where('Id_Asignacion_Encuesta', $Id_Asignacion_Encuesta)->update([


       // 'Id_Encuesta'=>$request->id_Encuesta,
       // 'Id_Usuario'=>$request->id_Usuario,
        
       // ]);

        //return redirect()->route('asignacion_encuestaslistado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 

    public function destroy(Asignacion_encuesta $asignacion_encuesta, $Id_Asignacion_Encuesta)
    {
        //
        $asignacion_encuesta=Asignacion_encuesta::where('Id_Asignacion_Encuesta',$Id_Asignacion_Encuesta)->delete();
        return redirect()->route('asignacion_encuestaslistado');
    }
}
