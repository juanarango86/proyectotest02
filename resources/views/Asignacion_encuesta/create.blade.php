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
                    <h3 class="panel-title">Nueva Asignacion De Encuestas</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form class="needs-validation" novalidate method="POST" action="{{route('asignacion_encuestasstore')}}">
                            <!--   {!!Form::open(array('url'=>'Asignacion_encuesta','method'=>'POST','autocomplete'=>'off'))!!}
						{{Form::token()}} -->
                            @csrf
                             <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group form-rounde">
                                        <select type="text" name="id_Encuesta" class="form-control" id="validationCustom03"
                                            data-live-search="true">
                                            <option value="" enabled>Seleccione la Encuesta</option>
                    
                                            @foreach($encuestas as $enc)
                    
                                            <option value="{{$enc->Id_Encuesta}}">{{$enc->Nombre}}</option>
                            
                                            @endforeach
                                        </select> 
										
																			
										<!--  class="form-control form-rounded" id="validationCustom03"
                                            placeholder="Id_Encuesta" required placeholder="Id_Encuesta"
                                            value="{{old('id_Encuesta')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar el id de la encuesta
                                        </div>  -->
                                        <!--  {!! $errors->first('id_Encuesta','<span style=color:blue;">:message</span>')!!} -->

                                    </div>

                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                       <select type="text" name="id_Usuario" class="form-control" id="validationCustom03"
                                            data-live-search="true">
                                            <option value="" enabled>Seleccione el Usuario</option>
                    
                                            @foreach($usuarios as $usu)
                    
                                            <option value="{{$usu->Id_Usuario}}">{{$usu->Nombre}}</option>
                            
                                            @endforeach
                                       </select>
                                        <!-- {!! $errors->first('id_Usuario','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" value="Guardar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block"">
                                    <a href="{{ route('Asignacion_encuesta.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
                                </div>

                            </div>
                            <!-- </form> -->
                            <!-- {!!form::close()!!} -->
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</section>
@endsection

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

</script>
</div>
</div>
