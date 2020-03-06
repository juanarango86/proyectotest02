<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/proyectos',['as'=>'proyectosstore','uses'=>'ProyectoController@store']);
Route::resource('Proyecto','ProyectoController');
Route::get('Proyectos/{Id_Proyecto}/edit',['as'=>'proyectoedit', 'uses'=>'ProyectoController@edit']);
Route::put('Proyecto/{Id_Proyecto}',['as'=>'proyectoupdate', 'uses'=>'ProyectoController@update']);
Route::get('Proyectos/listado',['as'=>'proyectoslistado', 'uses'=>'ProyectoController@index']);
Route::delete('Proyectos/{Id_Proyecto}',['as'=>'proyectodelete', 'uses'=>'ProyectoController@destroy']);

Route::post('/clientes',['as'=>'clientesstore','uses'=>'ClienteController@store']);
Route::resource('Cliente','ClienteController');
Route::get('Clientes/{Id_Cliente}/edit',['as'=>'clienteedit', 'uses'=>'ClienteController@edit']);
Route::put('Clientes/{Id_Cliente}',['as'=>'clienteupdate', 'uses'=>'ClienteController@update']);
Route::get('Clientes/listado',['as'=>'clienteslistado', 'uses'=>'ClienteController@index']);
Route::delete('Clientes/{Id_Cliente}',['as'=>'clientedelete', 'uses'=>'ClienteController@destroy']);


Route::post('/tipo_de_poblacions',['as'=>'tipo_de_poblacionsstore','uses'=>'Tipo_de_poblacionController@store']);
Route::resource('Tipo_de_poblacion','Tipo_de_poblacionController');
Route::get('Tipo_de_poblacions/{Id_Tipo_De_Poblacion}/edit',['as'=>'tipo_de_poblacionedit', 'uses'=>'Tipo_de_poblacionController@edit']);
Route::put('Tipo_de_poblacion/{Id_Tipo_De_Poblacion}',['as'=>'tipo_de_poblacionupdate', 'uses'=>'Tipo_de_poblacionController@update']);
Route::get('Tipo_de_poblacions/listado',['as'=>'tipo_de_poblacionslistado', 'uses'=>'Tipo_de_poblacionController@index']);
Route::delete('Tipo_de_poblacions/{Id_Tipo_De_Poblacion}',['as'=>'tipo_de_poblaciondelete', 'uses'=>'Tipo_de_poblacionController@destroy']);


Route::post('/encuestas',['as'=>'encuestasstore','uses'=>'EncuestaController@store']);
Route::resource('Encuesta','EncuestaController');
Route::get('Encuestas/{Id_Encuesta}/edit',['as'=>'encuestaedit', 'uses'=>'EncuestaController@edit']);
Route::put('Encuesta/{Id_Encuesta}',['as'=>'encuestaupdate', 'uses'=>'EncuestaController@update']);
Route::get('Encuestas/listado',['as'=>'encuestaslistado', 'uses'=>'EncuestaController@index']);
Route::delete('Encuestas/{Id_Encuesta}',['as'=>'encuestadelete', 'uses'=>'EncuestaController@destroy']);


Route::post('/formularios',['as'=>'formulariosstore','uses'=>'FormularioController@store']);
Route::resource('Formulario','FormularioController');
Route::get('Formularios/{Id_Formulario}/edit',['as'=>'formularioedit', 'uses'=>'FormularioController@edit']);
Route::put('Formulario/{Id_Formulario}',['as'=>'formularioupdate', 'uses'=>'FormularioController@update']);
Route::get('Formularios/listado',['as'=>'formularioslistado', 'uses'=>'FormularioController@index']);
Route::delete('Formularios/{Id_Formulario}',['as'=>'formulariodelete', 'uses'=>'FormularioController@destroy']);


Route::post('/rols',['as'=>'rolsstore','uses'=>'RolController@store']);
Route::resource('Rol','RolController');
Route::get('Rols/{Id_Rol}/edit',['as'=>'roledit', 'uses'=>'RolController@edit']);
Route::put('Rol/{Id_Rol}',['as'=>'rolupdate', 'uses'=>'RolController@update']);
Route::get('Rols/listado',['as'=>'rolslistado', 'uses'=>'RolController@index']);
Route::delete('Rols/{Id_Rol}',['as'=>'roldelete', 'uses'=>'RolController@destroy']);


Route::post('/asignacion_encuestas',['as'=>'asignacion_encuestasstore','uses'=>'Asignacion_encuestaController@store']);
Route::resource('Asignacion_encuesta','Asignacion_encuestaController');
Route::get('Asignacion_encuestas/{Id_Asignacion_Encuesta}/edit',['as'=>'asignacion_encuestaedit', 'uses'=>'Asignacion_encuestaController@edit']);
Route::put('Asignacion_encuesta/{Id_Asignacion_Encuesta}',['as'=>'asignacion_encuestaupdate', 'uses'=>'Asignacion_encuestaController@update']);
Route::get('Asignacion_encuestas/listado',['as'=>'asignacion_encuestaslistado', 'uses'=>'Asignacion_encuestaController@index']);
Route::delete('Asignacion_encuestas/{Id_Asignacion_Encuesta}',['as'=>'asignacion_encuestadelete', 'uses'=>'Asignacion_encuestaController@destroy']);


