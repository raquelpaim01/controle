<?php

   $servidor  = 'localhost';
   $porta = '5432';
   $usuario = 'postgres';
   $senha = 'raquel';
   $banco = 'controle';
   $conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");

   if (isset($_GET['acao']) && $_GET['acao'] === "delete") {
    $res = pg_query($conexao,"delete from entrada where id = ".$_GET['id']);
    
    if(!$res){
        echo '<p>'.pg_last_error($conexao).'</p>';
        die( '<a href="consulta_nota.php">Retornar para listagem</a>');
        
    } else {
      header('location: consulta_nota.php');
       
    }
}

 if(isset($_POST["consultar"])){
    header("location:consulta_nota.php");



 
} else  if(isset($_POST["cadastrar"])){

   function validarData($date, $format = 'd-m-Y') {

    $d = DateTime::createFromFormat($format, $date);

    if ($d && $d->format($format) != $date) {
        die("a data deve estar no formato dd-mm-aaaa");
    }

    return $d->format('Y-m-d');
}

   $nome = $_POST["fornecedor"];

   $nfe = $_POST["nfe"];
   $verifica = is_numeric($nfe);
   if($verifica==false){
       die("O número da nota fiscal é composto de números inteiros");
   }


   $cfop = $_POST["cfop"];
   $verifica1 = is_numeric($cfop);
   if($verifica1==false){
       die("O número do cfop é composto de números inteiros");
   }
   

   $data = $_POST["data"];
   
  $date = validarData($data);
   $sql = "INSERT INTO ENTRADA (data,numero_nota,cfop,fornecedor_id)VALUES(";
   $sql .= "'$data',";
    $sql  .="'$nfe',";
    $sql .="'$cfop',";
    $sql .= "'$nome'";

   $sql .= ")";
}
   $result = pg_query($conexao,$sql);
    if(!$result){
        echo '<p>'.pg_last_error($conexao).'</p>';
        die( '<a href="entrada_mercadoria.php">Retornar para listagem</a>');
    }

header("location:quantidade_valor.php");

?>
