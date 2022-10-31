<?php

namespace App\DAO;

use App\Model\UsuarioModel;
use \PDO;

class UsuarioDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(UsuarioModel $model)
    {
        $sql = "INSERT INTO usuarios
        (nome, email, senha VALUES ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->senha);

        $stmt->execute();

    }

    public function update(UsuarioModel $model)
    {
        $sql = "UPDATE usuarios SET nome=?, email=?, senha=? WHERE id=?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$model->nome);
        $stmt->bindValue(2,$model->email);
        $stmt->bindValue(3,$model->senha);
        $stmt->bindValue(4,$model->id);

        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM usuarios ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        // Retorna um array com as linhas retornadas da consulta. Observe que
        // o array é um array de objetos. Os objetos são do tipo stdClass e 
        // foram criados automaticamente pelo método fetchAll do PDO.
        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    /**
     * Retorna um registro específico da tabela pessoa do banco de dados.
     * Note que o método exige um parâmetro $id do tipo inteiro.
     */
    public function selectById(int $id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\UsuarioModel"); // Retornando um objeto específico PessoaModel
    }


    /**
     * Remove um registro da tabela pessoa do banco de dados.
     * Note que o método exige um parâmetro $id do tipo inteiro.
     */
    public function delete(int $id)
    {
        $sql = "DELETE FROM usuarios WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}