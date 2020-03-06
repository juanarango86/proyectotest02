<?php

namespace App\Http\Controllers;

use App\Form_preg;
use Illuminate\Http\Request;
/* use App\Http\Controllers\Controller; */
use App\Http\Requests\Form_pregFormRequest;
use App\Http\Controllers\Controller; 
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use DB;

class Form_pregController extends Controller
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
            $form_pregs=DB::table('form_pregs')
            ->join('preguntas','preguntas.Id_Pregunta','form_pregs.Id_Pregunta')
            ->join('formularios','formularios.Id_Formulario','form_pregs.Id_Formulario')
            ->join('respuestas','respuestas.Id_Respuesta','form_pregs.Id_Respuesta')
            ->select('form_pregs.*','preguntas.Pregunta','formularios.Nombre','respuestas.Respuesta')
            ->where('Pregunta','LIKE','%'.$sql.'%')
            ->where('Nombre','LIKE','%'.$sql.'%')
            ->where('Respuesta','LIKE','%'.$sql.'%')
            ->orderBy('form_pregs.Id_form_preg','desc')
            ->groupBy('form_pregs.Id_form_preg',
            'form_pregs.Id_Pregunta',
            'form_pregs.Id_Formulario',
            'form_pregs.Id_Respuesta',
            'preguntas.Pregunta','formularios.Nombre','respuestas.Respuesta')
            ->paginate(8);
             return view('Form_preg.index',["form_pregs"=>$form_pregs,"buscarTexto"=>$sql]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $preguntas=DB::table('preguntas')->get();
        $formularios=DB::table('formularios')->get();
        $respuestas=DB::table('respuestas')->get();
        return view('Form_preg.create',["preguntas"=>$preguntas, "formularios"=>$formularios, "respuestas"=>$respuestas]);
    
        
        /* return view('Form_preg.create',['form_preg'=>new Form_preg()]); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Form_pregFormRequest $request)
    {

        $form_preg= new Form_preg();
        $form_preg->Id_Pregunta=$request->input('id_Pregunta');
        $form_preg->Id_Formulario=$request->input('id_Formulario');
        $form_preg->Id_Respuesta=$request->input('id_Respuesta');        
        $form_preg->save();
             /*  return redirect()->route('form_pregslistado'); */
        return redirect()->route('Form_preg.index')->with('success','Registro creado satisfactoriamente');
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
        $form_preg=Form_preg::find($id);
        return view('Form_preg.index',compact('form_pregs'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($Id_form_preg)
    {
        //
        $preguntas=DB::table('preguntas')->get();
        $formularios=DB::table('formularios')->get();
        $respuestas=DB::table('respuestas')->get();

        $form_pregs=Form_preg::where('Id_form_preg',$Id_form_preg)->first();
        return view('Form_preg.edit',compact('form_pregs','preguntas','formularios','respuestas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Form_pregFormRequest $request, $Id_form_preg)
    {

    
        $form_preg= Form_preg::findOrFail($Id_form_preg);
        $form_preg->Id_Pregunta=$request->input('id_Pregunta');
        $form_preg->Id_Formulario=$request->input('id_Formulario');   
        $form_preg->Id_Respuesta=$request->input('id_Respuesta');   
  
        $form_preg->save();

        return redirect()->route('form_pregslistado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Form_preg $form_preg, $Id_form_preg)
    {
        //
        $form_preg=Form_preg::where('Id_form_preg',$Id_form_preg)->delete();
        return redirect()->route('form_pregslistado');
    }
}
