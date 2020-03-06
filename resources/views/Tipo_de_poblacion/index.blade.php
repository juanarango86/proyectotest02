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
                    <h3>Lista Tipo_de_poblacion</h3>
                </div>


                <a href="{{ route('Tipo_de_poblacion.create') }}" class="btn btn-outline-primary btn-block">Añadir Tipo_de_poblacion</a>

            </div>
            <br>
            
            <div class="table-responsive">
                <table id="tbltipo_de_poblacions" class="mb-0 table table-bordered table-hover table-sm table-responsive" style="width:100%" cellspacing="0">
                    <thead>
                        <!--  <th scope="col">Id</th> -->
                        <th scope="col">Nombre_De_Poblacion</th>
                        <th scope="col">Edad_Minima</th>
                        <th scope="col">Edad_Maxima</th>
                        <th scope="col">Estrato_Social</th>
                        <th scope="col">Editar
                        <th scope="col">Eliminar
                    </thead>
                    <tbody>
                        @if($tipo_de_poblacions->count())
                        @foreach($tipo_de_poblacions as $tipo_de_poblacion)
                        <tr>
                            
                            <td>{{$tipo_de_poblacion->Nombre_De_Poblacion}}</td>
                            <td>{{$tipo_de_poblacion->Edad_Minima}}</td>
                            <td>{{$tipo_de_poblacion->Edad_Maxima}}</td>
                            <td>{{$tipo_de_poblacion->Estrato_Social}}</td>
                            <td>
                                <a href="{{ route('tipo_de_poblacionedit', $tipo_de_poblacion->Id_Tipo_De_Poblacion) }}" type="submit"
                                    class="mb-2 mr-2 btn-transition-sm btn-sm btn-outline-success">Editar</a>
                            </td>
                            <td>
                                <form method="POST" action="{{route('tipo_de_poblaciondelete',$tipo_de_poblacion->Id_Tipo_De_Poblacion)}}">
                                    {!!method_field('DELETE')!!}
                                    @csrf
                                    <button type="submit" class="mb-2 mr-2 btn-transition-sm btn-sm btn-outline-danger">Eliminar</button>
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
{{ $tipo_de_poblacions->links() }}

</section>
<script>
    $(document).ready(function () {
        $('#tbltipo_de_poblacions').DataTable({
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
