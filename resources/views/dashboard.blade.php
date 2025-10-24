<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Sabor do Brasil')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    
      <main>
        <h1 class="text-center navbar-dark bg-primary">Sabor do Brasil Logado</h1>
       <div class="container">
    <div class="row">
    <div class="col">
      <img class="rounded mx-auto d-block" src="{{ asset('imagens/' . Auth::user()->foto) }}" alt="imagem usuário">
      <h5 class="text-center border-bottom border-dark">Sabor do Brasil Logado</h5>
      <div class="container">
      <div class="row">
        <div class="col">
         <h3 class="text-center">{{$likes_total}}</h3>
         <h6 class="text-center">Quantidade Likes</h6>
        </div>
        <div class="col">
          <h3 class="text-center">{{$dislikes_total}}</h3>
          <h6 class="text-center">Quantidade de Dislikes</h6>
        </div>
      </div>
      </div>
        </div>
    <div class="col-6 border-left border-right border-dark">
  <h5 class="text-center mb-4">Publicações</h5>
  <div class="d-flex flex-column align-items-center">
    @foreach($publicacoes as $publicacao)
      <div class="border border-dark p-3 mb-4 w-75 text-center rounded">
        <h6>{{$publicacao->titulo_prato}}</h6>
        <img src="{{asset($publicacao->foto)}}" alt="{{$publicacao->titulo_prato}}" class="img-fluid mb-2">
        <div class="row">
          <p class="col text-left">{{$publicacao->local}}</p>
          <p class="col text-right">{{$publicacao->cidade}}</p>
        </div>
        <button class="btn btn-light">
          <img src="{{ asset('imagens/flecha_cima_vazia.svg') }}" alt="like">
        </button>
        <button class="btn btn-light">
          <img src="{{ asset('imagens/flecha_baixo_vazia.svg') }}" alt="dislike">
        </button>
        <button class="btn btn-light">
          <img src="{{ asset('imagens/chat.svg') }}" alt="chat">
        </button>
      </div>
    @endforeach
  </div>
</div>
    <div class="col text-center">
     <a href="{{ route('logout') }}" class="btn btn-danger btn-lg">Sair</a>
    </div>
  </div>
</div>
      </main>

      <footer class="bg-dark text-white container-fluid sticky-footer">
        <div class="container">
        <div class="row">
          <div class="col">
            <p class="text-center">Sabor do Brasil</p>
          </div>
          <div class="col-6 ">
            <nav class="nav row">
              <a class="nav-link text-center col" href=""><img src="{{ asset('imagens/Instagram.svg') }}" alt="Insta"></a>
              <a class="nav-link text-center col" href=""><img src="{{ asset('imagens/Whatsapp.svg') }}" alt="Whatss"></a>
              <a class="nav-link text-center col" href=""><img src="{{ asset('imagens/Twitter.svg') }}" alt="Twitter"></a>
              <a class="nav-link text-center col" href=""><img src="{{ asset('imagens/Globe.svg') }}" alt="Goggle"></a>
            </nav>
          </div>
          <div class="col">
            <p>&copy; Direitos Autorais 2025</p>
          </div>
        </div>
        </div>
      </footer>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>