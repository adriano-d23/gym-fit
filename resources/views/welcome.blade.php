<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Fit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Efeito de fade-in ao rolar a tela */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Efeito de hover nos cards */
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(255, 0, 0, 0.2);
        }

        /* Menu responsivo */
        @media (max-width: 768px) {
            .menu-items {
                display: none;
                flex-direction: column;
                width: 100%;
                background-color: black;
                position: absolute;
                top: 100%;
                left: 0;
                padding: 1rem;
            }

            .menu-items.active {
                display: flex;
            }

            .menu-toggle {
                display: block;
            }
        }
    </style>
</head>
<body class="bg-black text-white">

    <!-- Menu Superior -->
    <nav class="bg-black p-4 fixed w-full top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-red-600">Academia Fit</a>
            
            <!-- Botão de toggle para mobile -->
            <button class="menu-toggle text-white md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <!-- Itens do menu -->
            <ul class="menu-items md:flex space-x-6">
                <li><a href="#home" class="hover:text-red-600">Home</a></li>
                <li><a href="#about" class="hover:text-red-600">Sobre</a></li>
                <li><a href="#services" class="hover:text-red-600">Serviços</a></li>
                <li><a href="#contact" class="hover:text-red-600">Contato</a></li>
                <li>
    <a href="{{ route('login') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Login</a>
</li>                <li><a href="#" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Cadastrar</a></li>
            </ul>
        </div>
    </nav>

    <!-- Seção Home -->
    <section id="home" class="h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
        <div class="text-center transform translate-y-[-20%]">
            <h1 class="text-6xl font-bold text-red-600">Bem-vindo à Academia Fit</h1>
            <p class="mt-4 text-xl text-gray-300">Transforme seu corpo, transforme sua vida.</p>
            <a href="#about" class="mt-8 inline-block bg-red-600 text-white px-8 py-3 rounded-lg hover:bg-red-700 transition-transform transform hover:scale-105">Saiba Mais</a>
        </div>
    </section>

    <!-- Seção Sobre -->
    <section id="about" class="py-20 bg-black fade-in">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold text-red-600">Sobre Nós</h2>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="p-4">
                    <img src="https://images.unsplash.com/photo-1599058917212-d750089bc07e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Academia Fit" class="rounded-lg shadow-lg">
                </div>
                <div class="p-4 flex items-center justify-center text-left">
                    <div>
                        <p class="text-gray-300">
                            A <strong class="text-red-600">Academia Fit</strong> é mais do que um lugar para malhar. Somos uma comunidade dedicada a ajudar você a alcançar seus objetivos de saúde e fitness. Com equipamentos de última geração, instrutores certificados e um ambiente acolhedor, estamos aqui para apoiar sua jornada.
                        </p>
                        <p class="mt-4 text-gray-300">
                            Oferecemos aulas em grupo, treinamento personalizado e programas específicos para todas as idades e níveis de condicionamento físico.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Serviços -->
    <section id="services" class="py-20 bg-gray-900 fade-in">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold text-red-600">Nossos Serviços</h2>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-4 bg-black rounded-lg shadow-lg card-hover">
                    <img src="https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Musculação" class="w-full h-48 object-cover rounded-lg">
                    <h3 class="mt-4 text-2xl font-bold text-red-600">Musculação</h3>
                    <p class="mt-2 text-gray-300">Equipamentos modernos e instrutores especializados para você evoluir no seu treino.</p>
                </div>
                <div class="p-4 bg-black rounded-lg shadow-lg card-hover">
                    <img src="https://images.unsplash.com/photo-1594737625785-a6cbdabd333c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Aulas em Grupo" class="w-full h-48 object-cover rounded-lg">
                    <h3 class="mt-4 text-2xl font-bold text-red-600">Aulas em Grupo</h3>
                    <p class="mt-2 text-gray-300">Zumba, Yoga, Pilates e muito mais para você se divertir enquanto se exercita.</p>
                </div>
                <div class="p-4 bg-black rounded-lg shadow-lg card-hover">
                    <img src="https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Personal Trainer" class="w-full h-48 object-cover rounded-lg">
                    <h3 class="mt-4 text-2xl font-bold text-red-600">Personal Trainer</h3>
                    <p class="mt-2 text-gray-300">Treinamento personalizado para atingir seus objetivos de forma eficiente.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Contato -->
    <section id="contact" class="py-20 bg-black fade-in">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold text-red-600">Contato</h2>
            <div class="mt-8">
                <p class="text-gray-300">Estamos sempre prontos para ajudar. Entre em contato conosco para mais informações ou agende uma visita.</p>
                <ul class="mt-4 text-left text-gray-300">
                    <li><strong class="text-red-600">Endereço:</strong> Rua da Academia, 123 - Centro</li>
                    <li><strong class="text-red-600">Telefone:</strong> (11) 1234-5678</li>
                    <li><strong class="text-red-600">Email:</strong> contato@academiafit.com</li>
                </ul>
                <div class="mt-8 flex justify-center space-x-4">
                    <a href="#" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition-transform transform hover:scale-105">Instagram</a>
                    <a href="#" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition-transform transform hover:scale-105">Facebook</a>
                    <a href="#" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition-transform transform hover:scale-105">Cadastre-se</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Rodapé -->
    <footer class="bg-black p-4 text-center">
        <p class="text-gray-300">&copy; 2023 Academia Fit. Todos os direitos reservados.</p>
    </footer>

    <!-- Script para animações de scroll e menu mobile -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sections = document.querySelectorAll('.fade-in');
            const menuToggle = document.querySelector('.menu-toggle');
            const menuItems = document.querySelector('.menu-items');

            // Animação de scroll
            const checkVisibility = () => {
                sections.forEach(section => {
                    const sectionTop = section.getBoundingClientRect().top;
                    const sectionBottom = section.getBoundingClientRect().bottom;

                    if (sectionTop < window.innerHeight && sectionBottom > 0) {
                        section.classList.add('visible');
                    }
                });
            };

            // Menu mobile
            menuToggle.addEventListener('click', () => {
                menuItems.classList.toggle('active');
            });

            window.addEventListener('scroll', checkVisibility);
            checkVisibility(); // Verifica a visibilidade ao carregar a página
        });
    </script>

</body>
</html>