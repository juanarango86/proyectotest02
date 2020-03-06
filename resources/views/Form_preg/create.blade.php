@extends('Layouts.layout')
@section('contenido')

<div class="main-card mb-3 card">
    <div class="card-body">

        @if(Session::has('success'))
        <div class="alert alert-info">
            {{Session::get('success')}}
        </div>
        @endif

        <div class="card-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Nueva Form_preg</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form class="needs-validation" novalidate method="POST" action="{{route('form_pregsstore')}}">
                          
                            @csrf
                             <div class="row">
                                
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <select type="text" name="id_Pregunta" class="form-control" id="validationCustom03"
                                            data-live-search="true">
                                            <option value="" enabled>Seleccione Pregunta</option>
                    
                                            @foreach($preguntas as $fyp)
                    
                                            <option value="{{$fyp->Id_Pregunta}}">{{$fyp->Pregunta}}</option>
                            
                                            @endforeach
                                    </select>
                               
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <select type="text" name="id_Formulario" class="form-control" id="validationCustom03"
                                            data-live-search="true">
                                            <option value="" enabled>Seleccione Formulario</option>
                    
                                            @foreach($formularios as $form)
                    
                                            <option value="{{$form->Id_Formulario}}">{{$form->Nombre}}</option>
                            
                                            @endforeach
                                    </select>
                               
                                    </div>
                                </div>

								
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <select type="text" name="id_Respuesta" class="form-control" id="validationCustom03"
                                            data-live-search="true">
                                            <option value="" enabled>Seleccione Respuesta</option>
                    
                                            @foreach($respuestas as $res)
                    
                                            <option value="{{$res->Id_Respuesta}}">{{$res->Respuesta}}</option>
                            
                                            @endforeach
                                    </select>
                               
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" value="Guardar" class="mb-2 mr-2 btn-transition btn btn-outline-primary btn-block"">
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
