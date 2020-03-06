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
                    <h3 class="panel-title">Editar Tipo de poblacion</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method='POST' action="{{route('tipo_de_poblacionupdate', $tipo_de_poblacion->Id_Tipo_De_Poblacion)}}">
                            {!!method_field('PUT')!!}
                            @csrf
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nombre_De_Poblacion" id="nombre_De_Poblacion" class="form-control input-sm"
                                            placeholder="nombre_De_Poblacion" value="{{$tipo_de_poblacion->Nombre_De_Poblacion}}">
                                        {!! $errors->first('nombre_De_Poblacion','<span style=color:blue;">:message</span>')!!}

                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="edad_Minima" id="edad_Minima" class="form-control input-sm"
                                            placeholder="edad_Minima" value="{{$tipo_de_poblacion->Edad_Minima}}">
                                        {!! $errors->first('edad_Minima','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="edad_Maxima" id="edad_Maxima" class="form-control input-sm"
                                            placeholder="edad_Maxima" value="{{$tipo_de_poblacion->Edad_Maxima}}">
                                        {!! $errors->first('edad_Maxima','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="estrato_Social" id="estrato_Social" class="form-control input-sm"
                                            placeholder="estrato_Social" value="{{$tipo_de_poblacion->Estrato_Social}}">
                                        {!! $errors->first('estrato_Social','<span style=color:blue;">:message</span>')
                                        !!}
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
									<button type="submit" value="Actualizar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block">Actualizar</button>
                                  <!--   <input type="submit" value="Guardar" class="btn btn-success btn-block"> -->
                                    <a href="{{ route('Tipo_de_poblacion.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
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
