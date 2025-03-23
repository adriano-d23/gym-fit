@extends('layouts.layout') <!-- Estende o layout -->

@section('title', 'Cadastrar Usuário') <!-- Define o título da página -->

@section('content')
<div class="container mx-auto px-4 mt-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Cadastrar Novo Usuário</h2>
        </div>
        <div class="p-6">
            <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Dados do Usuário -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Dados do Usuário</h3>

                        <!-- Nome -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- CPF -->
                        <div>
                            <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                            <input type="text" id="cpf" name="cpf" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Senha -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                            <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Data de Nascimento -->
                        <div>
                            <label for="birth_date" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                            <input type="date" id="birth_date" name="birth_date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Gênero -->
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700">Gênero</label>
                            <select id="gender" name="gender" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                                <option value="outros">Outros</option>
                            </select>
                        </div>

                        <!-- Telefone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Telefone</label>
                            <input type="text" id="phone" name="phone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Grupo de Usuário -->
                        <div>
                            <label for="user_group_id" class="block text-sm font-medium text-gray-700">Grupo de Usuário</label>
                            <select id="user_group_id" name="user_group_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @foreach ($userGroup as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Ativo -->
                        <div>
                            <label for="active" class="block text-sm font-medium text-gray-700">Ativo</label>
                            <select id="active" name="active" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                    </div>

                    <!-- Endereço -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Endereço</h3>

                        <!-- Rua -->
                        <div>
                            <label for="street" class="block text-sm font-medium text-gray-700">Rua</label>
                            <input type="text" id="street" name="street" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Complemento -->
                        <div>
                            <label for="complement" class="block text-sm font-medium text-gray-700">Complemento</label>
                            <input type="text" id="complement" name="complement" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Bairro -->
                        <div>
                            <label for="neighborhood" class="block text-sm font-medium text-gray-700">Bairro</label>
                            <input type="text" id="neighborhood" name="neighborhood" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Cidade -->
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">Cidade</label>
                            <input type="text" id="city" name="city" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Estado -->
                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700">Estado</label>
                            <select id="state" name="state" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 select2">
                                <!-- Estados serão carregados dinamicamente via Select2 -->
                            </select>
                        </div>

                        <!-- CEP -->
                        <div>
                            <label for="zip_code" class="block text-sm font-medium text-gray-700">CEP</label>
                            <input type="text" id="zip_code" name="zip_code" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <!-- Longitude -->
                        <div>
                            <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                            <input type="text" id="longitude" name="longitude" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Latitude -->
                        <div>
                            <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                            <input type="text" id="latitude" name="latitude" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow-md transition">
                        Cadastrar Usuário
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Máscaras de CPF e Telefone
    $(document).ready(function () {
        $('#cpf').mask('000.000.000-00');
        $('#phone').mask('(00) 00000-0000');

        // Auto preenchimento de endereço via CEP
        $('#zip_code').blur(function () {
            let cep = $(this).val().replace(/\D/g, '');
            if (cep !== '') {
                $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function (data) {
                    if (!data.erro) {
                        $('#street').val(data.logradouro);
                        $('#neighborhood').val(data.bairro);
                        $('#city').val(data.localidade);
                        $('#state').val(data.uf).trigger('change'); // Atualiza o select2 com o estado
                    }
                });
            }
        });

        // Inicializar o Select2 para o campo estado
        $('#state').select2({
            width: '100%',
            placeholder: 'Selecione o estado',
            allowClear: true
        });
    });
</script>
@endpush
@endsection
