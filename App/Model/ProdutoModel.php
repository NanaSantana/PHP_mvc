<?php

class ProdutoModel{
    public $id, $nome, $codigo_barras, $marca, $descricao;
    public $fornecedor, $valor, $estoque, $unidade;

    public $rows;

    public function save()
    {

        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        if($this->id == null){

            $dao->insert($this);
        } else{

        }
    }
    public function getAllRows(){
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id){
        $dao = new ProdutoDAO();

        $obj = $dao->selectById($id);
        return ($obj) ? $obj : new ProdutoModel();
    }
    public function delete(int $id)
    {
        $dao = new ProdutoDAO();

        $dao->delete($id);
    }
}