Route::post('/usuarios',['as'=>'usuariosstore','uses'=>'UsuarioController@store']);
Route::resource('Usuario','UsuarioController');
Route::get('Usuarios/{Id_Usuario}/edit',['as'=>'usuarioedit', 'uses'=>'UsuarioController@edit']);
Route::put('Usuario/{Id_Usuario}',['as'=>'usuarioupdate', 'uses'=>'UsuarioController@update']);
Route::get('Usuarios/listado',['as'=>'usuarioslistado', 'uses'=>'UsuarioController@index']);
Route::delete('Usuarios/{Id_Usuario}',['as'=>'usuariodelete', 'uses'=>'UsuarioController@destroy']);


Route::post('/tipo_de_preguntas',['as'=>'tipo_de_preguntasstore','uses'=>'Tipo_de_preguntaController@store']);
Route::resource('Tipo_de_pregunta','Tipo_de_preguntaController');
Route::get('Tipo_de_preguntas/{Id_Tipo_De_Pregunta}/edit',['as'=>'tipo_de_preguntaedit', 'uses'=>'Tipo_de_preguntaController@edit']);
Route::put('Tipo_de_pregunta/{Id_Tipo_De_Pregunta}',['as'=>'tipo_de_preguntaupdate', 'uses'=>'Tipo_de_preguntaController@update']);
Route::get('Tipo_de_preguntas/listado',['as'=>'tipo_de_preguntaslistado', 'uses'=>'Tipo_de_preguntaController@index']);
Route::delete('Tipo_de_preguntas/{Id_Tipo_De_Pregunta}',['as'=>'tipo_de_preguntadelete', 'uses'=>'Tipo_de_preguntaController@destroy']);


Route::post('/preguntas',['as'=>'preguntasstore','uses'=>'PreguntaController@store']);
Route::resource('Pregunta','PreguntaController');
Route::get('Preguntas/{Id_Pregunta}/edit',['as'=>'preguntaedit', 'uses'=>'PreguntaController@edit']);
Route::put('Pregunta/{Id_Pregunta}',['as'=>'preguntaupdate', 'uses'=>'PreguntaController@update']);
Route::get('Preguntas/listado',['as'=>'preguntaslistado', 'uses'=>'PreguntaController@index']);
Route::delete('Preguntas/{Id_Pregunta}',['as'=>'preguntadelete', 'uses'=>'PreguntaController@destroy']);


Route::post('/opciones',['as'=>'opcionesstore','uses'=>'OpcioneController@store']);
Route::resource('Opcione','OpcioneController');
Route::get('Opciones/{Id_Opcion}/edit',['as'=>'opcioneedit', 'uses'=>'OpcioneController@edit']);
Route::put('Opcione/{Id_Opcion}',['as'=>'opcioneupdate', 'uses'=>'OpcioneController@update']);
Route::get('Opciones/listado',['as'=>'opcioneslistado', 'uses'=>'OpcioneController@index']);
Route::delete('Opciones/{Id_Opcion}',['as'=>'opcionedelete', 'uses'=>'OpcioneController@destroy']);


Route::post('/form_pregs',['as'=>'form_pregsstore','uses'=>'Form_pregController@store']);
Route::resource('Form_preg','Form_pregController');
Route::get('Form_pregs/{Id_form_preg}/edit',['as'=>'form_pregedit', 'uses'=>'Form_pregController@edit']);
Route::put('Form_preg/{Id_form_preg}',['as'=>'form_pregupdate', 'uses'=>'Form_pregController@update']);
Route::get('Form_pregs/listado',['as'=>'form_pregslistado', 'uses'=>'Form_pregController@index']);
Route::delete('Form_pregs/{Id_form_preg}',['as'=>'form_pregdelete', 'uses'=>'Form_pregController@destroy']);


Route::post('/respuestas',['as'=>'respuestasstore','uses'=>'RespuestaController@store']);
Route::resource('Respuesta','RespuestaController');
Route::get('Respuestas/{Id_Respuesta}/edit',['as'=>'respuestaedit', 'uses'=>'RespuestaController@edit']);
Route::put('Respuesta/{Id_Respuesta}',['as'=>'respuestaupdate', 'uses'=>'RespuestaController@update']);
Route::get('Respuestas/listado',['as'=>'respuestaslistado', 'uses'=>'RespuestaController@index']);
Route::delete('Respuestas/{Id_Respuesta}',['as'=>'respuestadelete', 'uses'=>'RespuestaController@destroy']);


Route::post('/flujos',['as'=>'flujosstore','uses'=>'FlujoController@store']);
Route::resource('Flujo','FlujoController');
Route::get('Flujos/{Id_Flujo}/edit',['as'=>'flujoedit', 'uses'=>'FlujoController@edit']);
Route::put('Flujo/{Id_Flujo}',['as'=>'flujoupdate', 'uses'=>'FlujoController@update']);
Route::get('Flujos/listado',['as'=>'flujoslistado', 'uses'=>'FlujoController@index']);
Route::delete('Flujos/{Id_Flujo}',['as'=>'flujodelete', 'uses'=>'FlujoController@destroy']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\SendMail($details));
   
    dd("Email is Sent.");
});

Route::get('redirect', function()
{

    alert()->success('Success Message', 'Optional Title');

    return redirect('/home');
});
