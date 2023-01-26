<!DOCTYPE html>
<html style=" background-color: whitesmoke; margin-top: 0%;  margin-left: 0%; margin-right: 0%;" lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/css.css" type="text/css">
    <title>Publicar</title>
</head>
<body>
    <header>
        <div class="up"> 
            <button id="btn1" onclick="window.location.href ='www.instagram.com'">Instagram</button>
            <button id="btn1" onclick="window.location.href ='www.facebook.com'">Facebook</button>
            <img id="img" src="Imagens/imgLogo.jpeg">  
            <button id="btn2" onclick="window.location.href = '/register'">Cadastro</button>
        </div>
    </header>
    <div id="add">
    <form action="{{route('publicar')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input  class="btn-btn-btn" type="text" name="titulo" placeholder="titulo">
        <textarea  class="btn-btn-btn" name="texto"></textarea>
        <input  class="btn-btn-btn" type="file" name="image" id="">
        <select class="btn-btn-btn" name="tipo" id="tipo">
            <option  class="btn-btn-btn" value="noticia">noticia</option>
            <option  class="btn-btn-btn" value="conteudo">conteudo</option>
        </select>
        <button  class="btn-btn-btn" type="submit">Publicar</button>
    </form>
    </div>
</body>
</html>