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

$cliente= $_POST["cliente"];

$nfe = $_POST["nfe"];
$verifica = is_numeric($nfe);
if($verifica==false){
   die("O número da nota fiscal é composto de números inteiros");
}


$data = $_POST["data"];

$date = validarData($data);
$sql = "INSERT INTO VENDA (data,nota_fiscal,cliente_id)VALUES(";
$sql .= "'$data',";
$sql  .="'$nfe',";
$sql .= "'$cliente'";

$sql .= ")";







$result = pg_query($conexao,$sql);
if(!$result){
echo '<p>'.pg_last_error($conexao).'</p>';
die( '<a href="saida_mercadoria.php">Retornar para listagem</a>');
}

header("saida_mercadoria.php");

?>