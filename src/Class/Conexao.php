<?php 


//faz a conexao com o banco de dados

abstract class Conexao{
  
  protected function conectarDB(){

    try{
      $con = new mysqli("localhost","root","","crud","3308");
      return $con;
    }catch(Exception $error){
      return $error->getMessage();
    }

  }
 
  
}