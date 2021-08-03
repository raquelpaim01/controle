<?php

$servidor  = 'localhost';
$porta = '5432';
$usuario = 'postgres';
$senha = 'raquel';
$banco = 'controle';
$conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");

if (isset($_GET['acao']) && $_GET['acao'] === "delete") {
    $res = pg_query($conexao,"delete from cliente where id = ".$_GET['id']);
    
    if(!$res){
        echo '<p>'.pg_last_error($conexao).'</p>';
        die( '<a href="consulta_cliente.php">Retornar para listagem</a>');
        
    } else {
      header('location: consulta_cliente.php');
       
    }
}

 if(isset($_POST["consultar"])){
    header("location:consulta_cliente.php");



 
} else  if(isset($_POST["cadastrar"])){

   

    $nomecompleto = $_POST["nomecompleto"];
    strlen($nomecompleto);
    $vnome = is_numeric($nomecompleto);
     if(strlen($nomecompleto)<5 || strlen($nomecompleto)>100 || $vnome == true){
            die("O nome deve conter no mínimo 5 e no máximo 100 caracteres!<br>");
        }
     
        $converte = ucwords($nomecompleto); /*deixa a primeira letra de cada string maiuscula*/
    
    $telefone = $_POST["telefone"];
        strlen($telefone);
        $verifica = is_numeric($telefone);
            if(strlen($telefone)!=11 || $verifica == false){
                die ("O telefone deve conter exatamente 11 números.<br>");
            }
    
    $email = $_POST["email"];
        if(strlen($email)>30 ||strlen($email)<5 || strstr($email,'@')==false){
        die ("Por gentileza, digite corretamente o email.<br>");
        }
    
    $pessoa = $_POST["pessoa"];
    $informeonumero = $_POST["informeonumero"];
    $vinforme = is_numeric($informeonumero);
    if($pessoa === 'fisica' ){
         strlen($informeonumero);
         if(strlen($informeonumero)!=11 ||$vinforme == false ){
             die ("O cpf deve conter 11 números");
         }
    }else if($pessoa === 'juridica' ){
        strlen($informeonumero);
        if(strlen($informeonumero)!=14 || $vinforme == false){
            die ("O cnpj deve conter 14 números");
        }
    }
    
    
    $rua = $_POST["rua"];
        strlen($rua);
        
            if(strlen($rua)<5 ||strlen($rua)>50){
                die( "O nome da rua deve conter no mínimo 5 e no máximo 50 caracteres.<br>");
            }
            $converter = ucwords($rua);
    
    $numero = $_POST["numero"];
        strlen($numero);
            if(strlen($numero)<1 ||strlen($numero)>4){
                die( "O numero da casa deve conter no mínimo 1 e no máximo 4 números.<br>");
            }
    
    $bairro = $_POST["bairro"];
        strlen($bairro);
        $vbairro = is_string($bairro);
            if(strlen($bairro)<5 ||strlen($bairro)>50 ||$vbairro == false ){
                die ("O nome deve conter no mínimo 5 e no máximo 50 caracteres.<br>");
            }
            $converteb = ucwords($bairro);
    $cep = $_POST["cep"];
        strlen($cep);
            if(strlen($cep)!=8){
                die( "O cep deve conter 8 caracteres.<br>");
        }
    
    $cidade = $_POST["cidade"];
        strlen($cidade);
        $vcidade = is_string($cidade);
            if(strlen($cidade)<5 ||strlen($cidade)>100 || $vcidade == false){
                die( "O nome deve conter no mínimo 5 e no máximo 100 caracteres.<br>");
            }
            $convertec = ucwords($cidade);
    $estado = $_POST["estado"];
       
if( $pessoa === 'fisica'){
    $sql = "INSERT INTO CLIENTE (razao_social,email,cpf, telefone, rua, numero, bairro, cep, cidade, estado)VALUES(";
    $sql .= "'$converte',";
    $sql  .="'$email',";
    $sql .="'$informeonumero',";
    $sql .= "'$telefone',";
    $sql .= "'$rua',";
    $sql .= "'$numero',";
    $sql .= "'$bairro',";
    $sql .= "'$cep',";
    $sql .= "'$cidade',";
    $sql .= "'$estado'";
    $sql .= ")";
}else if ($pessoa === 'juridica'){
    echo "passei por aqui";
    $sql = "INSERT INTO CLIENTE ( razao_social,email,telefone,cnpj, rua, numero, bairro, cep, cidade, estado)VALUES(";
    
    $sql .= "'$converte',";
    $sql .="'$email',";
    $sql .= "'$telefone',";
    $sql.="'$informeonumero',";
    $sql .= "'$rua',";
    $sql .= "'$numero',";
    $sql .= "'$bairro',";
    $sql .= "'$cep',";
    $sql .= "'$cidade',";
    $sql .= "'$estado'";
    $sql .= ")";
}
}
       



$result = pg_query($conexao,$sql);
    if(!$result){
        echo '<p>'.pg_last_error($conexao).'</p>';
        die( '<a href="cliente.php">Retornar para listagem</a>');
    }

header("location:cliente.php");

?>
