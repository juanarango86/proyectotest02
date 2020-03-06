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
                    <h3 class="panel-title">Nuevo Cliente</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form class="needs-validation" novalidate method="POST" action="{{route('clientesstore')}}">
                            <!--   {!!Form::open(array('url'=>'Cliente','method'=>'POST','autocomplete'=>'off'))!!}
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
                                        <input type="text" name="nombre" class="form-control form-rounded" id="validationCustom03"
                                            placeholder="Nombre" required placeholder="Nombre"
                                            value="{{old('nombre')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar el nombre completo del ciente o el nombre de la empresa
                                        </div>
                                        <!--  {!! $errors->first('nombre','<span style=color:blue;">:message</span>')!!} -->

                                    </div>

                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="telefono" class="form-control" id="validationCustom03"
                                            placeholder="Telefono" required value="{{old('telefono')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar el numero de telefono del cliente
                                        </div>
                                        <!-- {!! $errors->first('telefono','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="celular" class="form-control" id="validationCustom03"
                                            placeholder="Celular" required value="{{old('celular')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar el numero de celular del cliente
                                        </div>
                                        <!-- {!! $errors->first('celular','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="direccion" class="form-control" id="validationCustom03"
                                            placeholder="Direccion" required value="{{old('direccion')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar la direccion del cliente
                                        </div>
                                        <!-- {!! $errors->first('direccion','<span style=color:blue;">:message</span>')
                                        !!} -->
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="correo" class="form-control" id="validationCustom03"
                                            placeholder="Correo Electronico" required value="{{old('correo')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar una cuenta de correo electronico valida
                                        </div>
                                        <!-- {!! $errors->first('correo','<span style=color:blue;">:message</span>')
                                        !!} -->
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <textarea type="text" name="descripcion" class="form-control"
                                            id="validationCustom03" placeholder="Descripcion (Sector Empresarial)"
                                            required value="{{old('descripcion')}}"></textarea>
                                        <div class="invalid-feedback">
                                            El campo descripcion no puede estar vacio
                                        </div>
                                        <!--  {!! $errors->first('descripcion','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" value="Guardar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block"">
                                    <a href="{{ route('Cliente.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
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
