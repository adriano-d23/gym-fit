@extends('layouts.layout') <!-- Estende o layout -->

@section('title', 'Cadastrar Estabelecimento') <!-- Define o título da página -->

@section('content')
<div class="container mt-3">
    <div class="card shadow p-4">
        <div class="card-body">
            <h3>Cadastrar Estabelecimento</h3>
            <hr>
            <form action="{{ route('establishment.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <!-- Nome do Estabelecimento -->
                    <div class="col-6">
                        <label for="name" class="form-label">Nome do Estabelecimento</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <!-- Responsável (Administrador ou Proprietário) -->
                    <div class="col-4">
                        <label for="user_id" class="form-label">Responsável</label>
                        <select id="user_id" name="user_id" class="form-select" required>
                            <option value="">Selecione um responsável</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="active" class="form-label">Status</label>
                        <select id="active" name="active" class="form-select" required>
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <!-- Endereço -->
                    <div class="col-6">
                        <label for="street" class="form-label">Rua</label>
                        <input type="text" id="street" name="street" class="form-control" required>
                    </div>

                    <!-- Complemento -->
                    <div class="col-6">
                        <label for="complement" class="form-label">Complemento</label>
                        <input type="text" id="complement" name="complement" class="form-control">
                    </div>
                </div>

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
                <!-- Status (Ativo/Inativo) -->


                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('establishment.index') }}" class="btn btn-outline-danger">
                            <i class="fas fa-times"></i> Voltar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Salvar
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

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
@endsection