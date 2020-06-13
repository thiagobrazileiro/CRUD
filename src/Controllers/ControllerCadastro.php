<?php

include("../Includes/Variaveis.php");
include("../Model/ClassCrud.php"); 


$Crud = new ClassCrud();

if($Acao=='Cadastrar'){
    $Crud->insertDB(
        "cadastro",
        "?,?,?,?",
        "isss",
        array(
            $Id,
            $Nome,
            $Instituicao,
            $Curso
        )
    );
    echo("Cadastrado com sucesso");
    
}else{
    $Crud->updateDB(
        "cadastro",
        "Nome=?,Instituicao=?,Curso=?",
        "Id=?",
        "sssi",
        array(
            $Nome,
            $Instituicao,
            $Curso,
            $Id
        )
    );
    echo("Editado com sucesso");
    
}

