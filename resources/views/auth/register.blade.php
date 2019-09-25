@extends('layouts.app')
@section('content')
    <script>
        function yesnoCheck(){
            if (document.getElementById('Atendente').checked) {
                document.getElementById('divCampoFormacao').style.display = '';
                document.getElementById('divCampoComprovante').style.display = '';

            }else{
                document.getElementById('divCampoFormacao').style.display = 'none';
                document.getElementById('divCampoComprovante').style.display = 'none';
            }
        }
    </script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastro</div>

                <div class="card-body">
                    <form method="POST" action="/usuario/cadastro">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Nome:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nome" placeholder="Digite seu nome completo" required autocomplete="nome">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Email:</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Digite seu email" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Senha:</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required autocomplete="senha">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Data Nascimento:</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="data" required autocomplete="data">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Endereço:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="R Biriri 789 - Jardim Real" name="endereco" required autocomplete="endereco">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Telefone fixo:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="(18) 0000-1111" name="telFixo" required autocomplete="telFixo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Telefone celular:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="(18) 90000-1111" name="telCelular" required autocomplete="telCelular">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Eu sou:</label>
                            <div class="col-md-6">
                                <input type="radio" onclick="yesnoCheck()" id="Atendente" name="cargo" value="1"> Atendente<br>
                                <input type="radio" onclick="yesnoCheck()" id="Participante" name="cargo" value="2"> Participante
                            </div>
                        </div>

                        <div class="form-group row" id="divCampoFormacao" style="display:none">
                            <label class="col-md-4 col-form-label text-md-right">Formação:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Digite o nome da formação" name="formacao" >
                            </div>
                        </div>

                        <div class="form-group row" id="divCampoComprovante" style="display:none">
                            <label class="col-md-4 col-form-label text-md-right">Certificado/Comprovante:</label>
                            <div class="col-md-6">
                                <input type="file"  placeholder="Digite o nome da formação" name="formacao">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"> Confirmar  </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


