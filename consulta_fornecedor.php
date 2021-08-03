<!DOCTYPE html>
<html>
<head>
        <title> Fornecedores Cadastrados </title>
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
<form method = "POST" action ="consulta_fornecedor.php">
        <div class = estilo>
<tr>
        
    <td><b></br>  CONSULTA </td>
    <td></br>
    <select required="required" name="pessoa">
    <option value="nome">Nome</option>
    <option value="cpf">CPF</option>
    <option value="cnpj">CNPJ</option>
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
<td>nome</td>
<td>email</td>
<td>cpf</td>
<td>cnpj</td>
<td>telefone</td>
<td>rua</td>
<td>numero</td>
<td>bairro</td>
<td>bairro</td>
<td>cep</td>
<td>cidade</td>
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
               
         
             $sql="SELECT * from vw_fornecedor where razao_social ilike $1 order by razao_social";
             $result = pg_query_params($conexao,$sql,array("%".pg_escape_string($_POST['informe'])."%"));
             while ($tbl = pg_fetch_array($result)){
                
                    echo "<td> ".$tbl['id']. "</td>";
                    echo "<td> ".$tbl['razao_social']. "</td>";
                    echo "<td> ".$tbl['email']. "</td>";
                    echo "<td> ".$tbl['cpf']. "</td>";
                    echo "<td> ".$tbl['cnpj']. "</td>";
                    echo "<td> ".$tbl['telefone']. "</td>";
                    echo "<td> ".$tbl['rua']. "</td>";
                    echo "<td> ".$tbl['numero']. "</td>";
                    echo "<td> ".$tbl['bairro']. "</td>";
                    echo "<td> ".$tbl['cep']. "</td>";
                    echo "<td> ".$tbl['cidade']. "</td>";
                    echo "<td> ".$tbl['estado']. "<br></td>";
                    echo "<td><A href=\"edicao_fornecedor.php?acao=update&id=".$tbl['id']."\">";
                    echo "(Editar)</A></td>";
                    echo "<td><A href=\"dados_fornecedor.php?acao=delete&id=".$tbl['id']."\">";
                   echo "(Excluir)</A></td>";
                    echo "</tr>";
                
             }      

                        
                         
              
} else if($pessoa =='cpf'){
        $sql="SELECT * FROM vw_fornecedor where cpf = $1 ";
        $result = pg_query_params($conexao,$sql,array(pg_escape_string($_POST['informe'])));
        while ($tbl = pg_fetch_array($result)){
       echo "<td> ".$tbl['id']. "</td>";
       echo "<td> ".$tbl['razao_social']. "</td>";
       echo "<td> ".$tbl['email']. "</td>";
       echo "<td> ".$tbl['cpf']. "</td>";
       echo "<td> ".$tbl['cnpj']. "</td>";
       echo "<td> ".$tbl['telefone']. "</td>";
       echo "<td> ".$tbl['rua']. "</td>";
       echo "<td> ".$tbl['numero']. "</td>";
       echo "<td> ".$tbl['bairro']. "</td>";
       echo "<td> ".$tbl['cep']. "</td>";
       echo "<td> ".$tbl['cidade']. "</td>";
       echo "<td> ".$tbl['estado']. "<br></td>";
       echo "<td><A href=\"edicao_fornecedor.php?acao=update&id=".$tbl['id']."\">";
       echo "(Editar)</A></td>";
       echo "<td><A href=\"dados_fornecedor.php?acao=delete&id=".$tbl['id']."\">";
       echo "(Excluir)</A></td>";
       echo "</tr>";
        }

}else {
        $sql="SELECT * FROM vw_fornecedor where cnpj = $1";
        $result = pg_query_params($conexao,$sql,array(pg_escape_string($_POST['informe'])));
        while ($tbl = pg_fetch_array($result)){
       echo "<td> ".$tbl['id']. "</td>";
       echo "<td> ".$tbl['razao_social']. "</td>";
       echo "<td> ".$tbl['email']. "</td>";
       echo "<td> ".$tbl['cpf']. "</td>";
       echo "<td> ".$tbl['cnpj']. "</td>";
       echo "<td> ".$tbl['telefone']. "</td>";
       echo "<td> ".$tbl['rua']. "</td>";
       echo "<td> ".$tbl['numero']. "</td>";
       echo "<td> ".$tbl['bairro']. "</td>";
       echo "<td> ".$tbl['cep']. "</td>";
       echo "<td> ".$tbl['cidade']. "</td>";
       echo "<td> ".$tbl['estado']. "<br></td>";
       echo "<td><A href=\"edicao_fornecedor.php?acao=update&id=".$tbl['id']."\">";
       echo "(Editar)</A></td>";
       echo "<td><A href=\"dados_fornecedor.php?acao=delete&id=".$tbl['id']."\">";
       echo "(Excluir)</A></td>";
       echo "</tr>";
        }
}
        
    
        pg_close($conexao);

        die( '<a href="fornecedor.html">Retornar cadastro de fornecedor</a>');

?>
</form>
</center>
</body>
</html>