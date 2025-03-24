@extends('layouts.layout') <!-- Estende o layout -->

@section('title', 'Editar Usuário') <!-- Define o título da página -->

@section('content')
<div class="container mt-3">
    <div class="card shadow p-4">
        <div class="card-body">
            <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Método HTTP para atualização -->

                <!-- Dados do Usuário -->
                <h3 class="h5 mb-4">Dados do Usuário</h3>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required>
                    </div>

                    <!-- CPF -->
                    <div class="col-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" id="cpf" name="cpf" class="form-control" value="{{ $user->cpf }}" required>
                    </div>

                    <div class="col-1">
                        <label for="active" class="form-label">Ativo</label>
                        <select id="active" name="active" class="form-select">
                            <option value="1" {{ $user->active == 1 ? 'selected' : '' }}>Sim</option>
                            <option value="0" {{ $user->active == 0 ? 'selected' : '' }}>Não</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Email -->
                    <div class="col-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
                    </div>

                    <!-- Senha -->
                    <div class="col-6">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" id="password" name="password" class="form-control">
                        <small class="text-muted">Deixe em branco para manter a senha atual.</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Data de Nascimento -->
                    <div class="col-3">
                        <label for="birth_date" class="form-label">Data de Nascimento</label>
                        <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ $user->birth_date }}">
                    </div>

                    <!-- Gênero -->
                    <div class="col-3">
                        <label for="gender" class="form-label">Gênero</label>
                        <select id="gender" name="gender" class="form-select">
                            <option value="masculino" {{ $user->gender == 'masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="feminino" {{ $user->gender == 'feminino' ? 'selected' : '' }}>Feminino</option>
                            <option value="outros" {{ $user->gender == 'outros' ? 'selected' : '' }}>Outros</option>
                        </select>
                    </div>

                    <!-- Telefone -->
                    <div class="col-3">
                        <label for="phone" class="form-label">Telefone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $user->phone }}">
                    </div>

                    <!-- Grupo de Usuário -->
                    <div class="col-3">
                        <label for="user_group_id" class="form-label">Grupo de Usuário</label>
                        <select id="user_group_id" name="user_group_id" class="form-select" required>
                            @foreach ($userGroup as $group)
                            <option value="{{ $group->id }}" {{ $user->user_group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <hr>

                <!-- Endereço -->
                <h3 class="h5 mb-4">Endereço</h3>

                <div class="row mb-3">
                    <div class="col-3">
                        <label for="zip_code" class="form-label">CEP</label>
                        <input type="text" id="zip_code" name="zip_code" class="form-control" value="{{ $user->address->zip_code }}" required>
                    </div>
                    <div class="col-5">
                        <label for="street" class="form-label">Rua</label>
                        <input type="text" id="street" name="street" class="form-control" value="{{ $user->address->street }}" required>
                    </div>

                    <!-- Complemento -->
                    <div class="col-4">
                        <label for="complement" class="form-label">Complemento</label>
                        <input type="text" id="complement" name="complement" class="form-control" value="{{ $user->address->complement }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Bairro -->
                    <div class="col-3">
                        <label for="neighborhood" class="form-label">Bairro</label>
                        <input type="text" id="neighborhood" name="neighborhood" class="form-control" value="{{ $user->address->neighborhood }}" required>
                    </div>

                    <!-- Cidade -->
                    <div class="col-3">
                        <label for="city" class="form-label">Cidade</label>
                        <input type="text" id="city" name="city" class="form-control" value="{{ $user->address->city }}" required>
                    </div>

                    <!-- Estado -->
                    <div class="col-3">
                        <label for="state" class="form-label">Estado</label>
                        <select id="state" name="state" class="form-select select2" required>
                            <option value="">Selecione um estado</option>
                            <option value="AC" {{ $user->address->state == 'AC' ? 'selected' : '' }}>Acre</option>
                            <option value="AL" {{ $user->address->state == 'AL' ? 'selected' : '' }}>Alagoas</option>
                            <option value="AP" {{ $user->address->state == 'AP' ? 'selected' : '' }}>Amapá</option>
                            <option value="AM" {{ $user->address->state == 'AM' ? 'selected' : '' }}>Amazonas</option>
                            <option value="BA" {{ $user->address->state == 'BA' ? 'selected' : '' }}>Bahia</option>
                            <option value="CE" {{ $user->address->state == 'CE' ? 'selected' : '' }}>Ceará</option>
                            <option value="DF" {{ $user->address->state == 'DF' ? 'selected' : '' }}>Distrito Federal</option>
                            <option value="ES" {{ $user->address->state == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
                            <option value="GO" {{ $user->address->state == 'GO' ? 'selected' : '' }}>Goiás</option>
                            <option value="MA" {{ $user->address->state == 'MA' ? 'selected' : '' }}>Maranhão</option>
                            <option value="MT" {{ $user->address->state == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
                            <option value="MS" {{ $user->address->state == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
                            <option value="MG" {{ $user->address->state == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                            <option value="PA" {{ $user->address->state == 'PA' ? 'selected' : '' }}>Pará</option>
                            <option value="PB" {{ $user->address->state == 'PB' ? 'selected' : '' }}>Paraíba</option>
                            <option value="PR" {{ $user->address->state == 'PR' ? 'selected' : '' }}>Paraná</option>
                            <option value="PE" {{ $user->address->state == 'PE' ? 'selected' : '' }}>Pernambuco</option>
                            <option value="PI" {{ $user->address->state == 'PI' ? 'selected' : '' }}>Piauí</option>
                            <option value="RJ" {{ $user->address->state == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                            <option value="RN" {{ $user->address->state == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
                            <option value="RS" {{ $user->address->state == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
                            <option value="RO" {{ $user->address->state == 'RO' ? 'selected' : '' }}>Rondônia</option>
                            <option value="RR" {{ $user->address->state == 'RR' ? 'selected' : '' }}>Roraima</option>
                            <option value="SC" {{ $user->address->state == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
                            <option value="SP" {{ $user->address->state == 'SP' ? 'selected' : '' }}>São Paulo</option>
                            <option value="SE" {{ $user->address->state == 'SE' ? 'selected' : '' }}>Sergipe</option>
                            <option value="TO" {{ $user->address->state == 'TO' ? 'selected' : '' }}>Tocantins</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Longitude -->
                    <div class="col-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" id="longitude" name="longitude" class="form-control" value="{{ $user->address->longitude }}">
                    </div>

                    <!-- Latitude -->
                    <div class="col-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" id="latitude" name="latitude" class="form-control" value="{{ $user->address->latitude }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a class="btn btn-outline-danger" href="{{ route('usuarios.index') }}"> <i class="fas fa-times"></i> Voltar</a>
                        <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Atualizar Usuário
                        </button>
                    </div>
                  
                </div>
            </form>
        </div>
    </div>
</div>

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
        $('#state').select2({
            width: '100%',
            placeholder: 'Selecione um estado',
            allowClear: true,
            dropdownParent: $('#state').parent(),
            theme: 'bootstrap-5'
        });
    });
</script>
@endpush
@endsection