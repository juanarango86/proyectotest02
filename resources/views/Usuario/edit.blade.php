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
                    <h3 class="panel-title">Editar Usuario</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method='POST' action="{{route('usuarioupdate', $usuario->Id_Usuario)}}">
                            {!!method_field('PUT')!!}
                            @csrf
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm"
                                            placeholder="nombre" value="{{$usuario->Nombre}}">
                                        {!! $errors->first('nombre','<span style=color:blue;">:message</span>')!!}

                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="id_Rol" id="id_Rol" class="form-control input-sm"
                                            placeholder="id_Rol" value="{{$usuario->Id_Rol}}">
                                        {!! $errors->first('id_Rol','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="correo_Electronico" id="correo_Electronico" class="form-control input-sm"
                                            placeholder="correo_Electronico" value="{{$usuario->Correo_Electronico}}">
                                        {!! $errors->first('correo_Electronico','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="contrasena" id="contrasena" class="form-control input-sm"
                                            placeholder="contrasena" value="{{$usuario->Contrasena}}">
                                        {!! $errors->first('contrasena','<span style=color:blue;">:message</span>')
                                        !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="date" name="fecha_Nacimiento" id="fecha_Nacimiento" class="form-control input-sm"
                                            placeholder="fecha_Nacimiento" value="{{$usuario->Fecha_Nacimiento}}">
                                        {!! $errors->first('fecha_Nacimiento','<span style=color:blue;">:message</span>')
                                        !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="direccion" id="direccion" class="form-control input-sm"
                                            placeholder="direccion" value="{{$usuario->Direccion}}">
                                        {!! $errors->first('direccion','<span style=color:blue;">:message</span>')
                                        !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="telefono" id="telefono" class="form-control input-sm"
                                            placeholder="telefono" value="{{$usuario->Telefono}}">
                                        {!! $errors->first('telefono','<span style=color:blue;">:message</span>')
                                        !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="celular" id="celular" class="form-control input-sm"
                                            placeholder="celular" value="{{$usuario->Celular}}">
                                        {!! $errors->first('celular','<span style=color:blue;">:message</span>')
                                        !!}
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
									<button type="submit" value="Actualizar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block">Actualizar</button>
                                    <a href="{{ route('Usuario.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
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
