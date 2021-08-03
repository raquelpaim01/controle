<?php

$servidor  = 'localhost';
$porta = '5432';
$usuario = 'postgres';
$senha = 'raquel';
$banco = 'controle';
$conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");

$id = $_GET['id'];

$resultado = pg_query("select * from vw_cliente where id = $id");


$pes = pg_fetch_array($resultado);



?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title> Edição Cliente </title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body class = "bgcolor imagem">
    <div class= imagem>
 
    <div class=quadrinhoarredondadoexemplo>
        <a href="http://localhost/estoque/entrada_mercadoria.php"><b> Mercadorias &nbsp; </a>
        <a href="http://localhost/estoque/saida_mercadoria.php"><b> Vendas &nbsp; </a>
        <a href="http://localhost/estoque/cliente.php"><b> Cliente &nbsp; </a>
    </div>

    
     

          <div class= imagem>
   <div class= estilo>   
       <form method="POST" action="edicao2_cliente.php?acao=update">
       <input type="hidden" value="<?=$pes['id']?>" name="id">
        <center>
                <br> <td>CLIENTE</td><br><br>
         <table>
            
            <tr>
                <td><b></br> Nome completo:</td>
                <td>
                </br> <input type="text" required="required" value="<?=$pes['razao_social']?>"  name="nomecompleto" />
                </td>
                </tr>
                    
                    
                <tr>
                    <td><b></br>  Telefone:</td>
                    <td>
                    </br><input type="text" required="required" value="<?=$pes['telefone']?>"   name="telefone"  pattern="[0-9]+$"></br>
                    </td>
                </tr>
                    <tr>
                        <td><b></br>E-mail:</td>
                        <td>
                        </br><input type="email"  class="input-text" required="required" value="<?=$pes['email']?>" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
                        </td>
                    </tr>
                <tr>
                        <td><b></br>  Pessoa: </td>
                            <td></br>
                            <select  name="pessoa">
                            <option value="fisica" >Física</option>
                            <option value="juridica">Jurídica</option>
                            <label>Infome o número:</label>
                            <input type="text" maxlength ="14" minlength = "9"  name="informeonumero" 
                            pattern="^[0-9]{11}$|^[0-9]{14}$" ></br>
                            </td>
                </tr>
                 <tr>
                        <td><b></br>Rua:</td>
                        <td>
                        </br><input type="text" maxlength ="50" minlength = "5"  required="required" value="<?=$pes['rua']?>" name="rua" pattern="[a-z\s]+$"/></br>
                        </td>
                </tr>

                 <tr>
                        <td><b></br> Número:</td>
                        <td></br>
                        <input type="text" maxlength ="4" minlength = "1" required="required" value="<?=$pes['numero']?>"  name="numero" pattern="[0-9]+$"/></br>
                        </td>
                </tr>

                <tr>
                    <td><b></br>  Bairro:</td>
                        <td></br>
                        <input type="text" maxlength ="50" minlength = "5" required="required" value="<?=$pes['bairro']?>"   name="bairro" pattern="[a-z\s]+$"/></br>
                        </td>
                        </tr>

                <tr>
                        <td><b></br> CEP:</td>
                        <td></br>
                        <input type="text" maxlength ="8" minlength = "8" required="required" value="<?=$pes['cep']?>"  name="cep" pattern="[0-9]+$"/></br>
                        </td>
                </tr>

                <tr>
                    <td><b></br>  Cidade:</td>
                        <td>
                        </br><input type="text" maxlength ="100" minlength = "5" required="required" value="<?=$pes['cidade']?>"   name="cidade" pattern="[a-z\s]+$"/></br>
                        </td>
                </tr>
                <tr>
                        <td><b></br>  Estado:</td>
                        <td></br>
                        <select name="estado">
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                        </select>
                        </td>
                </tr>   
                 </center>

                 <tr>
                        <td><div align = "left"></br>
                           <input type="submit" value="Cadastrar" name = "cadastrar">
                           </td></div>
       
                       
                      
                   
               </tr>
               
               </br><a href="http://localhost/estoque/consulta_cliente.php"><b> Consulta Cadastro  </a>
    
    </div>
        
    </div>
    </table>
</form>
</div>
</meta>

</body>

</html>

