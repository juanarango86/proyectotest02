@extends('Layouts.layout')
@section('contenido')

<div class="main-card mb-3 card">
    <div class="card-body">
        <!-- @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
					@endforeach
					
                </ul>
            </div>
            @endif -->


        @if(Session::has('success'))
        <div class="alert alert-info">
            {{Session::get('success')}}
        </div>
        @endif

        <div class="card-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Editar Encuestas</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method='POST' action="{{route('encuestaupdate', $encuestas->Id_Encuesta)}}">
                            {!!method_field('PUT')!!}
                            @csrf
                            <div class="row">
							   <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm"
                                            placeholder="nombre" value="{{$encuestas->Nombre}}">
                                        {!! $errors->first('nombre','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>
								
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <select type="text" name="id_Proyecto" class="form-control" id="validationCustom03"
                                                data-live-search="true">
                                           <!-- <option value="" enabled>Seleccione el Cliente</option> -->
                
                                           @foreach($proyectos as $pro)
                
                                            <!-- <option value="{{$encuestas->Id_Proyecto}}">{{$pro->Nombre_Proyecto}}</option> -->
                                            <option {{$encuestas->Id_Proyecto==$pro->Id_Proyecto?'selected':''}} value="{{$pro->Id_Proyecto}}">{{$pro->Nombre_Proyecto}}</option>
                        
                                           @endforeach
                                       </select>

                                       {{--  <input type="number" name="id_Proyecto" id="id_Proyecto" class="form-control input-sm"
                                            placeholder="id_Proyecto" value="{{$encuesta->Id_Proyecto}}">
                                        {!! $errors->first('id_Proyecto','<span style=color:blue;">:message</span>')!!} --}}

                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="estado" id="estado" class="form-control input-sm"
                                            placeholder="estado" value="{{$encuestas->Estado}}">
                                        {!! $errors->first('estado','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <select type="text" name="id_Formulario" class="form-control" id="validationCustom03"
                                                data-live-search="true">
                                           <!-- <option value="" enabled>Seleccione el Cliente</option> -->
                
                                           @foreach($formularios as $form)
                
                                            <!-- <option value="{{$encuestas->Id_Formulario}}">{{$form->Nombre}}</option> -->
                                            <option {{$encuestas->Id_Formulario==$form->Id_Formulario?'selected':''}} value="{{$form->Id_Formulario}}">{{$form->Nombre}}</option>
                        
                                           @endforeach
                                       </select>                                        

                               {{--          <input type="number" name="id_Formulario" id="id_Formulario" class="form-control input-sm"
                                            placeholder="id_Formulario" value="{{$encuesta->Id_Formulario}}">
                                        {!! $errors->first('id_Formulario','<span style=color:blue;">:message</span>')!!} --}}
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
									<button type="submit" value="Actualizar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block">Actualizar</button>
                                  <!--   <input type="submit" value="Guardar" class="btn btn-success btn-block"> -->
                                    <a href="{{ route('Encuesta.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</section>
@endsection
