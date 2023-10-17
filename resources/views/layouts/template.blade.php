<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/7a775d7d8d.js" crossorigin="anonymous"></script>
</head>

<body>

    <style>
        hr.solid {
            border-top: 1px solid #bbb;
        }
    </style>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/Logo-TCC.png')}}" alt="Logo" width="30" height="24"
                        class="d-inline-block align-text-top me-2">
                    CritiqueCentral
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sobre') }}">Sobre</a>
                        </li>

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-warning alert-dismissible show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @yield('content')

        <footer class="bg-dark text-white py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="mb-4">Pré-Cadastro de Restaurantes</h3>
                        <p class="mb-2">Peça para incluir o seu Restaurante ao nosso catálogo de avaliações</p>
                        <hr>
                        <form action="{{route('salvar_pre_cadastro')}}" method="POST" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <label>Seu Nome:</label>
                                <input type="text" class="form-control mb-2" name="nome_usuario" required>
                            </div>
                            <div class="form-group">
                                <label>Nome do Restaurante:</label>
                                <input type="text" class="form-control mb-2" name="nome_restaurante" required>
                            </div>
                            <div class="form-group">
                                <label>Telefone:</label>
                                <input type="text" class="form-control mb-2" id="telefone" name="telefone" required>
                            </div>
                            <div class="form-group">
                                <label>E-mail:</label>
                                <input type="email" class="form-control mb-2" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Mensagem:</label>
                                <textarea class="form-control" id="message" name="mensagem" rows="4"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-custom-2 btn-block mt-3"> <i
                                    class="fas fa-check-circle me-1"></i> Enviar Pré-Cadastro</button>
                        </form>
                    </div>
                    <div class="col-md-6 text-center">
                        <p class="mb-0">&copy; @php echo date('Y'); @endphp CritiqueCentral. Todos os direitos
                            reservados.</p>
                        <p class="mb-0">Desenvolvido por Matheus Kilian</p>
                        <div class="social-icons mt-3">
                            <a href="#" class="social-icon"><i class="fab fa-github"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ Route('dynamicjs.base.js') }}"></script>
    @yield('pageScripts')


</body>

</html>
