<?php

include("../Includes/Variaveis.php");
include("../Class/ClassCrud.php"); 


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
    
}

