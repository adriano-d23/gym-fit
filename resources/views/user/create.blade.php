@extends('layouts.layout') <!-- Estende o layout -->

@section('title', 'Cadastrar Usuário') <!-- Define o título da página -->

@section('content')
<div class="container mt-2">
    <div class="card shadow p-4">
        <div class="card-body">
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <!-- Dados do Usuário -->
                <h3 class="h5 mb-4">Dados do Usuário</h3>
                <div class="row mb-3"> <!-- Adicionado mb-3 para espaçamento -->
                    <div class="col-6">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <!-- CPF -->
                    <div class="col-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" id="cpf" name="cpf" class="form-control" required>
                    </div>

                    <div class="col-1">
                        <label for="active" class="form-label">Ativo</label>
                        <select id="active" name="active" class="form-select">
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3"> <!-- Adicionado mb-3 para espaçamento -->
                    <!-- Email -->
                    <div class="col-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <!-- Senha -->
                    <div class="col-6">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3"> <!-- Adicionado mb-3 para espaçamento -->
                    <!-- Data de Nascimento -->
                    <div class="col-3">
                        <label for="birth_date" class="form-label">Data de Nascimento</label>
                        <input type="date" id="birth_date" name="birth_date" class="form-control" required>
                    </div>

                    <!-- Gênero -->
                    <div class="col-3">
                        <label for="gender" class="form-label">Gênero</label>
                        <select id="gender" name="gender" class="form-select">
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                            <option value="outros">Outros</option>
                        </select>
                    </div>

                    <!-- Telefone -->
                    <div class="col-3">
                        <label for="phone" class="form-label">Telefone</label>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                    </div>

                    <!-- Grupo de Usuário -->
                    <div class="col-3">
                        <label for="user_group_id" class="form-label">Grupo de Usuário</label>
                        <select id="user_group_id" name="user_group_id" class="form-select" required>
                            @foreach ($userGroup as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <hr>

                <!-- Endereço -->
                <h3 class="h5 mb-4">Endereço</h3>

                <div class="row mb-3"> <!-- Adicionado mb-3 para espaçamento -->
                    <div class="col-3">
                        <label for="zip_code" class="form-label">CEP</label>
                        <input type="text" id="zip_code" name="zip_code" class="form-control" required>
                    </div>
                    <div class="col-5">
                        <label for="street" class="form-label">Rua</label>
                        <input type="text" id="street" name="street" class="form-control" required>
                    </div>

                    <!-- Complemento -->
                    <div class="col-4">
                        <label for="complement" class="form-label">Complemento</label>
                        <input type="text" id="complement" name="complement" class="form-control">
                    </div>
                </div>

                <div class="row mb-3"> <!-- Adicionado mb-3 para espaçamento -->
                    <!-- Bairro -->
                    <div class="col-3">
                        <label for="neighborhood" class="form-label">Bairro</label>
                        <input type="text" id="neighborhood" name="neighborhood" class="form-control" required>
                    </div>

                    <!-- Cidade -->
                    <div class="col-3">
                        <label for="city" class="form-label">Cidade</label>
                        <input type="text" id="city" name="city" class="form-control" required>
                    </div>

                    <!-- Estado -->
                    <div class="col-3">
                        <label for="state" class="form-label">Estado</label>
                        <select id="state" name="state" class="form-select select2" required>
                            <option value="">Selecione um estado</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3"> <!-- Adicionado mb-3 para espaçamento -->
                    <!-- Longitude -->
                    <div class="col-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" id="longitude" name="longitude" class="form-control">
                    </div>

                    <!-- Latitude -->
                    <div class="col-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" id="latitude" name="latitude" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a class="btn btn-outline-danger" href="#"> <i class="fas fa-times"></i> Voltar</a>
                        <button type="submit" class="btn btn-primary ">
                        <i class="fas fa-save"></i>  Cadastrar Usuário
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<style>

</style>
@push('scripts')
<script>
    $(document).ready(function() {
        // Máscaras de CPF e Telefone
        $('#cpf').mask('000.000.000-00');
        $('#phone').mask('(00) 00000-0000');

        // Auto preenchimento de endereço via CEP
        $('#zip_code').blur(function() {
            let cep = $(this).val().replace(/\D/g, '');
            if (cep !== '') {
                $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function(data) {
                    if (!data.erro) {
                        $('#street').val(data.logradouro);
                        $('#neighborhood').val(data.bairro);
                        $('#city').val(data.localidade);
                        $('#state').val(data.uf).trigger('change');
                    }
                });
            }
        });

        // Inicializar o Select2 para o campo estado
        $(document).ready(function() {
            $('#state').select2({
                width: '100%',
                placeholder: 'Selecione um estado',
                allowClear: true,
                dropdownParent: $('#state').parent(),
                theme: 'bootstrap-5'
            });
        });
    });
</script>
@endpush
@endsection