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
                    <h3 class="panel-title">Nuevo Tipo_de_poblacion</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form class="needs-validation" novalidate method="POST" action="{{route('tipo_de_poblacionsstore')}}">
                            <!--   {!!Form::open(array('url'=>'Tipo_de_poblacion','method'=>'POST','autocomplete'=>'off'))!!}
						{{Form::token()}} -->
                            @csrf
                            <!--  <form class="needs-validation" novalidate> -->


                            <!-- <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="validationCustom01" class="">Nombre Cliente</label>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                placeholder="Nombre Cliente" value="" required>
                                        </div>
                                        <div class="valid-feedback">
                                            Correcto!
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="exampleSelect"
                                                class="">Descripcion</label>
                                            <select name="select" id="exampleSelect" class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
 -->
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group form-rounde">
                                        <input type="text" name="nombre_De_Poblacion" class="form-control form-rounded" id="validationCustom03"
                                            placeholder="Nombre_De_Poblacion" required placeholder="Nombre_De_Poblacion"
                                            value="{{old('nombre_De_Poblacion')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar el nombre completo de la poblacion
                                        </div>
                                        <!--  {!! $errors->first('nombre_De_Poblacion','<span style=color:blue;">:message</span>')!!} -->

                                    </div>

                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="edad_Minima" class="form-control" id="validationCustom03"
                                            placeholder="Edad_Minima" required value="{{old('edad_Minima')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar la edad minima de la poblacion
                                        </div>
                                        <!-- {!! $errors->first('edad_Minima','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="edad_Maxima" class="form-control" id="validationCustom03"
                                            placeholder="Edad_Maxima" required value="{{old('edad_Maxima')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar la edad maxima de la poblacion
                                        </div>
                                        <!-- {!! $errors->first('edad_Maxima','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="estrato_Social" class="form-control" id="validationCustom03"
                                            placeholder="Estrato_Social" required value="{{old('estrato_Social')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar el estrato social de la poblacion
                                        </div>
                                        <!-- {!! $errors->first('direccion','<span style=color:blue;">:message</span>')
                                        !!} -->
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" value="Guardar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block"">
                                    <a href="{{ route('Tipo_de_poblacion.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
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
