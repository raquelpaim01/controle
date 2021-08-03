
<?php
$servidor  = 'localhost';
$porta = '5432';
$usuario = 'postgres';
$senha = 'raquel';
$banco = 'controle';
$conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");


 $nome = $_POST["nome"];
 strlen($nome);
 if(strlen($nome)<5 || strlen($nome)>100){
   die(" o nome deve conter no mínimo 5 e no máximo 100 caracteres!");
 }
 $descricao = $_POST["descricao"];
 strlen($descricao);
 if(strlen($descricao)<5 || strlen($descricao)>100){
  die(" A descrição  deve conter no mínimo 5 e no máximo 100 caracteres!");
}

if (($_GET['acao'] === "update")){
    $sql = sprintf ("update produto set nome = '%s', descricao =   '%s'
    
    where id = %d ",$nome,$descricao, $_POST['id']) ;
    
     pg_query($conexao,$sql);
} 
     echo $sql;

$result = pg_query($conexao,$sql);
    if(!$result){
        echo '<p>'.pg_last_error($conexao).'</p>';
        die( '<a href="consulta_produtos.php">Retornar </a>');
    }

header("location:cadastro_mercadoria.php");
?>