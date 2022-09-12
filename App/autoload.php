<?php

//o autoload faz com que agnete nao precise mais do include, pq ai o php procurs rprwa gente
//spl --> classesz internas do php ;D

spl_autoload_register(function ($nome_da_classe) {

    $arquivo = BASEDIR . '/' . $nome_da_classe . '.php';

    if(file_exists($arquivo)){
        include $arquivo;
    } else
    exit('Arquivo não encontrado. Arquivos:' . $arquivo ."<br/>");
});