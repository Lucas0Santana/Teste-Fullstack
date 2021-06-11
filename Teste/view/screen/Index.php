<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <!-- <link rel="import" href="model\ListarCategorias.php"> -->
    <link rel="stylesheet" href="..\css\index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>


    <?php include "BarraMenu.html"; ?>
    
    
    
    <?php include "..\..\model\ListagemPrincipal.php";  
    $resultado = $_SESSION["resultado"];
      foreach ($resultado->drinks as $Resultados) {
        $aux=0;
    ?>

      <div class="card" style="width: 18rem;">
      <img src= <?= $Resultados->strDrinkThumb ?> class="card-img-top" alt= <?=$Resultados->strImageAttribution?>>
      <div class="card-body">
        <h5 class="card-title"> <?= $Resultados->strDrink ?> </h5>
        <p class="card-text"> <?= $Resultados->strInstructions ?> </p>
        <a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#e<?= $Resultados->idDrink ?>" >Ver mais</a>
      </div>
    </div>


      <!-- Modal -->
      <div class="modal fade" id="e<?= $Resultados->idDrink ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> <?= $Resultados->strDrink ?> </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <b> Instruções : </b>  <?= $Resultados->strInstructions ?> <br>
            <b> Ingredientes : </b> <br>
            <?php 
            for ($i=1; $i <= 15; $i++) { 
              $aux = "strIngredient".$i;
              $aux2 = "strMeasure".$i;
              
              if($Resultados->$aux != null){
              ?>
                <h6>  <?=$Resultados->$aux2." ".$Resultados->$aux."<br>";?> </h6> 
             <?php
              }
           }
            ?>
            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>
  
  <?php } ?>


  
    

</body>
</html>