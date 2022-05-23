<?php

    class ProdutoController{
       
        public static function index() 
    {
        //colocar isso depois no view
        $model = new ProdutoModel();
        $model->getAllRows(); //pegando todos os registros e colococando na $rows da model
        include 'View/modules/Produto/ProdutoListar.php'; // Include da View
    }

    // manda um view com formulario para o usuario
        public static function form()
    {
        $model = new ProdutoModel();

        if(isset($_GET['id']))  // Verificando se existe uma variável $_GET
            $model = $model->getById( (int) $_GET['id']); //pegando o model prenchido com o id
            
        include 'View/modules/Produto/ProdutoCadastro.php'; //include na view
    }

    //preenche o model para ser enviado ao banco de dados
    public static function save(){
        include 'Model/ProdutoModel.php'; //incluindo 

        //cada propriedade sando abastecida com os dados informados
        $produto = new ProdutoModel();
        $produto->nome = $_POST['nome'];
        $produto->codigo_barras = $_POST['codigo_barras'];
        $produto->marca = $_POST['marca'];
        $produto->descricao = $_POST['descricao'];
        $produto->fornecedor = $_POST['fornecedor'];
        $produto->valor = $_POST['valor'];
        $produto->estoque = $_POST['estoque'];
        $produto->unidade = $_POST['unidade'];

        $produto->save(); //salvandoo >:c

        header("Location: /produto"); //mandando o usuario para outra rota
    }

    //Método para tratar a rota delete. 
    public static function delete(){
        $model = new ProdutoModel();

        $model->delete((int) $_GET['id']); //enviando o $-GET para o delete (tadinho)
        header("Location: /produto"); //mandndo o usuario dnv para outro canto
    }
}
