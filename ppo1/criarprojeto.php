
<?php

error_reporting(E_ALL ^ E_WARNING);
session_start();
require_once('topo/conexao.php');
require_once('classes/projeto.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($conn);
    $projeto = new Projeto($conn);

    $projeto->settitulo_projeto($_POST['titulo_projeto']);
    $projeto->setdescricao_projeto($_POST['descricao_projeto']);
    $projeto->setarquivo_projeto($_POST['arquivo_projeto']);
    $projeto->insert();
  
}


?>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> registre aqui seu projeto</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/registo.css'>
    <script src='main.js'></script>
</head>
<body>
<form action="" method="post" id="criar">
<div id="tittle">
    <input type="text" name="titulo_projeto" placeholder="TITULO">    
</div>
<div id="autor">
<input type="text"  name="nome_autor" placeholder="NOME DO AUTOR">
</div>    
<textarea  name="descricao_projeto" rows="10" cols="70" id="description"></textarea>
<div>
<label for="arquivos">SELECIONE O ARQUIVO</label>
</div>
<div id="pute">
<input name="arquivo_projeto" type="file">
</div>
<div>
<button id="baixar">BAIXAR ARQUIVO</button>
</div>
</form>    
 
</body>
</html>