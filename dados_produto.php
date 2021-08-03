<?php


  $servidor  = 'localhost';
   $porta = '5432';
   $usuario = 'postgres';
   $senha = 'raquel';
   $banco = 'controle';
   $conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");

   if (isset($_GET['acao']) && $_GET['acao'] === "delete") {
    $res = pg_query($conexao,"delete from produto where id = ".$_GET['id']);
   
    if(!$res){
        echo '<p>'.pg_last_error($conexao).'</p>';
        die( '<a href="consulta_mercadoria.php">Cadastro Mercadoria</a>');
      
    } else {
      header('location: consulta_produtos.php');
       
    }
  }

    if(isset($_POST["consultar"])){
        header("location:consulta_produtos.php");
    
      } else  if(isset($_POST["cadastrar"])){
          
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

     $sql = "INSERT INTO PRODUTO (nome,descricao)VALUES(";
     $sql .= "'$nome',";
     $sql  .="'$descricao'";
     $sql .= ")";
      header("location:: atualizacao_produtos.php");
   
   }
  
  echo $sql;
   $result = pg_query($conexao,$sql);
    if(!$result){
        echo '<p>'.pg_last_error($conexao).'</p>';
        die( '<a href="cadastro_mercadoria.php">Retornar para listagem</a>');
    }

    header("location:cadastro_mercadoria.php");

?>