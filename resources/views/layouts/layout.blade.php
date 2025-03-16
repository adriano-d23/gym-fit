<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Academia Fit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Estilo personalizado para o menu lateral */
        .sidebar {
            width: 250px;
            transition: width 0.3s;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed .sidebar-text {
            display: none;
        }

        .content {
            margin-left: 250px;
            transition: margin-left 0.3s;
        }

        .content.collapsed {
            margin-left: 80px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }

            .sidebar .sidebar-text {
                display: none;
            }

            .content {
                margin-left: 80px;
            }
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Menu Superior -->
    <nav class="bg-white shadow-md fixed w-full top-0 z-50">
        <div class="container mx-auto flex justify-between items-center p-4">
            <div class="flex items-center">
                <button id="sidebar-toggle" class="text-gray-700 focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="#" class="text-2xl font-bold text-red-600 ml-4">Academia Fit</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="text-gray-700 hover:text-red-600">Perfil</a>
                <a href="#" class="text-gray-700 hover:text-red-600">Configurações</a>
                <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Logout</button>
</form>            </div>
        </div>
    </nav>

    <!-- Menu Lateral -->
    <aside id="sidebar" class="sidebar bg-white h-screen fixed top-0 left-0 shadow-md">
        <div class="p-4">
            <ul class="space-y-2">
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-red-50 rounded-lg">
                        <i class="fas fa-home"></i>
                        <span class="sidebar-text ml-2">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-red-50 rounded-lg">
                        <i class="fas fa-user"></i>
                        <span class="sidebar-text ml-2">Perfil</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-red-50 rounded-lg">
                        <i class="fas fa-calendar-alt"></i>
                        <span class="sidebar-text ml-2">Agenda</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-red-50 rounded-lg">
                        <i class="fas fa-chart-line"></i>
                        <span class="sidebar-text ml-2">Relatórios</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-red-50 rounded-lg">
                        <i class="fas fa-cog"></i>
                        <span class="sidebar-text ml-2">Configurações</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <main id="content" class="content p-4 mt-16">
        @yield('content')
    </main>  
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            const toggleButton = document.getElementById('sidebar-toggle');

            toggleButton.addEventListener('click', () => {
                sidebar.classList.toggle('collapsed');
                content.classList.toggle('collapsed');
            });
        });
    </script>

</body>
</html>