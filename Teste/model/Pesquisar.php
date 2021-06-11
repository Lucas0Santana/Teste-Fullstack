<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<?php

    if(!empty($_SESSION["palavra_chave"])){


         $palavra_chave = $_SESSION["palavra_chave"];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/search.php?i=". $palavra_chave,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: the-cocktail-db.p.rapidapi.com",
                "x-rapidapi-key: 09d8e86b69msh367d3917d7092d8p152d35jsnbed02402c430"
            ],
        ]);

        $resultado = json_decode(curl_exec($curl));
        $err = curl_error($curl);
        curl_close($curl);

        if ($resultado->ingredients == null) {
            $_SESSION["resultadoPesquisa"] = "Nada encontrado";
        } else {
            
            $_SESSION["resultadoPesquisa"] = $resultado; 
            
        }



        

    }

    /*========================================================================================================*/

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/filter.php?i=".$palavra_chave,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: the-cocktail-db.p.rapidapi.com",
		"x-rapidapi-key: 09d8e86b69msh367d3917d7092d8p152d35jsnbed02402c430"
	],
]);

$err = curl_error($curl);
$resultadoDrinks = json_decode(curl_exec($curl));

curl_close($curl);

if ($resultadoDrinks->drinks == "None Found") {
	$_SESSION["resultadoDrinks"] = "Nada encontrado";
} else {
	$_SESSION["resultadoDrinks"] = $resultadoDrinks;
  //  header("Location: ../view/screen/ResultadoPesquisa.php");
}



?>