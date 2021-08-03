<!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title> CONSULTA ENTRADA </title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body class = "bgcolor imagem">

    <meta = charset="utf-8"/>

        <center>
<form method = "POST" action ="consulta_quantidade_valor.php?">
        <div class = estilo>
<tr>
        
    <td><b></br>  CONSULTA </td>
    <td></br>
    <select required="required" name="entrada">
    <option value="nome">Nome do fornecedor</option>
    <option value="nota">Número da nota</option>
    <option value="produto">Nome do produto</option>

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
<td>número da nota</td>
<td>fornecedor</td>
<td>produto</td>
<td>quantidade</td>
<td>valor unitario</td>
<td>valor total</td>
</tr>



<?php
$servidor  = 'localhost';
$porta = '5432';
$usuario = 'postgres';
$senha = 'raquel';
$banco = 'controle';
$conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");
    
   $entrada = $_POST["entrada"];
   $informe = $_POST['informe'];
  
        
         if ($entrada=='nome'){
             $sql="SELECT e.numero_nota, f.razao_social,p.nome, qe.quantidade, qe.valor_unitario, sum (qe.quantidade * qe.valor_unitario) as total
             from fornecedor f join entrada e on f.id = e.fornecedor_id
             join quantidade_entrada qe on qe.entrada_id = e.id
             join produto p on p.id = qe.produto_id where razao_social ilike $1 group by e.numero_nota, f.razao_social, p.nome, qe.quantidade,qe.valor_unitario order by razao_social ";
             $result = pg_query_params($conexao,$sql,array("%".pg_escape_string($_POST['informe'])."%"));
             while ($tbl = pg_fetch_array($result)){
                    echo "<td> ".$tbl['numero_nota']. "</td>";
                    echo "<td> ".$tbl['razao_social']. "</td>";
                    echo "<td> ".$tbl['nome']. "</td>";
                    echo "<td> ".$tbl['quantidade']. "</td>";
                    echo "<td> ".$tbl['valor_unitario']. "</td>";
                    echo "<td> ".$tbl['total']. "</td>";

                    echo "</tr>";
                
             }      

                        
                         
              
         }else if($entrada =='nota'){
        $sql="SELECT e.numero_nota, f.razao_social,p.nome, qe.quantidade, qe.valor_unitario, sum(qe.quantidade * qe.valor_unitario) as total
        from fornecedor f join entrada e on f.id = e.fornecedor_id
        join quantidade_entrada qe on qe.entrada_id = e.id
        join produto p on p.id = qe.produto_id  where numero_nota = $1 group by e.numero_nota, f.razao_social,
                p.nome, qe.quantidade, qe.valor_unitario order by e.numero_nota";
        $result = pg_query_params($conexao,$sql,array(pg_escape_string($_POST['informe'])));
        while ($tbl = pg_fetch_array($result)){
            echo "<td> ".$tbl['numero_nota']. "</td>";
            echo "<td> ".$tbl['razao_social']. "</td>";
            echo "<td> ".$tbl['nome']. "</td>";
            echo "<td> ".$tbl['quantidade']. "</td>";
            echo "<td> ".$tbl['valor_unitario']. "</td>";
            echo "<td> ".$tbl['total']. "</td>";

        }

        } if ($entrada=='produto'){
                $sql="SELECT e.numero_nota, f.razao_social,p.nome, qe.quantidade, qe.valor_unitario, sum(qe.quantidade * qe.valor_unitario) as total
                from fornecedor f join entrada e on f.id = e.fornecedor_id
                join quantidade_entrada qe on qe.entrada_id = e.id
                join produto p on p.id = qe.produto_id where nome ilike $1 group by e.numero_nota, f.razao_social,
                p.nome, qe.quantidade, qe.valor_unitario order by p.nome";
                $result = pg_query_params($conexao,$sql,array("%".pg_escape_string($_POST['informe'])."%"));
                while ($tbl = pg_fetch_array($result)){
                       echo "<td> ".$tbl['numero_nota']. "</td>";
                       echo "<td> ".$tbl['razao_social']. "</td>";
                       echo "<td> ".$tbl['nome']. "</td>";
                       echo "<td> ".$tbl['quantidade']. "</td>";
                       echo "<td> ".$tbl['valor_unitario']. "</td>";
                       echo "<td> ".$tbl['total']. "</td>";

                       echo "</tr>";
                   
                } 


}
        
    
        pg_close($conexao);

        die( '<a href="quantidade_valor.php">Retornar cadastro de produtos</a>');

?>
</form>
</center>
</body>
</html>