
<!DOCTYPE html>

<html>
<head>
    <title>Nota fiscal</title>
</head>

<body>
    
    <meta = charset="utf-8"/>

        <div class=quadrinhoarredondadoexemplo>
                <a href="http://localhost/estoque/saida_mercadoria.php"><b> Vendas &nbsp;  </a>
                <a href="http://localhost/estoque/fornecedor.html"><b> Fornecedor &nbsp; </a>
                <a href="http://localhost/estoque/cliente.html"><b> Cliente &nbsp;  </a>
                <a href="http://localhost/estoque/cadastro_mercadoria.php"><b> Cadastro de Produto &nbsp;  </a>
                <a href="http://localhost/estoque/quantidade_valor.php"><b> Entrada de mercadoria &nbsp;  </a>



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
            <form action="dados_entrada.php" method="POST">
                
                <center>
                       <br> <td>Nota Fiscal</td><br><br>
                    <table>
                        
                    <tr>
                            <td>FORNECEDOR:</td>
                            <td>
                                <select name="fornecedor">
                                        <?php

                                            $servidor  = 'localhost';
                                            $porta = '5432';
                                            $usuario = 'postgres';
                                            $senha = 'raquel';
                                            $banco = 'controle';
                                            $conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");

                                            $fornecedores = pg_query($conexao,"select id, razao_social from fornecedor order by 2");

                                            while ($f = pg_fetch_array($fornecedores)) {
                                                echo "<option value='".$f['id']."'>".$f['razao_social']."</option>";
                                            }

                                        ?>

                                </select>
                                
                                
                            </br>
                                
                              
                            </td>
                    </tr>

                    <tr>
                            <td> NFE:</td>
                            <td>
                                <input type="text"    name="nfe" pattern="[0-9]+$"/></br>
                             </td>
                     </tr>

                    <tr>
                            <td> CFOP:</td>
                            <td>
                                <input type="text"   name="cfop" pattern="[0-9]+$"/></br>
                             </td>
                    </tr>

                    <tr>
                            <td> DATA:</td>
                            <td>
                                <input type="text"    name="data" /></br>
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