<?php

namespace App\Http\Controllers;

use App\Tipo_de_poblacion;
use Illuminate\Http\Request;
/* use App\Http\Controllers\Controller; */
use App\Http\Requests\Tipo_de_poblacionFormRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Tipo_de_poblacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tipo_de_poblacions=Tipo_de_poblacion::orderBy('Id_Tipo_De_Poblacion','DESC')->paginate();
        return view('Tipo_de_poblacion.index',compact('tipo_de_poblacions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Tipo_de_poblacion.create',['tipo_de_poblacion'=>new Tipo_de_poblacion()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Tipo_de_poblacionFormRequest $request)
    {

        $tipo_de_poblacion= new Tipo_de_poblacion();
        $tipo_de_poblacion->Nombre_De_Poblacion=$request->input('nombre_De_Poblacion');
        $tipo_de_poblacion->Edad_Minima=$request->input('edad_Minima');   
        $tipo_de_poblacion->Edad_Maxima=$request->input('edad_Maxima');   
        $tipo_de_poblacion->Estrato_Social=$request->input('estrato_Social');     
        $tipo_de_poblacion->save();

     /*  echo $request ->input('cedula'). $request->input('nombre').$request->input('descripcion').$request->input('telefono'). $request->input('celular').$request->input('direccion').$request->input('correo');
 */
      /*   var_dump($request); */

        return redirect()->route('Tipo_de_poblacion.index')->with('success','Registro creado satisfactoriamente');
    }      


        //
       /*  $this->validate($request,['Nombre'=>'required', 'Descripcion'=>'required', 'telefono'=>'required', 
        'celular'=>'required', 'direccion'=>'required', 'correo'=>'required']);
        Cliente::create($request->all());
        return redirect()->route('Cliente.index')->with('success','Registro creado satisfactoriamente');
    */ 
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tipo_de_poblacions=Tipo_de_poblacion::find($id);
        return view('Tipo_de_poblacion.index',compact('tipo_de_poblacions'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_Tipo_De_Poblacion)
    {
        //
        $tipo_de_poblacion=Tipo_de_poblacion::where('Id_Tipo_De_Poblacion',$Id_Tipo_De_Poblacion)->first();
        return view('Tipo_de_poblacion.edit',compact('tipo_de_poblacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tipo_de_poblacionFormRequest $request, $Id_Tipo_De_Poblacion)
    {
        //
       /*  $this->validate($request,['nombre'=>'required', 'descripcion'=>'required', 'telefono'=>'required', 'celular'=>'required', 'correo'=>'required']);
  */

       /*  Cliente::find($id)->update($request->all());
        return redirect()->route('Cliente.index')->with('success','Registro actualizado satisfactoriamente');
  */
        $tipo_de_poblacion=Tipo_de_poblacion::where('Id_Tipo_De_Poblacion', $Id_Tipo_De_Poblacion)->update([


        'Nombre_De_Poblacion'=>$request->nombre_De_Poblacion,
        'Edad_Minima'=>$request->edad_Minima,
        'Edad_Maxima'=>$request->edad_Maxima,
        'Estrato_Social'=>$request->estrato_Social,
        
        ]);

        return redirect()->route('tipo_de_poblacionslistado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Tipo_de_poblacion $tipo_de_poblacion, $Id_Tipo_De_Poblacion)
    {
        //
        $tipo_de_poblacion=Tipo_de_poblacion::where('Id_Tipo_De_Poblacion',$Id_Tipo_De_Poblacion)->delete();
        return redirect()->route('tipo_de_poblacionslistado');
        /* return redirect()->route('Cliente.index')->with('success','Registro eliminado satisfactoriamente');
     */
    }
}
