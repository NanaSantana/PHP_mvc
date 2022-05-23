<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <form action="/produto/save" method="post">
        <fieldset>
            <legend>Cadastro de Produto</legend>
            <label for="nome">Nome:</label>
            <input name="nome" id="nome" type="text" />

            <label for="codigo_barras">Codigo de Barras:</label>
            <input name="codigo_barras" id="codigo_barras" type="numer" />

            <label for="marca">Marca:</label>
            <input name="marca" id="marca" type="text" />

            <label for="descricao">Descrição:</label>
            <input name="descricao" id="descricao" type="text" />

            <label for="fornecedor">Fornecedor:</label>
            <input name="fornecedor" id="fornecedor" type="text" />

            <label for="valor">Valor:</label>
            <input name="valor" id="valor" type="numer"/>

            <label for="estoque">Estoque:</label>
            <input name="estoque" id="estoque" type="numer" />
            
            <label for="unidade">Unidade:</label>
            <input name="unidade" id="unidade" type="text" />

            <button type="submit">Enviar</button>

        </fieldset>
    </form>    
</body>
</html>