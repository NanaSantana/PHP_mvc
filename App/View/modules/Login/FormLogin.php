<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <form action="/login/auth" method="post">
        <fieldset>
            <legend>Login</legend>

                <label>E-mail:</label>
                <input name="email" type="text"/>

                <label>Senha:</label>
                <input name="senha" type="password"/>

                </br>

                <button type="submit">Entrar</button>

        </fieldset>
    </form>    
</body>
</html>
