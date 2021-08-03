<?php


  $servidor  = 'localhost';
   $porta = '5432';
   $usuario = 'postgres';
   $senha = 'raquel';
   $banco = 'controle';
   $conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");

   $sql2= "UPDATE produto  set quantidade_disponivel = qe.quantidade + qe.quantidade
   from quantidade_entrada qe join produto p on p.id = qe.produto_id";
   $sql3= "  UPDATE produto  set valor_venda  = (qe.valor_unitario +qe.valor_unitario)
   from quantidade_entrada qe join produto p on p.id = qe.produto_id
   where p.id = qe.produto_id;

header("location::dados_produto.php");


   ?>