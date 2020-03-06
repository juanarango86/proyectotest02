<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Rol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioFormRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Illuminate\Support\Facades\Redirect;
use DB;

class UsuarioController extends Controller
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
            $usuarios=DB::table('usuarios')
            ->join('rols','rols.Id_Rol','usuarios.Id_Rol')
            ->select('usuarios.*','rols.Nombre as rols_Nombre')
            ->where('rols.Id_Rol','LIKE','%'.$sql.'%')
            ->where('usuarios.Id_Rol','LIKE','%'.$sql.'%')
            ->orderBy('usuarios.Id_Usuario','desc')
            ->groupBy('usuarios.Id_Usuario','rols.Nombre')
            ->paginate(8);
             return view('Usuario.index',["usuarios"=>$usuarios,"buscarTexto"=>$sql]);
        
        //$usuarios=Usuario::orderBy('Id_Usuario','DESC')->paginate();
        //return view('Usuario.index',compact('usuarios'));
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rols=DB::table('rols')->get();
        return view('Usuario.create',["rols"=>$rols]);
        //
        //return view('Usuario.create',['usuario'=>new Usuario()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(UsuarioFormRequest $request)
    {

        $usuario= new Usuario();
        $usuario->Nombre=$request->input('nombre');
        $usuario->Id_Rol=$request->input('id_Rol');   
        $usuario->Correo_Electronico=$request->input('correo_Electronico');   
        $usuario->Contrasena=$request->input('contrasena');   
        $usuario->Fecha_Nacimiento=$request->input('fecha_Nacimiento');
        $usuario->Direccion=$request->input('direccion');  
        $usuario->Telefono=$request->input('telefono');
        $usuario->Celular=$request->input('celular');
        $usuario->save();

        return redirect()->route('Usuario.index')->with('success','Registro creado satisfactoriamente');
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
        $usuarios=Usuario::find($id);
        return view('Usuario.index',compact('usuarios'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_Usuario)
    {
        $rols=DB::table('rols')->get();
        $usuarios=Usuario::where('Id_Usuario',$Id_Usuario)->first();
        return view('Usuario.edit',compact('usuarios','rols'));
        //$usuario=Usuario::where('Id_Usuario',$Id_Usuario)->first();
        //return view('Usuario.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioFormRequest $request, $Id_Usuario)
    {
        $usuario= Usuario::findOrFail($Id_Usuario);
        $usuario->Nombre=$request->input('nombre');
        $usuario->Id_Rol=$request->input('id_Rol');   
        $usuario->Correo_Electronico=$request->input('correo_Electronico');   
        $usuario->Contrasena=$request->input('contrasena');   
        $usuario->Fecha_Nacimiento=$request->input('fecha_Nacimiento');
        $usuario->Direccion=$request->input('direccion');  
        $usuario->Telefono=$request->input('telefono');
        $usuario->Celular=$request->input('celular');
        $usuario->save();
        
        return redirect()->route('usuarioslistado'); 

/*         $usuario=Usuario::where('Id_Usuario', $Id_Usuario)->update([


        'Nombre'=>$request->nombre,
        'Id_Rol'=>$request->id_Rol,
        'Correo_Electronico'=>$request->correo_Electronico,
        'Contrasena'=>$request->contrasena,
        'Fecha_Nacimiento'=>$request->fecha_Nacimiento,
        'Direccion'=>$request->direccion,
        'Telefono'=>$request->telefono,
        'Celular'=>$request->celular,
        
        ]);

        return redirect()->route('usuarioslistado'); */

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Usuario $usuario, $Id_Usuario)
    {
        //
        $usuario=Usuario::where('Id_Usuario',$Id_Usuario)->delete();
        return redirect()->route('usuarioslistado');
    }
}
