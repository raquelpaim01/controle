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
                <a href="http://localhost/estoque/entrada_mercadoria.php"><b> Mercadorias &nbsp; </a>
                <a href="http://localhost/estoque/saida_mercadoria.php"><b> Vendas &nbsp;  </a>
                <a href="http://localhost/estoque/fornecedor.php"><b> Fornecedor &nbsp; </a>
                <a href="http://localhost/estoque/cliente.php"><b> Cliente &nbsp;  </a>
        </div>
<form action="dados_produto.php" method="POST">
  <div class = "estilo">
    <center>
    <br> <td>PRODUTO</td><br><br>
    <table>
      <tr>
      <td> Nome:</td>
      <td><input type="text" maxlength ="100" minlength = "5"   name="nome"</br></td>
    </tr>
    <tr>
    <td> Descrição:</td>
    <td>
    <input type="text" maxlength ="100" minlength = "1"   name="descricao" /></br>
    </td>
    </tr>
 </center>
   </div>
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
