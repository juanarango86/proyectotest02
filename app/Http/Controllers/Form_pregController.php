<?php

namespace App\Http\Controllers;

use App\Form_preg;
use Illuminate\Http\Request;
/* use App\Http\Controllers\Controller; */
use App\Http\Requests\Form_pregFormRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Form_pregController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $form_pregs=Form_preg::orderBy('Id_form_preg','DESC')->paginate();
        return view('Form_preg.index',compact('form_pregs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Form_preg.create',['form_preg'=>new Form_preg()]);
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
        $form_pregs=Form_preg::find($id);
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
        $form_preg=Form_preg::where('Id_form_preg',$Id_form_preg)->first();
        return view('Form_preg.edit',compact('form_preg'));
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
        //
       /*  $this->validate($request,['nombre'=>'required', 'descripcion'=>'required', 'telefono'=>'required', 'celular'=>'required', 'correo'=>'required']);
  */

       /*  Cliente::find($id)->update($request->all());
        return redirect()->route('Cliente.index')->with('success','Registro actualizado satisfactoriamente');
  */
        $form_preg=Form_preg::where('Id_form_preg', $Id_form_preg)->update([


        'Id_Pregunta'=>$request->id_Pregunta,
        'Id_Formulario'=>$request->id_Formulario,
		'Id_Respuesta'=>$request->id_Respuesta,
        
        ]);

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
