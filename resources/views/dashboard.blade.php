<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <span class="navbar-brand">Sabor do Brasil - Dashboard</span>
        <div>
            <span class="text-white mr-3">Bem-vindo, {{ $usuario->nome }}</span>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-light">Sair</button>
            </form>
        </div>
    </nav>
    
    <div class="container mt-4">
        <h1>Dashboard</h1>
        <p>Você está logado!</p>
        <!-- Conteúdo do dashboard aqui -->
    </div>
</body>
</html>