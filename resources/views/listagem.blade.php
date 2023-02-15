<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/css.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css">
    <title>Listagem</title>
</head> 
<body> 
    <img class="img2" src="/Imagens/planeta.jpg"></img>
    <h2 class="h2">Lista de Usuario</h2>
    <div id="user_table">
        <table class = 'listagens' border= 1><tr><td>ID</td><td>nome</td><td>datanasc</td><td>email</td></tr>
            @foreach ($users as $user)
                <tr><td>{{$user->id}}</td><td>{{$user->name}}</td><td>{{$user->data}}</td><td>{{$user->email}}</td></tr>
            @endforeach
        </table>
    </div>
    <h2 class="h2a">Lista de Publicação</h2>
    <div id = "pubs_table">
        <table class="listagem1" border= 1><tr><td>ID</td><td>Título</td><td>Escrito por</td><td>Tipo</td><td>...</td></tr>
        @foreach ($pubs as $pub)
            <tr><td>{{$pub->pub_id}}</td><td>{{$pub->pub_titulo}}</td><td>{{$pub->tip_tipo}}</td><td><a href="publicacao/{{$pub->pub_id}}/edit"><i class="fa-solid fa-pen-to-square"></i></a></td></tr>
        @endforeach
        </table>
    </div> 
    <h2 class="h2s">Views</h2>
    <div id = "views_table" >
        <table class="listagem2" border= 1><tr><td>Publicacao</td><td>Usuário</td></tr>
            @foreach ($views as $view)
                <tr><td>{{$view->pub_titulo}}</td><td>{{$view->name}}</td></tr>
            @endforeach
        </table>
    </div>
</body>
</html>