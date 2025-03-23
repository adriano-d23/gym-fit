@extends('layouts.layout') <!-- Estende o layout -->

@section('title', 'Usuários') <!-- Define o título da página -->

@section('content')
    <div class="container mx-auto px-4 mt-6">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">Lista de Usuários</h2>
                <a href="{{ route('usuarios.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md transition">
                    + Cadastrar
                </a>
            </div>
            <div class="p-6">
                @if($users->isEmpty())
                    <p class="text-center text-gray-600">Nenhum usuário encontrado.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 border border-gray-300 text-left">ID</th>
                                    <th class="px-4 py-2 border border-gray-300 text-left">Nome</th>
                                    <th class="px-4 py-2 border border-gray-300 text-left">Email</th>
                                    <th class="px-4 py-2 border border-gray-300 text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border border-gray-300">{{ $user->id }}</td>
                                        <td class="px-4 py-2 border border-gray-300">{{ $user->name }}</td>
                                        <td class="px-4 py-2 border border-gray-300">{{ $user->email }}</td>
                                        <td class="px-4 py-2 border border-gray-300 text-center space-x-2">
                                            <!-- Botão Editar -->
                                            <a href="{{ route('usuarios.edit', $user->id) }}"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md shadow-md transition inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M12 20h9"></path>
                                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"></path>
                                                </svg>
                                                Editar
                                            </a>

                                            <!-- Botão Excluir -->
                                            <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md shadow-md transition inline-flex items-center"
                                                    onclick="return confirm('Tem certeza que deseja excluir?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6l-2 14H7L5 6"></path>
                                                        <path d="M10 11v6"></path>
                                                        <path d="M14 11v6"></path>
                                                        <path d="M4 6h16"></path>
                                                    </svg>
                                                    Excluir
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection