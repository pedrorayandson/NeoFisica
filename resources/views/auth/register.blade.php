
@section('content')
<!DOCTYPE html>
<html  style=" background-color: whitesmoke; margin-top: 0%;  margin-left: 0%; margin-right: 0%;" lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/css.css" type="text/css">
    <title>Registro de Usuario</title>
</head>
<body>
<header>
        <div class="up">
            <button id="btn1" onclick="window.location.href ='www.instagram.com'">Instagram</button>
            <button id="btn1" onclick="window.location.href ='www.facebook.com'">Facebook</button>
            <img id="img" src="Imagens/imgLogo.jpeg">  
            <button id="btn2" onclick = "window.location.href ='/login'">Login</button>
        </div>
</header>
<div class="cad">
    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    
                                <input id="name" type="text" placeholder="Digite seu Nome" class=" btn-btn" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        

                         
                                <input id="email" placeholder="Digite seu Email" type="email" class=" btn-btn" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
                        
                               <input id="data" type="date" class=" btn-btn" name="data" value="{{ old('data') }}" required autocomplete="data">

                                @error('data')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        

                                <input id="password" placeholder="Confirmar senha" type="password" class=" btn-btn" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                          

                                <input id="password-confirm" placeholder="Confirmar Senha" type="password" class=" btn-btn" name="password_confirmation" required autocomplete="new-password">

        
                                <button type="submit" id="btnspe">
                                    {{ __('Register') }}
                                </button>
                    </form>
</div>
</body>
</html>
