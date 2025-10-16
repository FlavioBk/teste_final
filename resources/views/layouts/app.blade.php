<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Sistema de controle Acadêmico')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    
      <main>
        @auth
        <div class="container">
          <div>
            <ul class="nav nav-tabs">
              <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Aluno</a>
                 <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('aluno.create')}}">Cadastrar</a>
                  <a class="dropdown-item" href="{{route('aluno.index')}}">Listar</a>
                 </div>
              </li>
              <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Professor</a>
                 <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('professor.create')}}">Cadastrar</a>
                  <a class="dropdown-item" href="{{route('professor.index')}}">Listar</a>
                 </div>
              </li>
              <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Curso</a>
                 <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('curso.create')}}">Cadastrar</a>
                  <a class="dropdown-item" href="{{route('curso.index')}}">Listar</a>
                 </div>
              </li>
              <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Turma</a>
                 <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('turma.create')}}">Cadastrar</a>
                  <a class="dropdown-item" href="{{route('turma.index')}}">Listar</a>
                 </div>
              </li>
              <li class="nav-item">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Sair</button>
                </form>
              </li>
            </ul>
          </div>
          @yield('content')  
        </div>
        @endauth
      </main>

      <footer class="bg-dark text-white">
        <p class="text-center">&copy; 2025 - Todos os direitos reservados</p>
      </footer>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>