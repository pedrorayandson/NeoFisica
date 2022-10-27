<!DOCTYPE html>
<html style=" background-color: whitesmoke; margin-top: 0%;  margin-left: 0%; margin-right: 0%;" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <div class="up">
            <button id="btn1" onclick="window.location.href ='www.instagram.com'">Instagram</button>
            <img id="img" src="imagens/imgLogo.jpeg">
            <button id="btn1" onclick="window.location.href ='www.facebook.com'">Facebook</button>
            @if (Route::has('login'))
            
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}"style="text-decoration: none;" id="btn5">Home</a>
                    @else
                        <a href="{{ route('login') }}" style="text-decoration: none;" id="btn2">login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="text-decoration: none;"id="btn2">Registrar</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
    </header>
    <div class="sobrenos">
        <h2>Quem somos</h2>
        <p id="text">
           Estamos focados em possibilitar um maneira que o estudantes interessados no mundo da astronomia não perca o interesse por causa da física tendo assuntos muito legal
        </p>
    </div>
    <div class="noticias">
        <h2 >Últimas noticias sobre</h2>
        <h2> Conteudo e Noticias</h2>
        <h2>Do mundo da fisica</h2>
    </div>
    </body>
</html>
