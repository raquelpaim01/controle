<?php

$servidor  = 'localhost';
$porta = '5432';
$usuario = 'postgres';
$senha = 'raquel';
$banco = 'controle';
$conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");

$id = $_GET['id'];

$resultado = pg_query("select * from vw_produto where id = $id");


$pes = pg_fetch_array($resultado);



?>


<!DOCTYPE html>
<html>
<head>
        <title>Edição Cadastro Fornecedor </title>
        <meta = charset="utf-8"/>
</head>
<body> 
 
    <div class=quadrinhoarredondadoexemplo>
        <a href="http://localhost/estoque/entrada_mercadoria.html"><b> Mercadorias &nbsp; </a>
        <a href="http://localhost/estoque/saida_mercadoria.html"><b> Vendas &nbsp; </a>
        <a href="http://localhost/estoque/cliente.html"><b> Cliente &nbsp; </a>
    </div>

    
             
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
                top:04px;
                border:1px solid #262626;
                    }
                    </style>

            <style tyle="text/css">
                div.imagem {
                    
                    margin:0 auto;
                    width: 100%;
                    padding-block-end: 50%;
                    position: fixed;
                    background-image: url('imagem/quemsabe.jpg');
                } 
        
                 </style>

          <div class= imagem>
   <div class= estilo>   
       <form method="POST" action="edicao2_produtos.php?acao=update">
       <input type="hidden" value="<?=$pes['id']?>" name="id">
        <center>
                <br> <td>PRODUTO:</td><br><br>
         <table>
            
            <tr>
                <td><b></br> Nome:</td>
                <td>
                </br> <input type="text" required="required" value="<?=$pes['nome']?>"  name="nome" />
                </td>
                </tr>
                    
                 <tr>
                        <td><b></br>Descrição:</td>
                        <td>
                        </br><input type="text" maxlength ="50" minlength = "5"  required="required" value="<?=$pes['descricao']?>" name="descricao"/></br>
                        </td>
                </tr>

                 

                 <tr>
                        <td><div align = "left"></br>
                           <input type="submit" value="Cadastrar" name = "cadastrar">
                           </td></div>
       
                       
                      
                   
               </tr>
               
               </br><a href="http://localhost/estoque/consulta_produtos.php"><b> Consulta Cadastro  </a>
    
    </div>
        
    </div>
    </table>
</form>
</div>
</meta>

</body>

</html>

