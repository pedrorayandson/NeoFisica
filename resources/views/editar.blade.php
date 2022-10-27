<!DOCTYPE html>
<html  style=" background-color: whitesmoke; margin-top: 0%;  margin-left: 0%; margin-right: 0%;" lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/css.css" type="text/css">
    <title>Editar</title>
</head>
<body>
    <header>
        <div class="up"> 
            <button id="btn1" onclick="window.location.href ='www.instagram.com'">Instagram</button>
            <button id="btn1" onclick="window.location.href ='www.facebook.com'">Facebook</button>
            <img id="img" src="../imagens/imgLogo.jpeg">
            <button id="btn2" onclick="window.location.href = '/register'">Cadastro</button>
        </div>
    </header>
    <div id="add">
    <h1 class="h5">Editar Publicação</h1>
    <form action="{{route('update', ['id' => $pubs->pub_id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" class="btn-btn-btn" name="titulo" value="{{$pubs->pub_titulo}}" placeholder="editar título">
        <input type="file" class="btn-btn-btn" name="image" placeholder="Mudar imagem">
        <textarea name="texto" class="btn-btn-btn" id="" cols="30" rows="10" aria-placeholder="editar texto">{{$pubs->pub_texto}}</textarea>
        <button  class="btn-btn-btn" >Editar</button>
    </form>
    </div>
</body>
</html>