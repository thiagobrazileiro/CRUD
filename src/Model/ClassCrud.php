<?php

include ("{$_SERVER['DOCUMENT_ROOT']}/MYSQLI/src/Model/Conexao.php");

class ClassCrud extends Conexao{

    private $Crud;
    private $Contador;
    private $Resultado;

    private function preparedStatements($Query, $Tipos, $Parametros){

        $this->countParametros($Parametros);

        $Con = $this->conectarDB();
        $this->Crud = $Con->prepare($Query);

        if($this->Contador > 0){
            $CallParametros = array();
            foreach($Parametros as $Key => $Parametro){
                $CallParametros[$Key] = &$Parametros[$Key];
            }
            array_unshift($CallParametros, $Tipos);
            call_user_func_array(array($this->Crud,'bind_param'),$CallParametros);
        }

        $this->Crud->execute();
        $this->Resultado=$this->Crud->get_result();

    }

    //Contador de parametros
    private function countParametros($Parametros){
        $this->Contador = count($Parametros);
    }

    //Inserçao no banco de dados
    public function insertDB($Tabela, $Condicao, $Tipos, $Parametros){
        $this->preparedStatements("insert into {$Tabela} values ({$Condicao})", $Tipos, $Parametros);
        return $this->Crud;
    }

    //Seleção do banco de dados
    public function selectDB($Campos, $Tabela, $Condicao, $Tipos, $Parametros){
        $this->preparedStatements("select {$Campos} from {$Tabela} {$Condicao}", $Tipos, $Parametros);
        return $this->Resultado;
    }

    #Método para apagar dados no DB
    public function deleteDB($Tabela , $Condicao , $Tipos , $Parametros){
        $this->preparedStatements("delete from {$Tabela} where {$Condicao}", $Tipos , $Parametros);
        return $this->Crud;
    }

    #Atualização no banco de dados
    public function updateDB($Tabela , $Set , $Condicao , $Tipos , $Parametros){
        $this->preparedStatements("update {$Tabela} set {$Set} where {$Condicao}", $Tipos, $Parametros);
        return $this->Crud;
    }
}