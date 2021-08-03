<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexao
 *
 * @author raqpa
 */
class Conexao {
    //ver se funciona assim com conexao postgre, modelo usado e par mysql
    public $host = "localhost";
    public $port = "5432";
    public $user = "raquel";
    public $pass = "";
    public $dbname = "controle";
    public $connect = null;
    
    public function connectar(){
        try{
            $this->conexao = new PDO('postresql=host'.$this->host.';port = '.$this->port.';'
                    . 'banco ='.$this->dbname,$this->user,$this->pass);
            //só para ver se a conexao realizou, DEPOIS TEM QUE APAGAR O ECHO, NÃO É RECOMENDADO DEIXAR AQUI.
            echo "conexao realizada com sucesso";
        } catch (Exception $ex) {
            echo "Conexão falhou! Erro:".ex;
            return false;
        }
    }
    
}
