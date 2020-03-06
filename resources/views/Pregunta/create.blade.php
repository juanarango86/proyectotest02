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
                    <h3 class="panel-title">Nueva Pregunta</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form class="needs-validation" novalidate method="POST" action="{{route('preguntasstore')}}">
                            <!--   {!!Form::open(array('url'=>'Pregunta','method'=>'POST','autocomplete'=>'off'))!!}
						{{Form::token()}} -->
                            @csrf
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <select type="text" name="id_Formulario" class="form-control"
                                        id="validationCustom03" data-live-search="true">
                                        <option value="" enabled>Seleccione el Formulario</option>

                                        @foreach($formularios as $frm)

                                        <option value="{{$frm->Id_Formulario}}">{{$frm->Nombre}}</option>

                                        @endforeach
                                    </select>
                                    <!-- {!! $errors->first('id_Cliente','<span style=color:blue;">:message</span>')!!} -->
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="pregunta" class="form-control" id="validationCustom03"
                                        placeholder="Pregunta" required value="{{old('pregunta')}}">
                                    <div class="invalid-feedback">
                                        Debe ingresar el Pregunta
                                    </div>
                                    <!-- {!! $errors->first('edad_Minima','<span style=color:blue;">:message</span>')!!} -->
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <select type="text" name="id_Tipo_De_Pregunta" class="form-control"
                                        id="validationCustom03" data-live-search="true">
                                        <option value="" enabled>Seleccione el tipo de Pregunta</option>

                                        @foreach($tipo_de_preguntas as $prg)

                                        <option value="{{$prg->Id_Tipo_De_Pregunta}}">{{$prg->Pregunta}}</option>

                                        @endforeach
                                    </select>
                                    <!-- {!! $errors->first('id_Cliente','<span style=color:blue;">:message</span>')!!} -->
                                </div>
                            </div>
                    
                    <br>

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <input type="submit" value="Guardar"
                                class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block"">
                                    <a href=" {{ route('Pregunta.index') }}"
                                class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
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
