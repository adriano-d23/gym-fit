
@extends('layouts.layout') <!-- Estende o layout -->

@section('title', 'Login - Academia Fit') <!-- Define o título da página -->

@section('content')
<main id="content" class="content p-8 mt-16">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold text-gray-800">Bem-vindo ao Dashboard</h1>
            <p class="mt-2 text-gray-600">Aqui você pode gerenciar suas atividades e acessar informações importantes.</p>

            <!-- Cards de Dados -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold text-red-600">Alunos Ativos</h2>
                    <p class="mt-2 text-gray-700">150</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold text-red-600">Aulas Agendadas</h2>
                    <p class="mt-2 text-gray-700">25</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold text-red-600">Receita Mensal</h2>
                    <p class="mt-2 text-gray-700">R$ 50.000,00</p>
                </div>
            </div>

            <!-- Gráficos (Placeholder) -->
            <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold text-red-600">Desempenho Mensal</h2>
                <div class="mt-4 h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                    <p class="text-gray-600">Gráfico de desempenho</p>
                </div>
            </div>
        </div>
    </main>

@endsection