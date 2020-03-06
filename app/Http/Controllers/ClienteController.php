<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
/* use App\Http\Controllers\Controller; */
use App\Http\Requests\ClienteFormRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $clientes=Cliente::orderBy('Id_Cliente','DESC')->paginate();
        return view('Cliente.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Cliente.create',['cliente'=>new Cliente()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ClienteFormRequest $request)
    {

        $cliente= new Cliente();
       /*  $cliente->cedula=$request->input('cedula'); */
        $cliente->Nombre=$request->input('nombre');
        $cliente->Descripcion=$request->input('descripcion');   
        $cliente->Telefono=$request->input('telefono');   
        $cliente->Celular=$request->input('celular');   
        $cliente->Direccion=$request->input('direccion');
        $cliente->Correo_Electronico=$request->input('correo');  
        $cliente->save();

     /*  echo $request ->input('cedula'). $request->input('nombre').$request->input('descripcion').$request->input('telefono'). $request->input('celular').$request->input('direccion').$request->input('correo');
 */
      /*   var_dump($request); */

        return redirect()->route('Cliente.index')->with('success','Registro creado satisfactoriamente');
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
        $clientes=Cliente::find($id);
        return view('Cliente.index',compact('clientes'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_Cliente)
    {
        //
        $cliente=Cliente::where('Id_Cliente',$Id_Cliente)->first();
        return view('Cliente.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteFormRequest $request, $Id_Cliente)
    {
        //
       /*  $this->validate($request,['nombre'=>'required', 'descripcion'=>'required', 'telefono'=>'required', 'celular'=>'required', 'correo'=>'required']);
  */

       /*  Cliente::find($id)->update($request->all());
        return redirect()->route('Cliente.index')->with('success','Registro actualizado satisfactoriamente');
  */
        $cliente=Cliente::where('Id_Cliente', $Id_Cliente)->update([


        'Nombre'=>$request->nombre,
        'Descripcion'=>$request->descripcion,
        'Telefono'=>$request->telefono,
        'Celular'=>$request->celular,
        'Direccion'=>$request->direccion,
        'Correo_Electronico'=>$request->correo,
        
        ]);

        return redirect()->route('clienteslistado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Cliente $cliente, $Id_Cliente)
    {
        //
        $cliente=Cliente::where('Id_Cliente',$Id_Cliente)->delete();
        return redirect()->route('clienteslistado');
        /* return redirect()->route('Cliente.index')->with('success','Registro eliminado satisfactoriamente');
     */
    }
}
