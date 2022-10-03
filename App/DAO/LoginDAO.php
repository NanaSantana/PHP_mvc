<?php

namespace App\DAO;

use App\Model\LoginModel;
use \PDO;

class LoginDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }


    public function selectByEmailAndSenha($email, $senha){
        $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = sha1(?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\LoginModel");
    }

    /*
    use db_sistema;

    insert into usuarios (nome, email, senha) 
    VALUES ('nome', 'email@email', sha1('123123'));

    select * FROM usuarios;*/
}