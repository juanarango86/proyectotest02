<?php

namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;
use App\Http\Requests\RolFormRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class RolController extends Controller
{

    public function index(Request $request)
    {

        $rols=Rol::orderBy('Id_Rol','DESC')->paginate();
        return view('Rol.index',compact('rols'));
    }

    public function create()
    {

        return view('Rol.create',['rol'=>new Rol()]);
    }


    public function store(RolFormRequest $request)
    {

        $rol= new Rol();
        $rol->Nombre=$request->input('nombre');      
        $rol->save();

        return redirect()->route('Rol.index')->with('success','Registro creado satisfactoriamente');
    }      

    public function show($id)
    {

        $rols=Rol::find($id);
        return view('Rol.index',compact('rols'));
    
    }

    public function edit($Id_Rol)
    {

        $rol=Rol::where('Id_Rol',$Id_Rol)->first();
        return view('Rol.edit',compact('rol'));
    }

    public function update(RolFormRequest $request, $Id_Rol)
    {

        $rol=Rol::where('Id_Rol', $Id_Rol)->update([


        'Nombre'=>$request->nombre,
        
        ]);

        return redirect()->route('rolslistado');

    }


    public function destroy(Rol $rol, $Id_Rol)
    {

        $rol=Rol::where('Id_Rol',$Id_Rol)->delete();
        return redirect()->route('rolslistado');

    }
}
