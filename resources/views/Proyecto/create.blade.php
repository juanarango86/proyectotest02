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
                    <h3 class="panel-title">Nuevo Proyecto</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form class="needs-validation" novalidate method="POST" action="{{route('proyectosstore')}}">
                            <!--   {!!Form::open(array('url'=>'Proyecto','method'=>'POST','autocomplete'=>'off'))!!}
						{{Form::token()}} -->
                            @csrf
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group form-rounde">
                                        <input type="text" name="nombre_Proyecto" class="form-control form-rounded" id="validationCustom03"
                                            placeholder="Nombre_Proyecto" required placeholder="Nombre_Proyecto"
                                            value="{{old('nombre_Proyecto')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar el nombre completo del Proyecto
                                        </div>
                                        <!--  {!! $errors->first('nombre_Proyecto','<span style=color:blue;">:message</span>')!!} -->

                                    </div>

                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="descripcion" class="form-control" id="validationCustom03"
                                            placeholder="Descripcion" required placeholder="Descripcion"
                                            value="{{old('descripcion')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar la descripcion del Proyecto
                                        </div>
                                        <!-- {!! $errors->first('descripcion','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>
                                
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <select type="text" name="id_Cliente" class="form-control" id="validationCustom03"
                                            data-live-search="true">
                                            <option value="" enabled>Seleccione el Cliente</option>
                    
                                            @foreach($clientes as $cli)
                    
                                            <option value="{{$cli->Id_Cliente}}">{{$cli->Nombre}}</option>
                            
                                            @endforeach
                                    </select>
                                        <!-- {!! $errors->first('id_Cliente','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="cantidad_De_Encuestas" class="form-control" id="validationCustom03"
                                            placeholder="Cantidad_De_Encuestas" required value="{{old('cantidad_De_Encuestas')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar la cantidad De Encuestas
                                        </div>
                                        <!-- {!! $errors->first('cantidad_De_Encuestas','<span style=color:blue;">:message</span>')
                                        !!} -->
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <select type="text" name="id_Tipo_De_Poblacion" class="form-control" id="validationCustom03"
                                            data-live-search="true">
                                            <option value="" enabled>Seleccione el tipo de poblacion</option>
                    
                                            @foreach($tipo_de_poblacions as $tdp)
                    
                                            <option value="{{$tdp->Id_Tipo_De_Poblacion}}">{{$tdp->Nombre_De_Poblacion}}</option>
                            
                                            @endforeach
                                    </select>
                                        <!-- {!! $errors->first('id_Cliente','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>
                                <!-- <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="id_Tipo_De_Poblacion" class="form-control" id="validationCustom03"
                                            placeholder="Id_Tipo_De_Poblacion" required value="{{old('id_Tipo_De_Poblacion')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar el id del Tipo De Poblacion
                                        </div>
                                        <!-- {!! $errors->first('id_Tipo_De_Poblacion','<span style=color:blue;">:message</span>')
                                        !!}
                                    </div>
                                </div> -->
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <select type="text" name="estado" class="form-control" id="validationCustom03"
                                            placeholder="Estado" required value="{{old('estado')}}" readonly>
                                    <option value="1">Inicial sin Encuentas</option>
                                  
                                    </select>
                                        <!-- {!! $errors->first('id_Cliente','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>
                                <!-- <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="estado" class="form-control" id="validationCustom03"
                                            placeholder="Estado" required value="{{old('estado')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar el estado
                                        </div>
                                        <!-- {!! $errors->first('estado','<span style=color:blue;">:message</span>')!!}
                                    </div>
                                </div> -->

                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" value="Guardar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block"">
                                    <a href="{{ route('Proyecto.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
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