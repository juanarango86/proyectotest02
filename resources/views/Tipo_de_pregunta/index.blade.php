@extends('layouts.layout')
@section('contenido')
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/datatables.min.js">
</script>
<div class="main-card mb-3 card">
    <div class="card-body">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="pull-left">
                    <h3>Lista  de Tipo_de_pregunta</h3>
                </div>


                <a href="{{ route('Tipo_de_pregunta.create') }}" class="btn btn-outline-primary btn-block">Añadir Tipo_de_pregunta</a>

            </div>
            <br>
            
            <div class="table-responsive">
                <table id="tbltipo_de_preguntas" class="mb-0 table table-bordered table-hover table-sm table-bordered" style="width:100%" cellspacing="0">
                    <thead>
                        <!--  <th scope="col">Id</th> -->
                        <th scope="col">Pregunta</th>
                        <th scope="col">Editar
                        <th scope="col">Eliminar
                    </thead>
                    <tbody>
                        @if($tipo_de_preguntas->count())
                        @foreach($tipo_de_preguntas as $tipo_de_pregunta)
                        <tr>
                            
                            <td>{{$tipo_de_pregunta->Pregunta}}</td>
                            <td>
                                <a href="{{ route('tipo_de_preguntaedit', $tipo_de_pregunta->Id_Tipo_De_Pregunta) }}" type="submit"
                                    class="mb-2 mr-2 btn-transition btn btn-outline-info">Editar</a>
                            </td>
                            <td>
                                <form method="POST" action="{{route('tipo_de_preguntadelete',$tipo_de_pregunta->Id_Tipo_De_Pregunta)}}">
                                    {!!method_field('DELETE')!!}
                                    @csrf
                                    <button type="submit" class="mb-2 mr-2 btn-transition btn btn-outline-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="8">No hay registro !!</td>
                        </tr>
                        @endif
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
{{ $tipo_de_preguntas->links() }}

</section>
<script>
    $(document).ready(function () {
        $('#tbltipo_de_preguntas').DataTable({
            'columnDefs': [
  {
      "targets": 0,// your case first column
      "className": "text-center",
      "width": "0%"
 }, {
      "targets": 1,// your case first column
      "className": "text-center",
      "width": "0%"
 }, {
      "targets": 2,// your case first column
      "className": "text-center",
      "width": "0%"
 },

],
            "language": {
                "lengthMenu": "_MENU_ Registros por pagina",
                "zeroRecords": "Sin Resultados - sorry",
                "search": "Buscar:",
                "info": "Listado _PAGE_ de _PAGES_ Paginas",
                "infoEmpty": "Sin Resultados",
                "infoFiltered": "(Busqueda de un total _MAX_ registros)",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });

</script>

@endsection
