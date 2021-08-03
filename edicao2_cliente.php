
<?php
$servidor  = 'localhost';
$porta = '5432';
$usuario = 'postgres';
$senha = 'raquel';
$banco = 'controle';
$conexao = pg_connect("host=$servidor port=$porta dbname=$banco user=$usuario password=$senha");

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

if (($_GET['acao'] === "update")&& $pessoa == 'fisica'){
    $sql = sprintf ("update cliente set razao_social = '%s', email =  '%s', cpf = '%d',  telefone = '%d', rua = '%s', numero = '%d', bairro = '%s', cep = '%d', cidade = '%s', estado = '%s'
    
    where id = %d ",$converte,$email,$informeonumero,$telefone,$converter,$numero,$converteb,$cep,$convertec,$estado, $_POST['id']) ;
    
     pg_query($conexao,$sql);

} 
if (($_GET['acao'] === "update")&& $pessoa == 'juridica'){
    $sql = sprintf ("update cliente set razao_social = '%s', email =  '%s', cnpj = '%d',  telefone = '%d', rua = '%s', numero = '%d', bairro = '%s', cep = '%d', cidade = '%s', estado = '%s'
    
    where id = %d ",$converte,$email,$informeonumero,$telefone,$converter,$numero,$converteb,$cep,$convertec,$estado, $_POST['id']) ;
    
     pg_query($conexao,$sql);

} 
     echo $sql;

$result = pg_query($conexao,$sql);
    if(!$result){
        echo '<p>'.pg_last_error($conexao).'</p>';
        die( '<a href="cliente.php">Retornar </a>');
    }

header("location:cliente.php");
?>