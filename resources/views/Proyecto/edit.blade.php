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
                    <h3 class="panel-title">Actualizar Proyecto</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method='POST' action="{{route('proyectoupdate', $proyectos->Id_Proyecto)}}">
                            {!!method_field('PUT')!!}
                            @csrf
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nombre_Proyecto" id="nombre_Proyecto" class="form-control input-sm"
                                            placeholder="Nombre del proyecto" value="{{$proyectos->Nombre_Proyecto}}">
                                        {!! $errors->first('nombre_Proyecto','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="descripcion" id="descripcion" class="form-control input-sm"
                                            placeholder="descripcion" value="{{$proyectos->Descripcion}}">
                                        {!! $errors->first('descripcion','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>
                                 <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <select type="text" name="id_Cliente" class="form-control" id="validationCustom03"
                                            data-live-search="true">
                                            <!-- <option value="" enabled>Seleccione el Cliente</option> -->
                    
                                            @foreach($clientes as $cli)
                    
                                            <!-- <option value="{{$proyectos->Id_Cliente}}">{{$cli->Nombre}}</option> -->
                                            <option {{$proyectos->Id_Cliente==$cli->Id_Cliente?'selected':''}} value="{{$cli->Id_Cliente}}">{{$cli->Nombre}}</option>
                            
                                            @endforeach
                                    </select>
                                    </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="cantidad_De_Encuestas" class="form-control" id="validationCustom03"
                                            placeholder="Cantidad_De_Encuestas" required value="{{old('cantidad_De_Encuestas')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar la cantidad De Encuestas
                                        </div>
                                        <!-- {!! $errors->first('cantidad_De_Encuestas','<span style=color:blue;">:message</span>')
                                        !!} -->
                                    </div>
                                </div>
                               
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <select type="text" name="id_Tipo_De_Poblacion" class="form-control" id="validationCustom03"
                                            data-live-search="true">
                                            
                                            @foreach($tipo_de_poblacions as $tdp)
                    
                                            <option {{$proyectos->Id_Tipo_De_Poblacion==$tdp->Id_Tipo_De_Poblacion?'selected':''}} value="{{$tdp->Id_Tipo_De_Poblacion}}">{{$tdp->Nombre_De_Poblacion}}</option>
                            
                                            @endforeach
                                    </select>
                                     <!--    {!! $errors->first('id_Cliente','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <select type="text" name="estado" class="form-control" id="validationCustom03"
                                            placeholder="Estado" required value="{{old('estado')}}">
                                    <option value="0">Seleccione el estado actual del proyecto</option>
                                    <option value="1">Inicial sin Encuentas</option>
                                    <option value="2">Ejecucion Encuestas Iniciadas</option>
                                    <option value="3">Finalizado todas las encuestas completadas</option>
                                    </select>
                                        <!-- {!! $errors->first('id_Cliente','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>
                                <!-- <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="estado" class="form-control" id="validationCustom03"
                                            placeholder="Estado" required value="{{old('estado')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar el estado 
                                        </div>
                                        <!-- {!! $errors->first('estado','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div> -->

                            </div>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
									<button type="submit" value="Actualizar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block">Actualizar</button>
                                    <a href="{{ route('Proyecto.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
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
