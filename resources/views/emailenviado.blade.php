<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>~Email</title>
</head>
<body>
    <h1>{{$data['name']}} compartilhou um email</h1>
    <h2>Email do Usuario é : {{$data['user']->email}}</h1>
    <h2>A descrição do problema:</h1>
    <p>{{$data['mensagem']}}</p>
</body>
</html> 