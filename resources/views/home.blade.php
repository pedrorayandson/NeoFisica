<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/css.css" type="text/css">
    <title>NeoFisica</title>
</head>
<body> 
<div class="htmls"></div>
    <img class="img2" src="/Imagens/planeta.jpg"></img>
        @if (session('status'))
                            {{ session('status') }}
          @endif
<div class="topnav">
    <a href="/conteudos">Conteudo</a>
    <a href="/noticias" >Noticia</a>
</div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
        <button class="buttonlogin">Sair</button> 
    </form>
    
</body>
</html>

