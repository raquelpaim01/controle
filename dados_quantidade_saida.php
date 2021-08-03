<?php


  $servidor  = 'localhost';
   $porta = '5432';
   $usuario = 'postgres';
   $senha = 'raquel';
   $banco = 'controle';
   $conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");
   $produto = $_GET['produto_id'];
   $entrada = $_GET['entrada_id'];

   if (isset($_GET['acao']) && $_GET['acao'] === "delete") {
    $res = pg_query($conexao,"delete from quantidade_saida qs using produto p, saida s
    where qs.produto_id =  $produto and qs.entrada_id = $saida"
      );
	
   
    if(!$res){
        echo '<p>'.pg_last_error($conexao).'</p>';
        die( '<a href="quantidade_saida_valor.php">Saída de mercadorias</a>');
      
    } else {
      header('location: quantidade_saida_valor.php');

       
    }
}
    if(isset($_POST["consultar"])){
        header("location:consulta_quantidade_valor.php");
    
      } else  if(isset($_POST["cadastrar"])){

          $nfe = $_POST["nfe"];

          $quantidade = $_POST["quantidade"];
          $verifica = is_numeric($quantidade);

            if($verifica == false){
                die("A quantidade é obrigatoriamente um número inteiro!");
            }

          $valorUnitario = $_POST["valorUnitario"];
          $produto = $_POST["produto"];


          function formatoReal($valor) {
            $valor = (string)$valor;
            $regra = "/^[0-9]{1,3}([.]([0-9]{3}))*[,]([.]{0})[0-9]{0,2}$/";
            if(preg_match($regra,$valor)) {
                return true;
            } else {
                return false;
            }
        }
          $vu = formatoReal($valorUnitario);
            if($vu == false){
                die("O valor deve estar no formato como do exemplo: 00,00");
            }else{

            


          $sql = "INSERT INTO QUANTIDADE_SAIDA (produto_id,venda_id,quantidade,valor_unitario)VALUES(";
          $sql .= "'$produto',";
          $sql .= "'$nfe',";
          $sql .= "'$quantidade',";
          $sql  .="'$valorUnitario'";
          $sql .= ")";

          
     }
    }
     echo $sql;
     $result = pg_query($conexao,$sql);
      if(!$result){
          echo '<p>'.pg_last_error($conexao).'</p>';
          die( '<a href="quantidade_saida.php">Retornar para o cadastro de saída</a>');
      }
  
      header("location:quantidade_saida.php");
?>  