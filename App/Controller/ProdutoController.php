<?php

    class ProdutoController{
       
        public static function index() 
    {
        //colocar isso depois no view
        $model = new ProdutoModel();
        $model->getAllRows();
        include 'View/modules/Produto/ProdutoListar.php';
    }

        public static function form()
    {
        $model = new ProdutoModel();

        if(isset($_GET['id'])) 
            $model = $model->getById( (int) $_GET['id']); 
            
        include 'View/modules/Produto/ProdutoCadastro.php';
    }

    public static function save(){
        include 'Model/ProdutoModel.php';

        $produto = new ProdutoModel();
        $produto->nome = $_POST['nome'];
        $produto->codigo_barras = $_POST['codigo_barras'];
        $produto->marca = $_POST['marca'];
        $produto->descricao = $_POST['descricao'];
        $produto->fornecedor = $_POST['fornecedor'];
        $produto->valor = $_POST['valor'];
        $produto->estoque = $_POST['estoque'];
        $produto->unidade = $_POST['unidade'];

        $produto->save();

        header("Location: /produto");
    }

    public static function delete(){
        $model = new ProdutoModel();

        $model->delete((int) $_GET['id']);
        header("Location: /produto");
    }
}
