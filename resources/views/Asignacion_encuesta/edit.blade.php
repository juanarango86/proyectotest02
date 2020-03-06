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
                    <h3 class="panel-title">Editar Asignacion_encuesta</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method='POST' action="{{route('asignacion_encuestaupdate', $asignacion_encuestas->Id_Asignacion_Encuesta)}}">
                            {!!method_field('PUT')!!}
                            @csrf
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
									  <select type="text" name="id_Encuesta" class="form-control" id="validationCustom03"
                                            data-live-search="true">
                                            <!-- <option value="" enabled>Seleccione el Cliente</option> -->
                    
                                            @foreach($encuestas as $enc)
                    
                                            <!-- <option value="{{$asignacion_encuestas->Id_Encuesta}}">{{$enc->Nombre}}</option> -->
                                            <option {{$asignacion_encuestas->Id_Encuesta==$enc->Id_Encuesta?'selected':''}} value="{{$enc->Id_Encuesta}}">{{$enc->Nombre}}</option>
                            
                                            @endforeach
                                       </select>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
									   <select type="text" name="id_Usuario" class="form-control" id="validationCustom03"
                                            data-live-search="true">
                                            <!-- <option value="" enabled>Seleccione el Cliente</option> -->
                    
                                            @foreach($usuarios as $usu)
                    
                                            <!-- <option value="{{$asignacion_encuestas->Id_Usuario}}">{{$usu->Nombre}}</option> -->
                                            <option {{$asignacion_encuestas->Id_Usuario==$usu->Id_Usuario?'selected':''}} value="{{$usu->Id_Usuario}}">{{$usu->Nombre}}</option>
                            
                                            @endforeach
                                       </select>
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
									<button type="submit" value="Actualizar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block">Actualizar</button>
                                    <a href="{{ route('Asignacion_encuesta.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
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
