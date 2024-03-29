<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/css.css" type="text/css">
    <title>Administrador</title>
</head>
<body>
    <div class="html"></div>
    @if (Auth::user()->avatar == null)
        <button onclick="window.location.href = '/user/edit/{{Auth::user()->id}}'"><img src="{{asset("avatars/avatar.jpg")}}" class="avatar"></button> 
    @else
    <button onclick="window.location.href = '/user/edit/{{Auth::user()->id}}'" class = "editar_avatar" title="editar">
        <img src="{{asset(Auth::user()->avatar)}}" class="avatar">
    </button>
    @endif

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
    <button class="buttonlogin">Sair</button> 
    <img class="img2" src="/Imagens/planeta.jpg">
    <div class="login">
    <img class="img" src="/Imagens/planeta.jpg">
    
    </form>
    @if (session('status'))
        {{ session('status') }}
    @endif
    <form action="/publicar" method="GET">
        <button class="loginbuttons">Cadastro de Publicação</button>
    </form>                
    <form action="/listagem" method="GET">
        <button class="loginbutaos">Fazer Listagem</button>
    </form>
    </div>
</body>
</html>

