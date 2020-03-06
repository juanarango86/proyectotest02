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
                    <h3 class="panel-title">Editar Pregunta</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method='POST' action="{{route('preguntaupdate', $pregunta->Id_Pregunta)}}">
                            {!!method_field('PUT')!!}
                            @csrf
                            <div class="row">
                               
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <select type="text" name="id_Formulario" class="form-control" id="validationCustom03"
                                            data-live-search="true">
                                            <!-- <option value="" enabled>Seleccione el Cliente</option> -->
                    
                                            @foreach($formularios as $frm)
                    
                                            <option {{$pregunta->Id_Formulario==$frm->Id_Formulario?'selected':''}} value="{{$frm->Id_Formulario}}">{{$frm->Nombre}}</option>
                            
                                            @endforeach

                                    </select>
                                    </div>
                                    </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="pregunta" id="pregunta" class="form-control input-sm"
                                            placeholder="pregunta" value="{{$pregunta->Pregunta}}">
                                        {!! $errors->first('pregunta','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>
                                         
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <select type="text" name="id_Tipo_De_Pregunta" class="form-control" id="validationCustom03"
                                            data-live-search="true">
                                            <!-- <option value="" enabled>Seleccione el Cliente</option> -->
                    
                                            @foreach($tipo_de_preguntas as $tpp)
                    
                                            <option {{$pregunta->Id_Tipo_De_Pregunta==$tpp->Id_Tipo_De_Pregunta?'selected':''}} value="{{$tpp->Id_Tipo_De_Pregunta}}">{{$tpp->Pregunta}}</option>
                            
                                            @endforeach

                                    </select>
                                    </div>
                                    </div>

                                    </div>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
									<button type="submit" value="Actualizar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block">Actualizar</button>
                                  <!--   <input type="submit" value="Guardar" class="btn btn-success btn-block"> -->
                                    <a href="{{ route('Pregunta.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
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
