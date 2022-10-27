<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/css.css" type="text/css">
    <title>Notícias</title>
</head>
<body>
    <img class="img2" src="/Imagens/planeta.jpg"></img>
    <div class="noticias2">
        @foreach ($nots as $not)
        <div class="imagens">
        <a href="/publicacoes/{{str_replace(" ", "_", $not->pub_titulo)}}">
            <h1 class="h1">{{$not->pub_titulo}}</h1>
            <img class="img3" src="/Imagens/{{$not->pub_img}}" alt="">
        </a>
        </div>
        @endforeach
    </div>
</body>
</html>