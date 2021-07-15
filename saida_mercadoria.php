<!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title> Cadastro de Mercadorias </title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body class = "bgcolor imagem">

    <meta = charset="utf-8"/>

        <div class=quadrinhoarredondadoexemplo>
                <a href="http://localhost/estoque/fornecedor.php"><b> Fornecedor &nbsp; </a>
                <a href="http://localhost/estoque/cliente.php"><b> Cliente &nbsp;  </a>
                <a href="http://localhost/estoque/cadastro_mercadoria.php"><b> Cadastro de Produto &nbsp;  </a>
        </div>

         
          
    <div class = imagem>
    <div class = estilo>
    <form action="dados_saida.php" method="POST">                
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
                                <input type="text"   name="nfe" /></br>
                             </td>
                     </tr>

                    

                    <tr>
                            <td> DATA:</td>
                            <td>
                                <input type="text"   name="data" /></br>
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
        
        </div>
            </table>
            </form>
        </div>

</meta>
</html>
</body>