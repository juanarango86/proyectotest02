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
                    <h3>Lista Usuario</h3>
                </div>


                <a href="{{ route('Usuario.create') }}" class="btn btn-outline-primary btn-block">Añadir Usuario</a>

            </div>
            <br>
            
            <div class="table-responsive">
                <table id="tblusuarios" class="mb-0 table table-bordered table-hover table-sm table-responsive" style="width:100%" cellspacing="0">
                    <thead>
                        <th scope="col">Nombre</th>
                        <th scope="col">Id_Rol</th>
                        <th scope="col">Correo_Electronico</th>
                        <th scope="col">Contrasena</th>
                        <th scope="col">Fecha_Nacimiento</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Editar
                        <th scope="col">Eliminar
                    </thead>
                    <tbody>
                        @if($usuarios->count())
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->Nombre}}</td>
                            <td>{{$usuario->Id_Rol}}</td>
                            <td>{{$usuario->Correo_Electronico}}</td>
                            <td>{{$usuario->Contrasena}}</td>
                            <td>{{$usuario->Fecha_Nacimiento}}</td>
                            <td>{{$usuario->Direccion}}</td>
                            <td>{{$usuario->Telefono}}</td>
                            <td>{{$usuario->Celular}}</td>
                            <td>
                                <a href="{{ route('usuarioedit', $usuario->Id_Usuario) }}" type="submit"
                                    class="mb-2 mr-2 btn-transition-sm btn-sm btn-outline-success">Editar</a>
                            </td>
                            <td>
                                <form method="POST" action="{{route('usuariodelete',$usuario->Id_Usuario)}}">
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
{{ $usuarios->links() }}

</section>
<script>
    $(document).ready(function () {
        $('#tblusuarios').DataTable({
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
 {
      "targets": 6,// your case first column
      "className": "text-center",
      "width": "0%"
 },
 {
      "targets": 7,// your case first column
      "className": "text-center",
      "width": "0%"
 },
 {
      "targets": 8,// your case first column
      "className": "text-center",
      "width": "0%"
 },
 {
      "targets": 9,// your case first column
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
