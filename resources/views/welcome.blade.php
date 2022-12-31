<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/css.css" type="text/css">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>NeoFisica</title>
        </style>
    </head>
    <body>
    <header>
        <div class="topConteiner">
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                <a href="{{ url('/home') }}"style="text-decoration: none;" id="btn7">Home</a>
                    @else
                    <a href="{{ route('login') }}" style="text-decoration: none;" id="btn7">login</a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" style="text-decoration: none;"id="btn7">Registrar</a>
                        @endif
                        @endauth
                <img id="img9" src="/Imagens/neof_logo.png">
                    @if (Route::has('login'))
                    <h2 id="names">NeoFísica</h2>
            </div>
            @endif
        </div>
        <img id="wallpaper" src="/Imagens/wallpaper.png">
            <h1 id="titulo">Uma nova maneira de explicar<br>física</h1>
            <p id="msg">Um site criado especialmente para quem sempre<br>
            achou a matéria de física chata<br>
            apresentando uma nova maneira de<br>
            ensino baseada na expansão do conhecimento<br>
            e direcionado a nova moda do momento<br>a astronomia</p>
    </header>
    </body>
</html>
