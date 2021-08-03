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
<form method = "POST" action ="consulta_nota.php">
        <div class = estilo>
<tr>
        
    <td><b></br>  CONSULTA </td>
    <td></br>
    <select required="required" name="pessoa">
    <option value="nome">Fornecedor</option>
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
<td>cfop</td>
<td>nome do fornecedor</td>


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
             $sql="SELECT e.id, e.data,e.numero_nota, e.cfop, f.razao_social FROM entrada e join fornecedor f on f.id = e.fornecedor_id where razao_social ilike $1 order by f.razao_social  ";
             $result = pg_query_params($conexao,$sql,array("%".pg_escape_string($_POST['informe'])."%"));
             while ($tbl = pg_fetch_array($result)){
                    echo "<td> ".$tbl['id']. "</td>";
                    echo "<td> ".$tbl['data']. "</td>";
                    echo "<td> ".$tbl['numero_nota']. "</td>";
                    echo "<td> ".$tbl['cfop']. "</td>";
                    echo "<td> ".$tbl['razao_social']. "<br></td>";
                    echo "<td><A href=\"edicao_nota.php?acao=update&id=".$tbl['id']."\">";
                    echo "(Editar)</A></td>";
                    echo "<td><A href=\"dados_entrada.php?acao=delete&id=".$tbl['id']."\">";
                   echo "(Excluir)</A></td>";
                    echo "</tr>";
             }
        
     } else if($pessoa =='nota'){
            $sql="SELECT e.id, e.data, e.numero_nota, e.cfop, f.razao_social FROM entrada e join fornecedor f on f.id = e.fornecedor_id where numero_nota = $1 order by f.razao_social";
            $result = pg_query_params($conexao,$sql,array(pg_escape_string($_POST['informe'])));
            while ($tbl = pg_fetch_array($result)){
           echo "<td> ".$tbl['id']. "</td>";
           echo "<td> ".$tbl['data']. "</td>";
           echo "<td> ".$tbl['numero_nota']. "</td>";
           echo "<td> ".$tbl['cfop']. "</td>";
           echo "<td> ".$tbl['razao_social']. "<br></td>";
           
          
           echo "<td><A href=\"edicao_nota.php?acao=update&id=".$tbl['id']."\">";
           echo "(Editar)</A></td>";
           echo "<td><A href=\"dados_entrada.php?acao=delete&id=".$tbl['id']."\">";
          echo "(Excluir)</A></td>";
           echo "</tr>";
            }

}
        
    
        pg_close($conexao);

        die( '<a href="entrada_mercadoria.php">Retornar para nota fiscal </a>');

?>
</form>
</center>
</body>
</html>