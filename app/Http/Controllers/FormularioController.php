<?php

namespace App\Http\Controllers;

use App\Formulario;
use Illuminate\Http\Request;
use App\Http\Requests\FormularioFormRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class FormularioController extends Controller
{

    public function index(Request $request)
    {

        $formularios=Formulario::orderBy('Id_Formulario','DESC')->paginate();
        return view('Formulario.index',compact('formularios'));
    }

    public function create()
    {

        return view('Formulario.create',['formulario'=>new Formulario()]);
    }


    public function store(FormularioFormRequest $request)
    {

        $formulario= new Formulario();
        $formulario->Nombre=$request->input('nombre');      
        $formulario->save();

        return redirect()->route('Formulario.index')->with('success','Registro creado satisfactoriamente');
    }      

    public function show($id)
    {

        $formularios=Formulario::find($id);
        return view('Formulario.index',compact('formularios'));
    
    }

    public function edit($Id_Formulario)
    {

        $formulario=Formulario::where('Id_Formulario',$Id_Formulario)->first();
        return view('Formulario.edit',compact('formulario'));
    }

    public function update(FormularioFormRequest $request, $Id_Formulario)
    {

        $formulario=Formulario::where('Id_Formulario', $Id_Formulario)->update([


        'Nombre'=>$request->nombre,
        
        ]);

        return redirect()->route('formularioslistado');

    }


    public function destroy(Formulario $formulario, $Id_Formulario)
    {

        $formulario=Formulario::where('Id_Formulario',$Id_Formulario)->delete();
        return redirect()->route('formularioslistado');

    }
}
