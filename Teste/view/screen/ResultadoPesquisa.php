<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="..\css\Listagem.css">
</head>
<body>
    <div class="principal">
    <?php 

    Session_start();
    $_SESSION["palavra_chave"] = $_POST["palavra_chave"];
    include "BarraMenu.html"; 

   include "..\..\model\Pesquisar.php";

    if(!empty($_SESSION["resultadoPesquisa"]) && $_SESSION["resultadoPesquisa"] != "Nada encontrado"){
        $resultado = $_SESSION["resultadoPesquisa"];
            foreach ($resultado->ingredients as $Ingrediente) { ?>
            
            <br>
            <div class="card">
            <div class="card-body">
                <h5 class="card-title"> <?= $Ingrediente->strIngredient ?> </h5>
                <p class="card-text"> <?= $Ingrediente->strDescription ?> </p>
            </div>
            </div>
  
          
           <?php 
           } 
           }else{
               ?>
            <br>
            <div class="card">
            <div class="card-body">
                <h5 class="card-title"> Nada Encontrado </h5>
                <p class="card-text"></p>
            </div>
            </div>
            <?php
        }
          ?>
           
           <h1>Bebidas que contém o ingrediente <?= $Ingrediente->strIngredient ?> </h1>
           
            <?php
    if(!empty($_SESSION["resultadoDrinks"]) && $_SESSION["resultadoDrinks"] != "Nada encontrado"){
        $resultado = $_SESSION["resultadoDrinks"];
            foreach ($resultadoDrinks->drinks as $Resultados) { ?>

        <div class="card" style="width: 18rem; display: inline-table;">
            <img src= <?= $Resultados->strDrinkThumb ?> class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"> <?= $Resultados->strDrink ?> </h5>
        </div>
        </div>

	<?php 
    } 
           }else{
               echo $_SESSION["resultadoDrinks"];
           }
    ?>
            
            </div>
</body>
</html>