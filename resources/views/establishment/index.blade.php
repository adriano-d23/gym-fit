@extends('layouts.layout') <!-- Estende o layout -->

@section('title', 'Listagem Estabelecimentos') <!-- Define o título da página -->

@section('content')
    <div class="container mt-3">
        <div class="card shadow p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="h4">Lista de Estabelecimentos</h3>
                <a href="{{ route('establishment.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Cadastrar
                </a>
            </div>
            <div class="card-body">
                @if($establishments->isEmpty())
                    <p class="text-center text-muted">Nenhum estabelecimento encontrado.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">Responsável</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($establishments as $establishment)
                                    <tr>
                                        <td>{{ $establishment->id }}</td>
                                        <td>{{ $establishment->name }}</td>
                                        <td>
                                            {{ $establishment->address->street }}, {{ $establishment->address->neighborhood }}, {{ $establishment->address->city }}/{{ $establishment->address->state }}
                                        </td>
                                        <td>{{ $establishment->user->name }}</td>
                                        <td>
                                            @if($establishment->active)
                                                <span class="badge bg-success">Ativo</span>
                                            @else
                                                <span class="badge bg-danger">Inativo</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('establishment.edit', $establishment->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>

                                        
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