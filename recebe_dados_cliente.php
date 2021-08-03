<?php
<html>
<body>
require_once("base.php");

class Cliente{
   private  $nome = $_POST["nome"];
   private  $telefone = $_POST["telefone"];
   private  $email = $_POST["email"];
   private  $pessoa = $_POST["pessoa"];
   private  $informeonumero = $_POST["informeonumero"];
   private  $rua = $_POST["rua"];
   private  $numero = $_POST["numero"];
   private  $bairro = $_POST["bairro"];
   private  $cep = $_POST["cep"];
   private  $cidade = $_POST["cidade"];
   private  $estado = $_POST["estado"];

   public function getNome(){
       return $this-> nome;
   }
     public function setNome($nome){
         if (strlen($nome)<5 || strlen($nome)>100){
             throw new Exception("O nome deve conter no mínimo 5 e no máximo 100 caracteres!", 1);
             }
        $this->nome = $nome;
   }
     public function geTelefone(){
    return $this-> telefone;
   }
    public function setTelefone($telefone){
        if(sterlen(telefone)!11){
            throw new Exception("O telefone deve conter exatamente 11 caracteres", 1);
            
        }
     $this->telefone = $telefone;
    }

    public function getEmail(){
        return $this-> email;
    }
    public function setEmail($email){
         $this->email = $email;
    }
    public function getPessoa(){
        return $this-> pessoa;
    }
    public function setPessoa($pessoa){
         $this->pessoa = $pessoa;
    }
    public function getInformeonumero(){
        return $this-> informeonumero;
    }
    public function setInformeonumero($informeonumero){
         $this->informeonumero = $informeonumero;
    }
    public function getRua(){
        return $this-> rua;
    }
    public function setRua($rua){
         $this->rua = $rua;
    }
    public function getNumero(){
        return $this-> numero;
    }
    public function setNumero($numero){
         $this->numero = $numero;
    }
    public function getBairro(){
        return $this-> bairro;
    }
    public function setBairro($bairro){
         $this->bairro = $bairro;
    }
    public function getCep(){
        return $this-> cep;
    }
    public function setCep($cep){
         $this->cep = $cep;
    }
    public function getCidade(){
        return $this-> cidade;
    }
    public function setCidade($cidade){
         $this->cidade= $cidade;
    }
    public function getEstado(){
        return $this-> estado;
    }
    public function setEstado($Estado){
         $this->estado = $estado;
    }

}

?>