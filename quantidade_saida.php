
<!DOCTYPE html>

<html>
<head>
    <title>Entrada de mercadorias </title>
</head>

<body>
    
    <meta = charset="utf-8"/>

        <div class=quadrinhoarredondadoexemplo>
                <a href="http://localhost/estoque/saida_mercadoria.php"><b> Vendas &nbsp;  </a>
                <a href="http://localhost/estoque/fornecedor.html"><b> Fornecedor &nbsp; </a>
                <a href="http://localhost/estoque/cliente.html"><b> Cliente &nbsp;  </a>
                <a href="http://localhost/estoque/cadastro_mercadoria.php"><b> Cadastro de Produto &nbsp;  </a>
                <a href="http://localhost/estoque/entrada_mercadoria.php"><b> Mercadorias &nbsp; </a>

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
            <form action="dados_quantidade_saida.php" method="POST">
                
                <center>
                       <br> <td>SAÍDA</td><br><br>
                    <table>
                        
                    <tr>
                            <td>NFE:</td>
                            <td>
                                <select name="nfe">
                                        <?php

                                            $servidor  = 'localhost';
                                            $porta = '5432';
                                            $usuario = 'postgres';
                                            $senha = 'raquel';
                                            $banco = 'controle';
                                            $conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");

                                            $nfe = pg_query($conexao,"select id, nota_fiscal from venda order by 2");

                                            while ($f = pg_fetch_array($nfe)) {
                                                echo "<option value='".$f['id']."'>".$f['nota_fiscal']."</option>";
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

                                            $servidor  = 'localhost';
                                            $porta = '5432';
                                            $usuario = 'postgres';
                                            $senha = 'raquel';
                                            $banco = 'controle';
                                            $conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");

                                            $produtos = pg_query($conexao,"select id, nome from produto order by 2");

                                            while ($f = pg_fetch_array($produtos)) {
                                                echo "<option value='".$f['id']."'>".$f['nome']."</option>";
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
</body>