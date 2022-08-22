<?php

namespace App\DAO;
use App\Model\CategoriaModel;
use \PDO;

    class CategoriaDAO{
        private $conexao;

        public function __construct()
        {
            $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
            $this->conexao = new PDO($dsn, 'root', 'etecjau');
        }

        public function insert(CategoriaModel $model){
            $sql = "INSERT INTO categoriaP
            (descricao) VALUES (?)"; 

            $stmt = $this->conexao->prepare($sql);

            $stmt->bindValue(1, $model->descricao);
            $stmt->execute();
        }

        public function update(CategoriaModel $model){

            $sql = "UPDATE categoriaP SET descricao=? WHERE id=?";
            
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1,$model->descricao);
            $stmt->bindValue(2,$model->id);
        }

        public function select(){
            $sql = "SELECT * FROM categoriaP";

            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }

        public function selectById(int $id){
            $sql = "SELECT * FROM categoriaP WHERE id=?";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject("CategoriaModel");
        }

        public function delete(int $id){
            $sql = "DELETE FROM categoriaP WHERE id = ?";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
        }
    }