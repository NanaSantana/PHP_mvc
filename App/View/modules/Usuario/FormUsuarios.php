<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <form action="/usuario/save" method="post">
        <fieldset>
            <legend>Cadastro de Pessoa</legend>
            <label for="nome">Nome:</label>
            <input name="nome" id="nome" type="text" />

            <label for="email">E-mail:</label>
            <input name="email" id="email" type="email" />

            <label for="senha">CPF:</label>
            <input name="senha" id="senha" type="number" />

            <button type="submit">Enviar</button>

        </fieldset>
    </form>    
</body>
</html>