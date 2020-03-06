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
                    <h3 class="panel-title">Editar Form_preg</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method='POST' action="{{route('form_pregupdate', $form_preg->Id_form_preg)}}">
                            {!!method_field('PUT')!!}
                            @csrf
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="id_Pregunta" id="id_Pregunta" class="form-control input-sm"
                                            placeholder="id_Pregunta" value="{{$form_preg->Id_Pregunta}}">
                                        {!! $errors->first('id_Pregunta','<span style=color:blue;">:message</span>')!!}

                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="id_Formulario" id="id_Formulario" class="form-control input-sm"
                                            placeholder="id_Formulario" value="{{$form_preg->Id_Formulario}}">
                                        {!! $errors->first('id_Formulario','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>
								
								<div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="id_Respuesta" id="id_Respuesta" class="form-control input-sm"
                                            placeholder="id_Respuesta" value="{{$form_preg->Id_Respuesta}}">
                                        {!! $errors->first('id_Respuesta','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
									<button type="submit" value="Actualizar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block">Actualizar</button>
                                    <a href="{{ route('Form_preg.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
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
