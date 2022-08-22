<?php
namespace App\DAO;
use App\Model\ProdutoModel;
use \PDO;

class ProdutoDAO{

    private $conexao;

    function __construct()
    {
        //entrar no servidor do mysql
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema"; 

        //conecta no servidor de mysql
        $this->conexao = new PDO($dsn, 'root', 'etecjau');
    }

    //esse insert pega as coisas da model e manda na tabela poara que o usuario veja
    function insert(ProdutoModel $model){

        //o ? substitui os valores no banco de dados
        $sql = "INSERT INTO produto
                (nome, codigo_barras, marca, descricao, fornecedor, valor, estoque, unidade)
                VALUES (?,?,?,?,?,?,?,?)";
        
        $stmt = $this->conexao->prepare($sql);

        //o binvalue ajuda a dao a substituir a posição dos ?
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->codigo_barras);
        $stmt->bindValue(3, $model->marca);
        $stmt->bindValue(4, $model->descricao);
        $stmt->bindValue(5, $model->fornecedor);
        $stmt->bindValue(6, $model->valor);
        $stmt->bindValue(7, $model->estoque);
        $stmt->bindValue(8, $model->unidade);

        //executa :D
        $stmt->execute();
        
    }

    //vai atualizar no banco de dados
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

    //ele retorna os registros na tabela do usuario
    public function select()
    {
        $sql = "SELECT * FROM produto";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //vai retornar uma coisa em especifico na tabela
    public function selectById(int $id){
        $sql = "SELECT * FROM produto WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("ProdutoModel");
        
    }
    //deleta um determinado registro
    public function delete(int $id){
        $sql = "DELETE FROM produto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
