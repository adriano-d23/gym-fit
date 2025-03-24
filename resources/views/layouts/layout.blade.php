<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Academia Fit</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

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
<body class="bg-light">

    <!-- Menu Superior -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container-fluid">
            <button id="sidebar-toggle" class="btn btn-link text-dark">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand ms-3 text-danger fw-bold" href="#">Academia Fit</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#">Configurações</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>

    <!-- Menu Lateral -->
    <aside id="sidebar" class="sidebar bg-white vh-100 position-fixed shadow-sm">
        <div class="p-4">
            <br><br><br>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark hover-bg-danger">
                        <i class="fas fa-home"></i>
                        <span class="sidebar-text ms-2">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('usuarios.index') }}" class="nav-link text-dark hover-bg-danger">
                        <i class="fas fa-user"></i>
                        <span class="sidebar-text ms-2">Usuários</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('establishment.index') }}" class="nav-link text-dark hover-bg-danger">
                        <i class="fas fa-user"></i>
                        <span class="sidebar-text ms-2">Estabelecimentos</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link text-dark hover-bg-danger">
                        <i class="fas fa-calendar-alt"></i>
                        <span class="sidebar-text ms-2">Agenda</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark hover-bg-danger">
                        <i class="fas fa-chart-line"></i>
                        <span class="sidebar-text ms-2">Relatórios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark hover-bg-danger">
                        <i class="fas fa-cog"></i>
                        <span class="sidebar-text ms-2">Configurações</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Conteúdo Principal -->
    <main id="content" class="content p-4 mt-16">
        @yield('content')
    </main>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- jQuery Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            const toggleButton = document.getElementById('sidebar-toggle');

            toggleButton.addEventListener('click', () => {
                sidebar.classList.toggle('collapsed');
                content.classList.toggle('collapsed');
            });

            // Inicializar Select2
            $('.select2').select2({
                width: '100%',
                placeholder: 'Selecione uma opção',
                allowClear: true
            });

            // Aplicar máscaras
            $('#cpf').mask('000.000.000-00');
            $('#phone').mask('(00) 00000-0000');
        });
    </script>
</body>
</html>