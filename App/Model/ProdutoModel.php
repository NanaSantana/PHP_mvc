<?php

class ProdutoModel{

    //criando as propriedades igual o da tabela do banco de dados
    public $id, $nome, $codigo_barras, $marca, $descricao;
    public $fornecedor, $valor, $estoque, $unidade;

    public $rows; //caixinha onde vamos guardar os registros

    //ele chama a dao para salvar no banco de dados
    public function save()
    {

        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        //vendo se a prorpie3dade id foi preenchida no model
        if($this->id == null){

            //insert recebe o nome do proprio objeto
            $dao->insert($this);
        } else{

        }
    }

    //ele selecionara todas as linhas que foram cadastradas
    public function getAllRows(){
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        //Abastecimento da propriedade $rows com as "linhas" vindas do MySQL
        $this->rows = $dao->select();
    }

    //aqui ao invez de selecionar tudo ele pelo id
    public function getById(int $id){
        $dao = new ProdutoDAO();

        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO
        return ($obj) ? $obj : new ProdutoModel();
    }

    //metodo q vai excluir as coisas
    //ele ta pegando o comando da DAO, para assim apagar do banco de dados tmb
    public function delete(int $id)
    {
        $dao = new ProdutoDAO();

        $dao->delete($id);
    }
}