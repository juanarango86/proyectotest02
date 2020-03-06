<?php

namespace App\Http\Controllers;


use App\Flujo;
use App\Pregunta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Http\Requests\FlujoFormRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Illuminate\Support\Facades\Redirect;
use DB;

class FlujoController extends Controller
{    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if($request){
            $sql=trim($request->get('buscarTexto'));
            $flujos=DB::table('flujos')
            ->join('preguntas','preguntas.Id_Pregunta','flujos.Id_Pregunta')
            ->select('flujos.*','preguntas.Pregunta')
            ->where('preguntas.Id_Pregunta','LIKE','%'.$sql.'%')
            ->where('flujos.Id_Pregunta','LIKE','%'.$sql.'%')
            ->orderBy('flujos.Id_Flujo','desc')
            ->groupBy('flujos.Id_Flujo','preguntas.Pregunta')
            ->paginate(8);
             return view('Flujo.index',["flujos"=>$flujos,"buscarTexto"=>$sql]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $preguntas=DB::table('preguntas')->get();
        return view('Flujo.create',["preguntas"=>$preguntas]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlujoFormRequest $request)
    {
        $flujo= new Flujo();
        $flujo->Orden=$request->input('orden');
        $flujo->Salto=$request->input('salto');   
        $flujo->Validacion=$request->input('validacion');   
        $flujo->Id_Pregunta=$request->input('id_Pregunta');    
        $flujo->save();

        return redirect()->route('Flujo.index')->with('success','Registro creado satisfactoriamente');
    }      
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flujos=Flujo::find($id);
        return view('Flujo.index',compact('flujos'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_Flujo)
    {   $preguntas=DB::table('preguntas')->get();     
        $flujos=Flujo::where('Id_Flujo',$Id_Flujo)->first();
        return view('Flujo.edit',compact('flujos','preguntas'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FlujoFormRequest $request, $Id_Flujo)
    {     

        $flujo= Flujo::findOrFail($Id_Flujo);
        $flujo->Orden=$request->input('orden');
        $flujo->Salto=$request->input('salto');   
        $flujo->Validacion=$request->input('validacion');   
        $flujo->Id_Pregunta=$request->input('id_Pregunta');   
   
        $flujo->save();
        
        return redirect()->route('flujoslistado'); 

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flujo $flujo, $Id_Flujo)
    {
        $flujo=Flujo::where('Id_Flujo',$Id_Flujo)->delete();
        return redirect()->route('flujoslistado');
    }
}
