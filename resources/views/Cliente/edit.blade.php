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
                    <h3 class="panel-title">Editar Cliente</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method='POST' action="{{route('clienteupdate', $cliente->Id_Cliente)}}">
                            {!!method_field('PUT')!!}
                            @csrf
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm"
                                            placeholder="Nombre" value="{{$cliente->Nombre}}">
                                        {!! $errors->first('nombre','<span style=color:blue;">:message</span>')!!}

                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="telefono" id="telefono" class="form-control input-sm"
                                            placeholder="telefono" value="{{$cliente->Telefono}}">
                                        {!! $errors->first('telefono','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="celular" id="celular" class="form-control input-sm"
                                            placeholder="celular" value="{{$cliente->Celular}}">
                                        {!! $errors->first('celular','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="direccion" id="direccion" class="form-control input-sm"
                                            placeholder="direccion" value="{{$cliente->Direccion}}">
                                        {!! $errors->first('direccion','<span style=color:blue;">:message</span>')
                                        !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="correo" id="correo" class="form-control input-sm"
                                            placeholder="correo" value="{{$cliente->Correo_Electronico}}">
                                        {!! $errors->first('correo','<span style=color:blue;">:message</span>')
                                        !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <textarea type="text" name="descripcion" id='descripcion'
                                            class="form-control input-sm" placeholder="descripcion"
                                            >{{$cliente->Descripcion}}</textarea>
                                        {!! $errors->first('descripcion','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
									<button type="submit" value="Actualizar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block">Actualizar</button>
                                  <!--   <input type="submit" value="Guardar" class="btn btn-success btn-block"> -->
                                    <a href="{{ route('Cliente.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
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
