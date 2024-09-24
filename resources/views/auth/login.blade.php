<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IDR-Paraná</title>

    <link rel="shortcut icon" type="imagex/png" href="{{ asset('imagens/logo-idr-digital-aba.ico') }}">

    {{-- Styles --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/dt-1.11.0/r-2.2.9/rr-1.2.8/datatables.min.css" />

    <style>
        .error {
            color: red
        }

        .btn-outline-primary {
            border-color: white !important;
            color: white !important;
        }

        .btn-outline-primary:hover {
            background-color: white !important;
            color: black !important;
        }

        .form-control {
            background-color: #00885434 !important;
        }

        .btn-primary {
            background-color: #008854 !important;
            border-color: #00663f !important;
        }

        .btn-primary:hover {
            background-color: #00663f !important;
        }
    </style>
</head>

<body>
    <div class="main d-flex justify-content-center w-100">
        <nav class="navbar navbar-expand-md shadow-sm" style="background-color: #008854">
            <div class="container">
                <a class="sidebar-brand" href="{{ url('/') }}">
                    <div class="max-width">
                        <div class="imageContainer">
                            <img src="{{ 'data:image/jpg;base64,' . base64_encode(file_get_contents(public_path('imagens/logo.jpg'))) }}" class="img-thumbnail" width="80px" height="60px" alt="">
                            <span class="align-middle mr-3" style="font-size: .999rem;">Instituto de Desenvolvimento Rural - Paraná</span>
                        </div>
                    </div>
                    {{-- <img src="{{ 'data:image/jpg;base64,' . base64_encode(file_get_contents(public_path('imagens/logo.jpg'))) }}"
                    class="align-middle mr-3" alt="" width="80px" height="60px" />
                    <span class="align-middle mr-3" style="font-size: .999rem;">Instituto de Desenvolvimento Rural - Paraná</span> --}}
                </a>
            </div>
            {{-- <div class="container">
                <a class="sidebar-brand" href="{{ url('/') }}">
                    <span class="align-middle mr-3" style="font-size: .999rem;">Instituto de Desenvolvimento Rural -
                        Paraná</span>
                </a>
            </div> --}}

            {{-- <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('pub.acervo.indexpub',$link='acervo')}}">
                    <a class="nav-link" href="{{ route('pub.acervo.index') }}">
                        <button type="button" class="btn btn-outline-primary btn-lg">Biblioteca</button>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pub.evento.index') }}">
                        <button type="button" class="btn btn-outline-primary btn-lg">Eventos</button>
                    </a>
                </li>

            </ul> --}}

        </nav>
        <main class="content d-flex p-0">
            <div class="container d-flex flex-column">
                <div class="row h-100">
                    <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                        <div class="d-table-cell align-middle">
                            <div class="text-center mt-4">
                                <h1 class="h2">
                                    Faça login em sua conta para continuar
                                </h1>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="m-sm-4">
                                        <form action="{{ route('login') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <div class="mb-3">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" id="email"
                                                    class="form-control form-control-lg" placeholder="Digite seu email"
                                                    value="{{ old('email') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="password">Senha</label>
                                                <input type="password" name="password" id="password"
                                                    class="form-control form-control-lg" placeholder="Digite sua senha"
                                                    value="{{ old('password') }}">
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-lg btn-primary"
                                                    style="width: 100%; margin-bottom: 0.7rem">Entrar</button>
                                            </div>
                                            <small>
                                                <a href="">
                                                    <strong>Cadastrar-se</strong>
                                                </a>
                                            </small>
                                            <small>
                                                <a href="" style="float: right">
                                                    <strong>Esqueceu a senha?</strong>
                                                </a>
                                            </small>
                                            <br>
                                            <small>
                                                <a href="" style="float: left">
                                                    <strong>Reenviar link de confirmação de e-mail</strong>
                                                </a>
                                            </small>
                                            <br>

                                            {{-- <small>
                                                <a href="{{route('pub.acervo.indexpub')}}" style="float: left">acessar acervo</a>
                                            </small> --}}

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-12 text-right">
                        <p class="mb-0">
                            © <?php echo date('Y'); ?> - <a href="" target="_blank"
                                class="text-muted">IDR-Digital</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
        integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ url('js/bootstrap.js') }}"></script>
    <script src="{{ asset('jquery-mask/src/jquery.mask.js') }}"></script>
    <script>
        $('#cpf').mask('000.000.000-00');
    </script>

</body>

</html>
