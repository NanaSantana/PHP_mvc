<?php

use App\Controller\
{
    CategoriaController,
    ProdutoController,
    PessoaController
};


//include 'Controller/PessoaController.php';

// Para saber mais sobre a função parse_url: https://www.php.net/manual/pt_BR/function.parse-url.php
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Para saber mais estrutura switch, leia: https://www.php.net/manual/pt_BR/control-structures.switch.php
    switch($url)
    {
        case '/':
            echo "página inicial";
        break;
    
        case '/pessoa':
            //lista de pessoas
            // Para saber mais sobre o Operador de Resolução de Escopo (::), 
            // leia: https://www.php.net/manual/pt_BR/language.oop5.paamayim-nekudotayim.php
            PessoaController::index();
        break;
    
        case '/pessoa/form':
            //formulario de pessoas
            PessoaController::form();
        break;
    
        case '/pessoa/save':
            PessoaController::save();
        break;
    
        case '/pessoa/delete':
            PessoaController::delete();
        break;

    //produtos produtos produtos produtos produtos produtos produtos produtos produtos produtos produtos produtos produtos produtos produtos

        case '/produto':
            //lista de pessoas
            // Para saber mais sobre o Operador de Resolução de Escopo (::), 
            // leia: https://www.php.net/manual/pt_BR/language.oop5.paamayim-nekudotayim.php
            ProdutoController::index();
        break;

        case '/produto/form':
            //formulario de pessoas
            ProdutoController::form();
        break;

        case '/produto/save':
            ProdutoController::save();
        break;

        case '/produto/delete':
            ProdutoController::delete();
        break;

    // categoria categoria categoria categoria categoria categoria categoria categoria categoria categoria categoria categoria categoria categoria 

        case '/categoria':
            CategoriaController::index();
        break;

        case '/categoria/form':
            CategoriaController::form();
        break;

        case '/categoria/save':
            CategoriaController::save();
        break;

        case '/categoria/delete':
            CategoriaController::delete();
        break;

        default:
            echo "Erro 404";
        break;
    }