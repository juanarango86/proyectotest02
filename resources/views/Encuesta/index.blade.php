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
                    <h3>Lista  de Encuestas</h3>
                </div>


                <a href="{{ route('Encuesta.create') }}" class="btn btn-outline-primary btn-block">Añadir Encuestas</a>

            </div>
            <br>
            
            <div class="table-responsive">
                <table id="tblencuestas" class="mb-0 table table-bordered table-hover table-sm table-bordered" style="width:100%" cellspacing="0">
                    <thead>
                        <th scope="col">Nombre</th>
                        <th scope="col">Proyecto</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Formulario</th>
                        <th scope="col">Editar
                        <th scope="col">Eliminar
                    </thead>
                    <tbody>
                        @if($encuestas->count())
                        @foreach($encuestas as $encuesta)
                        <tr>
                            <td>{{$encuesta->Nombre}}</td>
                            <td>{{$encuesta->Nombre_Proyecto}}</td>
                            <td>{{$encuesta->Estado}}</td>
                            <td>{{$encuesta->formularios_Nombre}}</td>
                            <td>
                                <a href="{{ route('encuestaedit', $encuesta->Id_Encuesta) }}" type="submit"
                                    class="mb-2 mr-2 btn-transition btn btn-outline-info">Editar</a>
                            </td>
                            <td>
                                <form method="POST" action="{{route('encuestadelete',$encuesta->Id_Encuesta)}}">
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
{{ $encuestas->links() }}

</section>
<script>
    $(document).ready(function () {
        $('#tblencuestas').DataTable({
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
 {
      "targets": 3,// your case first column
      "className": "text-center",
      "width": "0%"
 },
 {
      "targets": 4,// your case first column
      "className": "text-center",
      "width": "0%"
 },
 {
      "targets": 5,// your case first column
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
