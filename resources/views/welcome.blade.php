<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
       
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      
        <style>
            body{
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            form{
                display: flex;
                width: 500px;
                height: 500px;
                box-shadow: 0 0 10px 1px rgba(0,0,0, .5);
                
                justify-content: start;
                flex-direction: column;
                margin: auto;
                padding: 50px 40px;
                box-sizing: border-box;
                border-radius: 10px;
            }
            form input{
                display: flex;
                height: 40px;
                outline: 0;
                border: 2px solid #ccc;
                border-radius: 5px;
                padding: 10px 15px;
                box-sizing: border-box;
                margin-bottom: 8px;
            }
            button{
                display: flex;
                width: 100px;
                height: 30px;
                align-items: center;
                justify-content: center;
                margin-top: 20px;
            }
        </style>


        <script>

            function validarPost(){
                
                if(grecaptcha.getResponse() != ""){
                    return true;
                }else{
                    var teste = document.getElementById('erro');
                    teste.innerHTML = 'Preencha a caixa "Não sou um robô" ';
                    return false;
                }                
            }
        </script>
    </head>
    <body>

        <form action="/create" method="POST" id="demo-form" onsubmit="return validarPost()"> 
        @csrf  
            <label for="q">Pesquisa</label>
            <input type="text" name="pesquisa" id="q" autofocus required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="tel">Telefone</label>
            <input type="tel" name="telefone" id="tel">

            <div class="g-recaptcha" data-sitekey="6LfIdB4lAAAAADWTxmcmvLYQq2rhWvXLIIVTmPv_"></div>

            @if(session('msg'))
                <p id="msg" class="msg">{{ session('msg') }}</p>
            @endif
            <span id="erro"></span>
            <button type="submit">Enviar</button>
        </form>


        
    </body>
</html>
