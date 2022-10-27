@section('content')
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/css.css" type="text/css">
    <title>Login</title>
</head>
<body >
    <a href="/"><button  class="buttonlogin">Pagina Inicial</button></a>
    <div class="html"></div>
    <img class="img2" src="/Imagens/planeta.jpg"></img>
    <div class="login">

            
        <img class="img" src="/Imagens/planeta.jpg"></img>
 
        <form method="POST" action="{{ route('login') }}">
        @csrf

                         

                          
        <input id="email" type="email" name="email" placeholder="Digite seu email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <spanrole="alert">
                <strong>{{ $message }}</strong>
         </span>
              @enderror
                         

                   

                        
        <input id="password" type="password" name="password" placeholder="Digite sua senha" required autocomplete="current-password">

         @error('password')
            <span  role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
                       


          <button class="loginbutao" type="submit">
                {{ __('Acessar') }}
         </button>
        </form>
              

     </div>
</body>
</html>
  