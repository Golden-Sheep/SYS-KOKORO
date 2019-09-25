{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuário Pendente</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listagem de usuários pedentes</h3>

        </div>
        <table class="table table-striped" id="userstable">
            <thead>
            <tr>
                <th class="text-center">Nome</th>
                <th class="text-center">Email</th>
                <th class="text-center">Cargo</th>
                <th class="text-center">Ações</th>
            </tr>
            </thead>
            <tbody>

            @foreach($usuario as $linhaUsuario)

                <tr>
                    <td>{{$linhaUsuario -> nome}}</td>
                    <td>{{$linhaUsuario -> email}}</td>
                    <td>
                        @if($linhaUsuario -> cargo == 1)
                            Gerente
                        @endif
                        @if($linhaUsuario -> cargo == 2)
                            Admin
                        @endif
                    </td>
                    <td>
                        <a onclick="buscarDadosUsuário({{$linhaUsuario -> id}})" class="btn btn-default"><i class="fas fa-eye"></i> visualizar</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>



    <div class="modal fade" id="usuario_dados" style="display: none;">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Informação do usuário</h4>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" disabled="true" placeholder="Enter ...">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" disabled="true" placeholder="Enter ...">
                    </div>

                    <div class="form-group">
                        <label>Data de nascimento</label>
                        <input type="date" class="form-control" disabled="true" placeholder="Enter ...">
                    </div>

                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" class="form-control" disabled="true" placeholder="Enter ...">
                    </div>

                    <div class="form-group">
                        <label>Celular</label>
                        <input type="text" class="form-control" disabled="true" placeholder="Enter ...">
                    </div>

                    <div class="form-group">
                        <label>Endereço</label>
                        <input type="text" class="form-control" disabled="true" placeholder="Enter ...">
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <a href="#" onClick="verificarCheckBox()" class="btn btn-danger"> Recusar</a>
                    <a href="#" onClick="verificarCheckBox()" class="btn btn-primary"> Aprovar</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
        $(document).ready(function(){
            //     $('.datainput').mask('99/99/9999');
            //          $('.valortable').mask("#.##0,00", {reverse: true});
            $('#userstable').DataTable(
                {
                    "language": {
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "_MENU_ resultados por página",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Pesquisar",
                        "oPaginate": {
                            "sNext": "Próximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Último"
                        },
                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        }
                    }
                }
            );

        });

        function buscarDadosUsuário(id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $.ajax({
                data: id,
                url: "{{route('buscarDadosUsuario')}}",
                type: "GET",
                success: function (data) {
                    console.log("success"+data);
                    $("#usuario_dados").modal('show');

                },
                error: function (data) {
                    console.log('Error:', data);

                }
            });

        }

    </script>
@stop
