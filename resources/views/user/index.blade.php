@extends('layouts.layout') <!-- Estende o layout -->

@section('title', 'Usuários') <!-- Define o título da página -->

@section('content')
    <div class="container mt-3">
    <div class="card shadow p-4">
            <div class="div d-flex justify-content-between align-items-center">
                <h3 class="h4 ">Lista de Usuários</h3>
                <a href="{{ route('usuarios.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Cadastrar
                </a>
            </div>
            <div class="card-body">
                @if($users->isEmpty())
                    <p class="text-center text-muted">Nenhum usuário encontrado.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>

                                        <td>{{ $user->email }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>

                                            <!-- <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">
                                                    <i class="fas fa-trash"></i> Excluir
                                                </button>
                                            </form> -->
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