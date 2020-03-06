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
                    <h3 class="panel-title">Actualizar Flujo</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method='POST' action="{{route('flujoupdate', $flujos->Id_Flujo)}}">
                            {!!method_field('PUT')!!}
                            @csrf
                            <div class="row">
							
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="orden" id="orden" class="form-control input-sm"
                                            placeholder="Orden" value="{{$flujos->Orden}}">
                                        {!! $errors->first('orden','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>
								
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="salto" id="salto" class="form-control input-sm"
                                            placeholder="salto" value="{{$flujos->Salto}}">
                                        {!! $errors->first('salto','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>
								
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="validacion" id="validacion" class="form-control input-sm"
                                            placeholder="validacion" value="{{$flujos->Validacion}}">
                                        {!! $errors->first('validacion','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>								
								
                                 <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <select type="text" name="id_Pregunta" class="form-control" id="validationCustom03"
                                            data-live-search="true">
                                            <!-- <option value="" enabled>Seleccione el Cliente</option> -->
                    
                                            @foreach($preguntas as $pre)
                    
                                            <!-- <option value="{{$flujos->Id_Pregunta}}">{{$pre->Pregunta}}</option> -->
                                            <option {{$flujos->Id_Pregunta==$pre->Id_Pregunta?'selected':''}} value="{{$pre->Id_Pregunta}}">{{$pre->Pregunta}}</option>
                            
                                            @endforeach
                                    </select>
                                    </div>
                                </div>

                            </div>
                            <br>
							
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
									<button type="submit" value="Actualizar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block">Actualizar</button>
                                    <a href="{{ route('Flujo.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
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
