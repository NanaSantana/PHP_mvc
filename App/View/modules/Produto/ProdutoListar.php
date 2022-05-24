<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <table>
        <!--campos da tabela-->
        <tr>
            <th></th>
            <th>Id</th>
            <th>Nome</th>
            <th>Codigo de Barras</th>
            <th>Marca</th>
            <th>Descrição</th>
        </tr>

        <!--aqui ele vai pegar as linhas preenchidas e separa-las pelos campos-->
        <?php foreach($model->rows as $item): ?>
        <tr>
            <!--esse é do delete, faz aparecer um X para deletar
                ai ele executa o /produto/delete?id -->
            <td><a href="/produto/delete?id=<?= $item->id?>">X</td>
            
            <!--campo que sera preenchido :D -->
            <td><?= $item->id?></td>

            <!--aqui é tipo o delete, mas ao invez de mandar para deletar, ele manda 
                o usuario para o fromulario de produtos-->
            <td><a href="/produto/form?id=<?= $item->id ?>"><?= $item->nome ?></a></td>
            <td><?= $item->codigo_barras?></td>
            <td><?= $item->marca ?></td>
            <td><?= $item->descricao ?></td>
        </tr>
        <?php endforeach ?>   
        
        <!--aqui se não tiver nada cadastrado ele faz aparecer essa mensagem-->
        <?php if(count($model->rows) == 0): ?>
            <tr>
                <td colspan="5">Nenhum registro encontrado.</td>
            </tr>
        <?php endif?>

    </table>
</body>
</html>