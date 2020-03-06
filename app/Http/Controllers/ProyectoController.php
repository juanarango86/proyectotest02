<?php

namespace App\Http\Controllers;


use App\Proyecto;
use App\Cliente;
use App\Tipo_de_poblacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Http\Requests\ProyectoFormRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Illuminate\Support\Facades\Redirect;
use DB;

class ProyectoController extends Controller
{    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if($request){
            $sql=trim($request->get('buscarTexto'));
            $proyectos=DB::table('proyectos')
            ->join('clientes','clientes.Id_Cliente','proyectos.Id_Cliente')
            ->join('tipo_de_poblacions','tipo_de_poblacions.Id_Tipo_De_Poblacion','proyectos.Id_Tipo_De_Poblacion')
            ->select('proyectos.*','clientes.Nombre','tipo_de_poblacions.Nombre_De_Poblacion')
            ->where('Nombre_Proyecto','LIKE','%'.$sql.'%')
            /* ->where('Descripcion','LIKE','%'.$sql.'%') */
            ->where('Nombre','LIKE','%'.$sql.'%')
            ->where('Cantidad_De_Encuestas','LIKE','%'.$sql.'%')
            ->where('Nombre_De_Poblacion','LIKE','%'.$sql.'%')
            ->where('Estado','LIKE','%'.$sql.'%')
            ->orderBy('proyectos.Id_Proyecto','desc')
            ->groupBy('proyectos.Id_Proyecto','proyectos.Nombre_Proyecto',
            'proyectos.Descripcion','proyectos.Cantidad_De_Encuestas',
            'proyectos.Estado','clientes.Nombre','tipo_de_poblacions.Nombre_De_Poblacion')
            ->paginate(8);
             return view('Proyecto.index',["proyectos"=>$proyectos,"buscarTexto"=>$sql]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes=DB::table('clientes')->get();
        $tipo_de_poblacions=DB::table('tipo_de_poblacions')->get();
        return view('Proyecto.create',["clientes"=>$clientes, "tipo_de_poblacions"=>$tipo_de_poblacions]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProyectoFormRequest $request)
    {
        $proyecto= new Proyecto();
        $proyecto->Nombre_Proyecto=$request->input('nombre_Proyecto');
        $proyecto->Descripcion=$request->input('descripcion');   
        $proyecto->Id_Cliente=$request->input('id_Cliente');   
        $proyecto->Cantidad_De_Encuestas=$request->input('cantidad_De_Encuestas');   
        $proyecto->Id_Tipo_De_Poblacion=$request->input('id_Tipo_De_Poblacion');
        $proyecto->Estado=$request->input('estado');  
        $proyecto->save();

        return redirect()->route('Proyecto.index')->with('success','Registro creado satisfactoriamente');
    }      
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyectos=Proyecto::find($id);
        return view('Proyecto.index',compact('proyectos'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_Proyecto)
    {        
        $clientes=DB::table('clientes')->get();
        $tipo_de_poblacions=DB::table('tipo_de_poblacions')->get();
        $proyectos=Proyecto::where('Id_Proyecto',$Id_Proyecto)->first();
        return view('Proyecto.edit',compact('proyectos','clientes','tipo_de_poblacions'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProyectoFormRequest $request, $Id_Proyecto)
    {     

        $proyecto= Proyecto::findOrFail($Id_Proyecto);
        $proyecto->Nombre_Proyecto=$request->input('nombre_Proyecto');
        $proyecto->Descripcion=$request->input('descripcion');   
        $proyecto->Id_Cliente=$request->input('id_Cliente');   
        $proyecto->Cantidad_De_Encuestas=$request->input('cantidad_De_Encuestas');   
        $proyecto->Id_Tipo_De_Poblacion=$request->input('id_Tipo_De_Poblacion');
        $proyecto->Estado=$request->input('estado');  
   
        $proyecto->save();
        
        return redirect()->route('proyectoslistado'); 

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto, $Id_Proyecto)
    {
        $proyecto=Proyecto::where('Id_Proyecto',$Id_Proyecto)->delete();
        return redirect()->route('proyectoslistado');
    }
}
