<?php

class ProdutoDAO{

    private $conexao;

    function __construct()
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema"; 

        $this->conexao = new PDO($dsn, 'root', 'etecjau');
    }

    function insert(ProdutoModel $model){

        $sql = "INSERT INTO produto
                (nome, codigo_barras, marca, descricao, fornecedor, valor, estoque, unidade)
                VALUES (?,?,?,?,?,?,?,?)";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->codigo_barras);
        $stmt->bindValue(3, $model->marca);
        $stmt->bindValue(4, $model->descricao);
        $stmt->bindValue(5, $model->fornecedor);
        $stmt->bindValue(6, $model->valor);
        $stmt->bindValue(7, $model->estoque);
        $stmt->bindValue(8, $model->unidade);

        $stmt->execute();
        
    }

    public function update(ProdutoModel $model){
        $sql = "UPDATE produto SET
                nome=?, codigo_barras=?, marca=?, descricao=?, fornecedor=?, valor=?, estoque=?, unidade=?
                WHERE id=?";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->codigo_barras);
        $stmt->bindValue(3, $model->marca);
        $stmt->bindValue(4, $model->descricao);
        $stmt->bindValue(5, $model->fornecedor);
        $stmt->bindValue(6, $model->valor);
        $stmt->bindValue(7, $model->estoque);
        $stmt->bindValue(8, $model->unidade);
        $stmt->bindValue(9, $model->id);
    }

    public function select()
    {
        $sql = "SELECT * FROM produto";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id){
        $sql = "SELECT * FROM produto WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("ProdutoModel");
        
    }

    public function delete(int $id){
        $sql = "DELETE FROM produto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
