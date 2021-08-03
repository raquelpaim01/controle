<?php

$servidor  = 'localhost';
$porta = '5432';
$usuario = 'postgres';
$senha = 'raquel';
$banco = 'controle';
$conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");

$id = $_GET['id'];

$resultado = pg_query("select * from venda where id = $id");


$pes = pg_fetch_array($resultado);



?>
<!DOCTYPE html>

<html>
<head>
    <title>Vendas</title>
</head>

<body>
    
    <meta = charset="utf-8"/>

        <div class=quadrinhoarredondadoexemplo>
                <a href="http://localhost/estoque/entrada_mercadoria.php"><b> Mercadorias &nbsp;  </a>
                <a href="http://localhost/estoque/fornecedor.html"><b> Fornecedor &nbsp; </a>
                <a href="http://localhost/estoque/cliente.html"><b> Cliente &nbsp;  </a>
                
                    <a href="http://localhost/estoque/cadastro_mercadoria.php"><b> Cadastro de Produto &nbsp;  </a>
        </div>

         <style tyle="text/css">
            div.imagem {
                
                margin:0 auto;
                width: 100%;
                padding-block-end: 50%;
                position: fixed;
                background-image: url('imagem/quemsabe.jpg');
            } 

             </style>

            <style tyle="text/css">
                 div.quadrinhoarredondadoexemplo {
                 background: #B0C4DE;
                 font-family: 'Times New Roman', Times, serif;
                 border: 1px dashed #bbb;
                 margin-top: 10px;
                 margin-bottom: 10px;
                 padding: 5px;
                 text-align: center;
                 display: block;
                 border-radius: 10px;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
             }
         
             .quadrinhoarredondadoexemplo a{
                 text-decoration: none;
             }
             </style>

   

        <style tyle="text/css">
            div.estilo {
                color :black;
    font-family: 'Times New Roman', Times, serif;
    margin:0 auto;
    width:500px;
    background: #fbfbfb;
    position:relative;
    top:50px;
    border:1px solid #262626;
            }
            </style>
    <div class = imagem>
    <div class = estilo>
    <form method="POST" action="edicao2_saida.php?acao=update">
            <input type="hidden" value="<?=$pes['id']?>" name="id">              
                <center>
                       <br> <td>CADASTRO DE NOTA DE SAÍDA</td><br><br>
                    <table>
                        
                    <tr>
                            <td>cliente:</td>
                            <td>
                                <select name="cliente">
                                        <?php

                                            $servidor  = 'localhost';
                                            $porta = '5432';
                                            $usuario = 'postgres';
                                            $senha = 'raquel';
                                            $banco = 'controle';
                                            $conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");

                                            $clientes = pg_query($conexao,"select id, razao_social from cliente order by 2");

                                            while ($f = pg_fetch_array($clientes)) {
                                                echo "<option value='".$f['id']."'>".$f['razao_social']."</option>";
                                            }

                                        ?>

                                </select>

                    <tr>
                            <td> NFE:</td>
                            <td>
                                <input type="text" value="<?=$pes['nota_fiscal']?>"  name="nfe" /></br>
                             </td>
                     </tr>

                    

                    <tr>
                            <td> DATA:</td>
                            <td>
                                <input type="text"  value="<?=$pes['data']?>" name="data" /></br>
                             </td>
                    </tr>

                   
                    </tr>
                </br>
            </center>
            <tr>
                    <td><div align = "left"></br>
                    <input type="submit" value="Cadastrar" name = "cadastrar">
                </td></div>
               
                <td><div align = "center"></br>
                    <input type="submit" value="Consultar" name = "consultar">
                </td> </div>
               
                
            </tr>
            </br><a href="http://localhost/estoque/saida_mercadoria.php"><b> Consulta Cadastro  </a>
        
        </div>
            </table>
            </form>
        </div>

</meta>
</html>
</body>