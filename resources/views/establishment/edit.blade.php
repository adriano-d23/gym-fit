@extends('layouts.layout') <!-- Estende o layout -->

@section('title', 'Editar Estabelecimento') <!-- Define o título da página -->

@section('content')
<div class="container mt-3">
    <div class="card shadow p-4">
        <div class="card-body">
            <h3>Editar Estabelecimento</h3>
            <hr>
            <form action="{{ route('establishment.update', $establishment->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Método HTTP para atualização -->

                <div class="row mb-3">
                    <!-- Nome do Estabelecimento -->
                    <div class="col-6">
                        <label for="name" class="form-label">Nome do Estabelecimento</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $establishment->name }}" required>
                    </div>

                    <!-- Responsável (Administrador ou Proprietário) -->
                    <div class="col-4">
                        <label for="user_id" class="form-label">Responsável</label>
                        <select id="user_id" name="user_id" class="form-select" required>
                            <option value="">Selecione um responsável</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $establishment->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="col-2">
                        <label for="active" class="form-label">Status</label>
                        <select id="active" name="active" class="form-select" required>
                            <option value="1" {{ $establishment->active == 1 ? 'selected' : '' }}>Ativo</option>
                            <option value="0" {{ $establishment->active == 0 ? 'selected' : '' }}>Inativo</option>
                        </select>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <!-- Endereço -->
                    <div class="col-6">
                        <label for="street" class="form-label">Rua</label>
                        <input type="text" id="street" name="street" class="form-control" value="{{ $establishment->address->street }}" required>
                    </div>

                    <!-- Complemento -->
                    <div class="col-6">
                        <label for="complement" class="form-label">Complemento</label>
                        <input type="text" id="complement" name="complement" class="form-control" value="{{ $establishment->address->complement }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- CEP -->
                    <div class="col-3">
                        <label for="zip_code" class="form-label">CEP</label>
                        <input type="text" id="zip_code" name="zip_code" class="form-control" value="{{ $establishment->address->zip_code }}" required>
                    </div>

                    <!-- Bairro -->
                    <div class="col-3">
                        <label for="neighborhood" class="form-label">Bairro</label>
                        <input type="text" id="neighborhood" name="neighborhood" class="form-control" value="{{ $establishment->address->neighborhood }}" required>
                    </div>

                    <!-- Cidade -->
                    <div class="col-3">
                        <label for="city" class="form-label">Cidade</label>
                        <input type="text" id="city" name="city" class="form-control" value="{{ $establishment->address->city }}" required>
                    </div>

                    <!-- Estado -->
                    <div class="col-3">
                        <label for="state" class="form-label">Estado</label>
                        <select id="state" name="state" class="form-select select2" required>
                            <option value="">Selecione um estado</option>
                            <option value="AC" {{ $establishment->address->state == 'AC' ? 'selected' : '' }}>Acre</option>
                            <option value="AL" {{ $establishment->address->state == 'AL' ? 'selected' : '' }}>Alagoas</option>
                            <option value="AP" {{ $establishment->address->state == 'AP' ? 'selected' : '' }}>Amapá</option>
                            <option value="AM" {{ $establishment->address->state == 'AM' ? 'selected' : '' }}>Amazonas</option>
                            <option value="BA" {{ $establishment->address->state == 'BA' ? 'selected' : '' }}>Bahia</option>
                            <option value="CE" {{ $establishment->address->state == 'CE' ? 'selected' : '' }}>Ceará</option>
                            <option value="DF" {{ $establishment->address->state == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
                            <option value="ES" {{ $establishment->address->state == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
                            <option value="GO" {{ $establishment->address->state == 'GO' ? 'selected' : '' }}>Goiás</option>
                            <option value="MA" {{ $establishment->address->state == 'MA' ? 'selected' : '' }}>Maranhão</option>
                            <option value="MT" {{ $establishment->address->state == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
                            <option value="MS" {{ $establishment->address->state == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
                            <option value="MG" {{ $establishment->address->state == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                            <option value="PA" {{ $establishment->address->state == 'PA' ? 'selected' : '' }}>Pará</option>
                            <option value="PB" {{ $establishment->address->state == 'PB' ? 'selected' : '' }}>Paraíba</option>
                            <option value="PR" {{ $establishment->address->state == 'PR' ? 'selected' : '' }}>Paraná</option>
                            <option value="PE" {{ $establishment->address->state == 'PE' ? 'selected' : '' }}>Pernambuco</option>
                            <option value="PI" {{ $establishment->address->state == 'PI' ? 'selected' : '' }}>Piauí</option>
                            <option value="RJ" {{ $establishment->address->state == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                            <option value="RN" {{ $establishment->address->state == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
                            <option value="RS" {{ $establishment->address->state == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
                            <option value="RO" {{ $establishment->address->state == 'RO' ? 'selected' : '' }}>Rondônia</option>
                            <option value="RR" {{ $establishment->address->state == 'RR' ? 'selected' : '' }}>Roraima</option>
                            <option value="SC" {{ $establishment->address->state == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
                            <option value="SP" {{ $establishment->address->state == 'SP' ? 'selected' : '' }}>São Paulo</option>
                            <option value="SE" {{ $establishment->address->state == 'SE' ? 'selected' : '' }}>Sergipe</option>
                            <option value="TO" {{ $establishment->address->state == 'TO' ? 'selected' : '' }}>Tocantins</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Longitude -->
                    <div class="col-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" id="longitude" name="longitude" class="form-control" value="{{ $establishment->address->longitude }}">
                    </div>

                    <!-- Latitude -->
                    <div class="col-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" id="latitude" name="latitude" class="form-control" value="{{ $establishment->address->latitude }}">
                    </div>
                </div>

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

        $('#state').select2({
            width: '100%',
            placeholder: 'Selecione um estado',
            allowClear: true,
            dropdownParent: $('#state').parent(),
            theme: 'bootstrap-5'
        });
    });
</script>
@endsection