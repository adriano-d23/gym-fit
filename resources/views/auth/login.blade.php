<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Academia Fit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-black text-white">

    <!-- Menu Superior -->
    <nav class="bg-black p-4 fixed w-full top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-red-600">Academia Fit</a>
            <ul class="flex space-x-6">
                <li><a href="{{ route('register') }}" class="hover:text-red-600">Cadastrar</a></li>
            </ul>
        </div>
    </nav>

    <!-- Seção de Login -->
    <section class="min-h-screen flex items-center justify-center bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
        <div class="bg-black bg-opacity-75 p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-3xl font-bold text-red-600 text-center">Login</h2>
            <p class="mt-2 text-gray-300 text-center">Faça login para acessar sua conta.</p>

            <!-- Formulário de Login -->
            <form action="{{ route('login') }}" method="POST" class="mt-6">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-300">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 mt-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600"
                        value="{{ old('email') }}" required autofocus autocomplete="username">
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-300">Senha</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-2 mt-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-red-600"
                        required autocomplete="current-password">
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember"
                            class="h-4 w-4 text-red-600 focus:ring-red-600 border-gray-300 rounded">
                        <label for="remember" class="ml-2 text-gray-300">Lembrar-me</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-red-600 hover:text-red-500">Esqueceu a
                        senha?</a>
                </div>
                <button type="submit"
                    class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">Entrar</button>
            </form>
            <!-- Link para Cadastro -->
            <p class="mt-6 text-gray-300 text-center">
                Não tem uma conta? <a href="{{ route('register') }}"
                    class="text-red-600 hover:text-red-500">Cadastre-se</a>
            </p>
        </div>
    </section>

</body>

</html>