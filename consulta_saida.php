<!DOCTYPE html>
<html>
<head>
        <title> CONSULTA SAIDA</title>
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
<form method = "POST" action ="consulta_saida.php">
        <div class = estilo>
<tr>
        
    <td><b></br>  CONSULTA </td>
    <td></br>
    <select required="required" name="pessoa">
    <option value="nome">cliente</option>
    <option value="nota">Nota</option>
    
    <label>Infome o número:</label>
    <input type="text"   name="informe"> <br>

    <td><div align = "center"></br>
        <input type="submit" value="Consultar">
        </td></div>
    </td>
    </tr>
    <body bgcolor= #E6E6FA> </body>
                </div>   
<table border = 1>
<td>id</td>
<td>data</td>
<td>numero da nota</td>
<td>nome do cliente</td>


</tr>



<?php
$servidor  = 'localhost';
$porta = '5432';
$usuario = 'postgres';
$senha = 'raquel';
$banco = 'controle';
$conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");
    
   $pessoa = $_POST["pessoa"];
   $informe = $_POST["informe"];

   if ($pessoa=='nome'){
    $sql="SELECT s.id,s.data, s.nota_fiscal, c.razao_social FROM venda s join cliente c  on c.id = s.cliente_id where razao_social ilike $1 order by c.razao_social  ";
    $result = pg_query_params($conexao,$sql,array("%".pg_escape_string($_POST['informe'])."%"));
    while ($tbl = pg_fetch_array($result)){
           echo "<td> ".$tbl['id']. "</td>";
           echo "<td> ".$tbl['data']. "</td>";
           echo "<td> ".$tbl['nota_fiscal']. "</td>";
           echo "<td> ".$tbl['razao_social']. "<br></td>";
           echo "<td><A href=\"edicao_saida.php?acao=update&id=".$tbl['id']."\">";
           echo "(Editar)</A></td>";
           echo "<td><A href=\"dados_saida.php?acao=delete&id=".$tbl['id']."\">";
          echo "(Excluir)</A></td>";
           echo "</tr>";
    }

} else if($pessoa =='nota'){
   $sql="SELECT s.id,s.data, s.nota_fiscal, c.razao_social FROM venda s join cliente c f on c.id = s.cliente_id where nota_fiscal = $1 order by f.razao_social";
   $result = pg_query_params($conexao,$sql,array(pg_escape_string($_POST['informe'])));
   while ($tbl = pg_fetch_array($result)){
  echo "<td> ".$tbl['id']. "</td>";
  echo "<td> ".$tbl['data']. "</td>";
  echo "<td> ".$tbl['nota_fiscal']. "</td>";

  echo "<td> ".$tbl['razao_social']. "<br></td>";
  
 
  echo "<td><A href=\"edicao_saida.php?acao=update&id=".$tbl['id']."\">";
  echo "(Editar)</A></td>";
  echo "<td><A href=\"dados_entrada.php?acao=delete&id=".$tbl['id']."\">";
 echo "(Excluir)</A></td>";
  echo "</tr>";
   }

}


pg_close($conexao);

die( '<a href="saida_mercadoria.php">Retornar para cadastro de nota de venda </a>');

?>
</form>
</center>
</body>
</html>