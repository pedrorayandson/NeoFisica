<!DOCTYPE html>
<html lang="pt-br">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/css.css" type="text/css">
    <title>Conteudo</title>
</head>
<body>
    <img class="img2" src="/Imagens/planeta.jpg"></img>
    <div class="conteudos">
        @foreach ($conts as $cont)
        <div class="imagens">
            <a style="text-decoration: none; color: red;" href="/publicacoes/{{str_replace(" ", "_", $cont->pub_titulo)}}">
                <h1 class="h1">{{$cont->pub_titulo}}</h1>
                <img class="img3" src="/Imagens/{{$cont->pub_img}}" alt="">
            </a>
        </div>
        @endforeach
    </div>
    {{-- @php
        echo App\Models\Conteudo::conteudos();
    @endphp --}}
</body>
</html>