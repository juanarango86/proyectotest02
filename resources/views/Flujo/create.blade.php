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
                    <h3 class="panel-title">Nuevo Flujo</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form class="needs-validation" novalidate method="POST" action="{{route('flujosstore')}}">
                            <!--   {!!Form::open(array('url'=>'Flujo','method'=>'POST','autocomplete'=>'off'))!!}
						{{Form::token()}} -->
                            @csrf
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group form-rounde">
                                        <input type="number" name="orden" class="form-control form-rounded" id="validationCustom03"
                                            placeholder="Orden" required placeholder="Orden"
                                            value="{{old('orden')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar el Orden
                                        </div>
                                        <!--  {!! $errors->first('orden','<span style=color:blue;">:message</span>')!!} -->

                                    </div>

                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="salto" class="form-control" id="validationCustom03"
                                            placeholder="Salto" required placeholder="Salto"
                                            value="{{old('salto')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar el salto
                                        </div>
                                        <!-- {!! $errors->first('descripcion','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>
								
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="validacion" class="form-control" id="validationCustom03"
                                            placeholder="Validacion" required placeholder="Validacion"
                                            value="{{old('validacion')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar la validacion
                                        </div>
                                        <!-- {!! $errors->first('validacion','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>								
                                
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <select type="text" name="id_Pregunta" class="form-control" id="validationCustom03"
                                            data-live-search="true">
                                            <option value="" enabled>Seleccione pregunta</option>
                    
                                            @foreach($preguntas as $pre)
                    
                                            <option value="{{$pre->Id_Pregunta}}">{{$pre->Pregunta}}</option>
                            
                                            @endforeach
                                    </select>
                                        <!-- {!! $errors->first('Id_Pregunta','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>


                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" value="Guardar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block"">
                                    <a href="{{ route('Flujo.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
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