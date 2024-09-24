<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>Listas de Compras</title>

    <link rel="shortcut icon" type="imagex/png" href="{{ asset('imagens/logo-listas-de-compras-aba.ico') }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/dt-1.11.0/r-2.2.9/rr-1.2.8/datatables.min.css" />
    <link href="{{ asset('select2-4.1.0/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('select2-bootstrap/dist/select2-bootstrap.css') }}" />
    <script src="{{ asset('js/jquery.js') }}"></script>
</head>



<style>
    .sidebar {
        background-color: #008854 !important;
    }

    .sidebar-content {
        background-color: rgba(0, 0, 0, 0) !important;
    }

    .sidebar-link {
        color: white !important;
    }

    .sidebar-item.active>a {
        background-color: #005c39 !important;
    }

    footer {
        /* height: 26px !important; */
        padding: 5px !important;
    }
</style>

<div class="wrapper">
    <nav id="sidebar" class="sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="{{ route('home') }}">
                <div class="max-width">
                    <div class="imageContainer">
                        <img src="{{ 'data:image/jpg;base64,' . base64_encode(file_get_contents(public_path('imagens/logo.jpg'))) }}"
                            class="img-thumbnail" width="30%" height="30%" alt="">
                        <span class="align-middle mr-3" style="font-size: .999rem;">IDR-Paraná</span>
                    </div>
                </div>
            </a>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Páginas
                </li>
                <li class="sidebar-item {{ Route::current()->getPrefix() == '/listas' ? 'active' : null }}">
                    <a href="{{ route('listas.index') }}" class="sidebar-link">
                        <i class="fas fa-user-circle"></i>
                        Listas
                    </a>
                </li>
                <li class="sidebar-item {{ Route::current()->getPrefix() == '/produtos' ? 'active' : null }}">
                    <a href="{{ route('produtos.index') }}" class="sidebar-link">
                        <i class="fas fa-address-book"></i>
                        Produtos
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">


            @if (Auth::guest())
                <a class="sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
            @endif
            @if (Auth::check())
                <a class="sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
            @endif

            <div class="navbar-collapse collapse">

                <ul class="navbar-nav navbar-align">

                    <a href="#">
                        <span class="glyphicon glyphicon-log-out"></span>
                    </a>
                    @if (Auth::guest())
                        {{-- <li>
                            <a class="btn btn-primary" style="color: white" href="{{ route('login') }}"
                                id="messagesDropdown" data-bs-toggle="dropdown">
                                <span>Login</span>
                            </a>
                        </li> --}}
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-toggle="dropdown">
                                <i class="fas fa-cog"></i>
                                <span class="text-dark"></span>
                            </a>
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-toggle="dropdown">
                                <span class="avatar"> {{ auth()->user()->name }}</span>
                                <span class="text-dark"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sair
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>

        <main class="content">
            @yield('content')
        </main>

        {{-- <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-left">
                    </div>
                    <div class="col-6 text-right">
                        <p class="mb-0">
                            © <?php echo date('Y'); ?> - <a href="" class="text-muted">IDR - Paraná</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer> --}}

        <footer class="footer">
            <img src="{{ asset('imagens/footer-idr.png') }}" alt="rodapé" width="100%" height="35px">
        </footer>

    </div>
</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
    integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('jquery-mask/dist/jquery.mask.min.js') }}"></script>
<script src="{{ url('js/fontawesome.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="{{ url('js/bootstrap.js') }}"></script>
<script src="{{ url('js/functions.js') }}"></script>
<script src="{{ url('js/prevent_multiple_submits.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.0/r-2.2.9/rr-1.2.8/datatables.min.js">
</script>
<script src="{{ asset('select2-4.1.0/dist/js/select2.min.js') }}"></script>

<script>
    // $('#perfil_ativo').on('change', function() {
    //     $('#form-alterar-perfil').submit();
    // });
    $(document).ready(function() {


        $('.select2').select2({
            language: {
                noResults: function() {
                    return "Nenhum resultado encontrado";
                }
            },
            closeOnSelect: true,
            width: '100%',
        });


        $('#datatables-reponsive').dataTable({
            "oLanguage": {
                "sLengthMenu": "Mostrar _MENU_ registros por página",
                "sZeroRecords": "Nenhum registro encontrado",
                "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
                "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
                "sInfoFiltered": "(filtrado de _MAX_ registros)",
                "sSearch": "Pesquisar: ",
                "oPaginate": {
                    "sFirst": "Início",
                    "sPrevious": "Anterior",
                    "sNext": "Próximo",
                    "sLast": "Último"
                }
            },
            "order": [0, "asc"]
        });
    });
</script>

@include('sweetalert::alert')

@yield('scripts')

</html>
