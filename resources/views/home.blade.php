<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','Sabor do Brasil')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="bg-light">
  
    <main>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="modal-body">
          @if($errors->any())
            <div class="alert alert-danger">
              {{ $errors->first() }}
            </div>
          @endif
          
          <div class="form-group">
            <input placeholder="Nome" type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}" required>
          </div>
          <div class="form-group">
            <input placeholder="Senha" type="password" class="form-control @error('senha') is-invalid @enderror" id="senha" name="senha" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
      </form>
    </div>
  </div>
</div>
      
      <div class="bg-primary text-white py-3 shadow mb-4">
        <h1 class="text-center mb-0">Sabor do Brasil</h1>
      </div>
      
      <div class="container">
        <div class="row">
          <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0">
              <div class="card-body text-center">
                <img class="rounded-circle mx-auto d-block mb-3 shadow" src="{{asset('imagens/logo.png')}}" alt="logo" width="100">
                <h5 class="card-title text-dark border-bottom pb-2">Sabor do Brasil</h5>
                
                <div class="row mt-3">
                  <div class="col-6">
                    <div class="bg-light rounded p-2">
                      <h4 class="text-primary mb-0">{{ $totalLikes ?? 0 }}</h4>
                      <small class="text-muted">Likes Totais</small>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="bg-light rounded p-2">
                      <h4 class="text-danger mb-0">{{ $totalDislikes ?? 0 }}</h4>
                      <small class="text-muted">Dislikes Totais</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 border-left border-right">
            <h5 class="text-center mb-4 text-dark">Publicações</h5>
            
            <div class="d-flex flex-column align-items-center">
              @foreach($publicacoes as $publicacao)
              <div class="card shadow-sm mb-4 w-100">
                <div class="card-body">
                  <h6 class="card-title text-dark">{{$publicacao->titulo_prato}}</h6>
                  <img src="{{asset($publicacao->foto)}}" alt="{{$publicacao->titulo_prato}}" class="img-fluid rounded mb-3" style="max-height: 200px; object-fit: cover; width: 100%;">
                  
                  <div class="d-flex justify-content-between mb-3">
                    <span class="text-muted">{{$publicacao->local}}</span>
                    <span class="text-muted">{{$publicacao->cidade}}</span>
                  </div>

                  <div class="mb-3">
                    <small class="text-muted">
                      Likes: {{ $publicacao->likes }} | Dislikes: {{ $publicacao->dislikes }}
                    </small>
                  </div>

                  <div class="btn-group btn-group-sm w-100" role="group">
                    @auth
                    <form method="POST" action="{{ route('like', $publicacao->id) }}" class="w-100">
                      @csrf
                      <button type="submit" class="btn btn-outline-success rounded-left w-100">
                        @if(session("liked_{$publicacao->id}"))
                          <img src="{{ asset('imagens/flecha_cima_cheia.svg') }}" alt="like" width="20">
                        @else
                          <img src="{{ asset('imagens/flecha_cima_vazia.svg') }}" alt="like" width="20">
                        @endif
                      </button>
                    </form>
                    
                    <form method="POST" action="{{ route('dislike', $publicacao->id) }}" class="w-100">
                      @csrf
                      <button type="submit" class="btn btn-outline-danger w-100">
                        @if(session("disliked_{$publicacao->id}"))
                          <img src="{{ asset('imagens/flecha_baixo_cheia.svg') }}" alt="dislike" width="20">
                        @else
                          <img src="{{ asset('imagens/flecha_baixo_vazia.svg') }}" alt="dislike" width="20">
                        @endif
                      </button>
                    </form>
                    @else
                    <button class="btn btn-outline-secondary rounded-left w-100" disabled>
                      <img src="{{ asset('imagens/flecha_cima_vazia.svg') }}" alt="like" width="20">
                    </button>
                    <button class="btn btn-outline-secondary w-100" disabled>
                      <img src="{{ asset('imagens/flecha_baixo_vazia.svg') }}" alt="dislike" width="20">
                    </button>
                    @endauth
                    
                    <a href="{{ route('comentarios.toggle', $publicacao->id) }}" class="btn btn-outline-primary rounded-right w-100">
                      <img src="{{ asset('imagens/chat.svg') }}" alt="chat">
                      <small>({{ $publicacao->comentarios->count() }})</small>
                    </a>
                  </div>

                  @if(session("show_comentarios_{$publicacao->id}"))
                  <div class="mt-4 border-top pt-3">
                    <h6 class="text-dark">Comentários:</h6>
                    
                    <form method="POST" action="{{ route('comentario.store', $publicacao->id) }}" class="mb-3">
                      @csrf
                      <div class="form-group">
                        <textarea class="form-control" name="texto" rows="2" placeholder="Adicione um comentário..." required></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm">Comentar</button>
                    </form>
                    
                    @foreach($publicacao->comentarios as $comentario)
                    <div class="border-bottom pb-2 mb-2">
                      <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                          <p class="mb-1 small">{{ $comentario->texto }}</p>
                        </div>
                        <div class="btn-group btn-group-sm ml-2">
                          <button type="button" class="btn btn-outline-primary btn-sm" 
                                  data-toggle="collapse" 
                                  data-target="#editForm{{ $comentario->id }}">
                            <img src="{{ asset('imagens/lapis_editar.svg') }}" alt="Editar" width="14">
                          </button>
                          <form method="POST" action="{{ route('comentario.destroy', $comentario->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" 
                                    onclick="return confirm('Tem certeza que deseja excluir este comentário?')">
                              <img src="{{ asset('imagens/lixeira_deletar.svg') }}" alt="Excluir" width="14">
                            </button>
                          </form>
                        </div>
                      </div>

                      <div class="collapse mt-2" id="editForm{{ $comentario->id }}">
                        <form method="POST" action="{{ route('comentario.update', $comentario->id) }}">
                          @csrf
                          @method('PUT')
                          <div class="form-group mb-2">
                            <textarea class="form-control" name="texto" rows="2" required>{{ $comentario->texto }}</textarea>
                          </div>
                          <div class="btn-group btn-group-sm">
                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <button type="button" class="btn btn-secondary btn-sm" 
                                    data-toggle="collapse" 
                                    data-target="#editForm{{ $comentario->id }}">
                              Cancelar
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  @endif
                </div>
              </div>
              @endforeach
            </div>
          </div>

          <div class="col-md-3 text-center">
            <button type="button" class="btn btn-primary btn-lg w-100 mb-3 shadow" data-toggle="modal" data-target="#loginModal">
              Entrar
            </button>
          </div>
        </div>
      </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4 text-center text-md-left mb-2 mb-md-0">
            <p class="mb-0 text-primary">Sabor do Brasil</p>
          </div>
          <div class="col-md-4 text-center mb-2 mb-md-0">
            <div class="d-flex justify-content-center">
              <a class="text-white mx-2" href=""><img src="{{ asset('imagens/Instagram.svg') }}" alt="Instagram" width="24"></a>
              <a class="text-white mx-2" href=""><img src="{{ asset('imagens/Whatsapp.svg') }}" alt="WhatsApp" width="24"></a>
              <a class="text-white mx-2" href=""><img src="{{ asset('imagens/Twitter.svg') }}" alt="Twitter" width="24"></a>
              <a class="text-white mx-2" href=""><img src="{{ asset('imagens/Globe.svg') }}" alt="Site" width="24"></a>
            </div>
          </div>
          <div class="col-md-4 text-center text-md-right">
            <p class="mb-0 small">&copy; Direitos Autorais 2025</p>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>