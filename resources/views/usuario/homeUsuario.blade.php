{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuário</h1>
@stop

@section('content')
    <div class="box">
    <div class="box-header">
        <h3 class="box-title">Listagem de usuário</h3>
        <a class="pull-right" href="{{url('funcionario/novo')}}">Novo usuário</a>
    </div>
    <table class="table table-striped"  id="userstable">
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
                <td align="center"><a href="usuario/editar/{{$linhaUsuario -> id}}" class="btn btn-default btn-sm"><i class="fas fa-pencil-alt"></i> Editar</a> <a href="#" style="" class="btn btn-default btn-sm"><i class="fas fa-user-lock"></i> Desativar</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
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
    </script>
@stop
