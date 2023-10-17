<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<body>
    <!-- NavBar of the System-->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark ">
        <div class="container-fluid px-5">
          <a class="navbar-brand" href="/">Sistema de Processos</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
              <li class="nav-item">
                <a class="nav-link text-white"  href="/"> <i class="bi bi-house-door me-1"></i>Pagina Inicial</a>
              </li>
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Processos
                </a>
                <ul class="dropdown-menu bg-dark">
                  <li><a class="dropdown-item text-white" href="/processo"><i class="bi bi-list"></i>Lista de Processo</a></li>
                  <li><a class="dropdown-item text-white" href="/processo/create"><i class="bi bi-plus-circle-fill"></i> Cadastrar Processo </a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Juiz
                </a>
                <ul class="dropdown-menu bg-dark">
                  <li><a class="dropdown-item text-white" href="/juiz"><i class="bi bi-list"></i> Lista de Juizes </a></li>
                  <li><a class="dropdown-item text-white" href="/juiz/create"><i class="bi bi-plus-circle-fill"></i> Cadastrar Juiz </a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Sessão
                </a>
                <ul class="dropdown-menu bg-dark">
                  <li><a class="dropdown-item text-white" href="/sessao"><i class="bi bi-list"></i> Lista de Sessões </a></li>
                  <li><a class="dropdown-item text-white" href="/sessao/create"><i class="bi bi-plus-circle-fill"></i> Cadastrar Sessão </a></li>
                </ul>
              </li>
              @endauth
            </ul>
             <div>
                <ul class="navbar-nav ">
                    @guest
                    <li class="nav-item ">
                      <a class="nav-link text-white"  href="/register">Registar <i class="bi bi-journals" style="font-size: 16px;"></i></a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link text-white" href="/login">Login <i class="bi bi-box-arrow-in-right" style="font-size: 16px;"></i></a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item ">
                        <form action="/logout" method="post">
                            @csrf
                            <a class="nav-link text-white"  href="/logout" onclick="event.preventDefault();
                            this.closest('form').submit();">Sair <i class="bi bi-x-lg" style="font-size: 16px;"></i></a>
                        </form>
                    </li>
                    @endauth
                  </ul>
              </div>
          </div>
        </div>
    </nav>

    <!-- Todo o Projecto -->
    @yield('content')

  


    <!-- Footer of the System -->

    <footer class="bg-primary fixed-bottom py-2">
        <p class="text-center fw-bold text-white"> Sistema desenvolvido para o TA</p>
    </footer>



    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>
