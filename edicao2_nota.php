<?php
$servidor  = 'localhost';
$porta = '5432';
$usuario = 'postgres';
$senha = 'raquel';
$banco = 'controle';
$conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");

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
   if($nfe != $verifica){
       die("O número da nota fiscal é composto de números inteiros");
   }


   $cfop = $_POST["cfop"];
   $verifica1 = is_numeric($cfop);
   if($cfop != $verifica1){
       die("O número do cfop é composto de números inteiros");
   }
   

   $data = $_POST["data"];
   
  $date = validarData($data);
   
  if (($_GET['acao'] === "update")){
    $sql = sprintf ("update entrada set data = '%s', numero_nota =   '%d', cfop = %d, fornecedor_id = %d
    
    where id = %d ",$data,$nfe,$cfop,$nome, $_POST['id']) ;
    
     pg_query($conexao,$sql);
} 
     echo $sql;

$result = pg_query($conexao,$sql);
    if(!$result){
        echo '<p>'.pg_last_error($conexao).'</p>';
        die( '<a href="entrada_mercadoria.php">Retornar </a>');
    }

header("location:entrada_mercadoria.php");
?>