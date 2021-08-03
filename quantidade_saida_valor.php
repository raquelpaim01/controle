<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title> Entrada de Mercadorias </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body class = "bgcolor imagem">

        <meta = charset="utf-8"/>

        <div class=quadrinhoarredondadoexemplo>
            <a href="http://localhost/estoque/saida_mercadoria.php"><b> Vendas &nbsp;  </a>
            <a href="http://localhost/estoque/fornecedor.php"><b> Fornecedor &nbsp; </a>
            <a href="http://localhost/estoque/cliente.php"><b> Cliente &nbsp;  </a>
            <a href="http://localhost/estoque/cadastro_mercadoria.php"><b> Cadastro de Produto &nbsp;  </a>
            <a href="http://localhost/estoque/entrada_mercadoria.php"><b> Mercadorias &nbsp; </a>
            <a href="http://localhost/estoque/quantidade_saida.php"><b> Saída de mercadorias &nbsp; </a>


        </div>






    </style>
    <div class = imagem>
        <div class = estilo>
            <form action="dados_saida.php" method="POST">

                <center>
                    <br> <td>SAÍDA</td><br><br>
                    <table>

                        <tr>
                            <td>NFE:</td>
                            <td>
                                <select name="nfe">
                                    <?php
                                    $servidor = 'localhost';
                                    $porta = '5432';
                                    $usuario = 'postgres';
                                    $senha = 'raquel';
                                    $banco = 'controle';
                                    $conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");

                                    $nfe = pg_query($conexao, "select id, numero_nota from venda order by 2");

                                    while ($f = pg_fetch_array($nfe)) {
                                        echo "<option value='" . $f['id'] . "'>" . $f['nota_fiscal'] . "</option>";
                                    }
                                    ?>

                                </select>


                                </br>


                            </td>
                        </tr>



                        <tr>
                            <td> QUANTIDADE:</td>
                            <td>
                                <input type="text" maxlength ="4" minlength = ""  name="quantidade" pattern="[0-9]+$"/></br>
                            </td>
                        </tr>

                        <tr>
                            <td> VALOR UNITÁRIO:</td>
                            <td>
                                <input type="text" maxlength ="15"    name="valorUnitario" pattern="([0-9]{1,3}\.)?[0-9]{1,3}.[0-9]{2}$"/></br>
                            </td>
                        </tr>

                        <tr>
                            <td>PRODUTO:</td>
                            <td>
                                <select name="produto">
<?php
$servidor = 'localhost';
$porta = '5432';
$usuario = 'postgres';
$senha = 'raquel';
$banco = 'controle';
$conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");

$produtos = pg_query($conexao, "select id, nome from produto order by 2");

while ($f = pg_fetch_array($produtos)) {
    echo "<option value='" . $f['id'] . "'>" . $f['nome'] . "</option>";
}
?>

                                </select>


                                </br>


                            </td>
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
</body><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

