<!DOCTYPE html>
<html>
<head>
        <title> CLIENTES CADASTRADOS </title>
        <meta = charset="utf-8"/>
</head>
<body>
<style tyle="text/css">
                div.estilo {
                color :black;
                font-family: 'Times New Roman', Times, serif;
                margin:0 auto;
                width:500px;
                background: #fbfbfb;
                position:relative;
                top:04px;
                border:1px solid #262626;
                    }
                    </style>
        <center>
<form method = "POST" action ="consulta_produtos.php?">
        <div class = estilo>
<tr>
        
    <td><b></br>  CONSULTA </td>
    <td></br>
    <select required="required" name="produto">
    <option value="nome">Nome</option>
    <option value="id">Código</option>
    <label>Infome :</label>
    <input type="text"   name="informe"> <br>

<td><div align = "center"></br>
     <td><div align = "center"></br>
        <input type="submit" value="Consultar">
        </td></div>
    </td>
    </tr>
    <body bgcolor= #E6E6FA> </body>
                </div>   
<table border = 1>
<td>id</td>
<td>nome</td>
<td>descrição</td>
<td>valor para venda</td>
<td>quantidade disponível</td>
</tr>



<?php
$servidor  = 'localhost';
$porta = '5432';
$usuario = 'postgres';
$senha = 'raquel';
$banco = 'controle';
$conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");
    
   $produto = $_POST['produto'];
  
        
         if ($produto=='nome'){
             $sql="SELECT * FROM vw_produto where nome ilike $1 order by nome";
             $result = pg_query_params($conexao,$sql,array("%".pg_escape_string($_POST['informe'])."%"));
             while ($tbl = pg_fetch_array($result)){
                    echo "<td> ".$tbl['id']. "</td>";
                    echo "<td> ".$tbl['nome']. "</td>";
                    echo "<td> ".$tbl['descricao']. "</td>";
                    echo "<td> ".$tbl['valor_venda']. "</td>";
                    echo "<td> ".$tbl['quantidade_disponivel']. "</td>";
                    echo "<td><A href=\"edicao_produtos.php?acao=update&id=".$tbl['id']."\">";
                    echo "(Editar)</A></td>";
                    echo "<td><A href=\"dados_produto.php?acao=delete&id=".$tbl['id']."\">";
                   echo "(Excluir)</A></td>";
                  
                    
                    echo "</tr>";
                
             }      

                        
                         
              
} else if($produto =='id'){
        $sql="SELECT * FROM vw_produto where id = $1 ";
        $result = pg_query_params($conexao,$sql,array(pg_escape_string($_POST['informe'])));
        while ($tbl = pg_fetch_array($result)){
            echo "<td> ".$tbl['id']. "</td>";
            echo "<td> ".$tbl['nome']. "</td>";
            echo "<td> ".$tbl['descricao']. "</td>";
            echo "<td> ".$tbl['valor_venda']. "</td>";
            echo "<td> ".$tbl['quantidade_disponivel']. "</td>";
       echo "<td><A href=\"edicao_produtos.php?acao=update&id=".$tbl['id']."\">";
       echo "(Editar)</A></td>";
       echo "<td><A href=\"dados_produto.php?acao=delete&id=".$tbl['id']."\">";
      echo "(Excluir)</A></td>";
     
       echo "</tr>";
        }


}
        
    
        pg_close($conexao);

        die( '<a href="cadastro_mercadoria.php">Retornar cadastro de produtos</a>');

?>
</form>
</center>
</body>
</html>