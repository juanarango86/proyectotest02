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
                    <h3 class="panel-title">Nueva Encuesta</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form class="needs-validation" novalidate method="POST" action="{{route('encuestasstore')}}">
                            <!--   {!!Form::open(array('url'=>'Encuesta','method'=>'POST','autocomplete'=>'off'))!!}
						{{Form::token()}} -->
                            @csrf

                            <div class="row">
							    <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nombre" class="form-control" id="validationCustom03"
                                            placeholder="Nombre" required value="{{old('nombre')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar el Nombre
                                        </div>
                                        <!-- {!! $errors->first('edad_Minima','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>
								
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group form-rounde">
                                      <select type="text" name="id_Proyecto" class="form-control" id="validationCustom03"
                                              data-live-search="true">
                                        <option value="" enabled>Seleccione el Proyecto</option>
                
                                        @foreach($proyectos as $pro)
                
                                        <option value="{{$pro->Id_Proyecto}}">{{$pro->Nombre_Proyecto}}</option>
                        
                                        @endforeach
                                      </select> 
                                        {{-- <input type="number" name="id_Proyecto" class="form-control form-rounded" id="validationCustom03"
                                            placeholder="Id_Proyecto" required placeholder="id_Proyecto"
                                            value="{{old('id_Proyecto')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar el Id_Proyecto
                                        </div>
                                        <!--  {!! $errors->first('nombre_De_Poblacion','<span style=color:blue;">:message</span>')!!} --> --}}

                                    </div>

                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <select type="text" name="estado" class="form-control" id="validationCustom03"
                                            placeholder="Estado" required value="{{old('estado')}}" readonly>
                                    <option value="1">Inicial sin Informacion</option>
                                  
                                    </select>
                                        <!-- {!! $errors->first('id_Cliente','<span style=color:blue;">:message</span>')!!} -->
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <select type="text" name="id_Formulario" class="form-control" id="validationCustom03"
                                                data-live-search="true">
                                         <option value="" enabled>Seleccione el Formulario</option>
          
                                         @foreach($formularios as $form)
          
                                          <option value="{{$form->Id_Formulario}}">{{$form->Nombre}}</option>
                  
                                         @endforeach
                                       </select> 

                               {{--          <input type="number" name="id_Formulario" class="form-control" id="validationCustom03"
                                            placeholder="Id_Formulario" required value="{{old('id_Formulario')}}">
                                        <div class="invalid-feedback">
                                            Debe ingresar el Id_Formulario
                                        </div>
                                        <!-- {!! $errors->first('edad_Maxima','<span style=color:blue;">:message</span>')!!} --> --}}
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" value="Guardar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block"">
                                    <a href="{{ route('Encuesta.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-info btn-block">Atrás</a>
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
