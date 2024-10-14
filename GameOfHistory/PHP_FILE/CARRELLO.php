<?php
//FILE QUASI COMPLETATO MANCA IL REINDIRIZZAMENTO ALLA PAGINA PER EDITARE ALCUNI DATI DEL PROPRIO PROFILO.
      ini_set('display_errors', 1);
      session_start();
      error_reporting(E_ALL);

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>   
  <div class="Link_used"> 
    <title>GameOFHistory</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
  <!--  <link rel="stylesheet" href="http://localhost/php_program/GameOfHistory/CSS_FILE/.css">-->
  </div>
</head> 

<style>
body{                 
          background-image: url("http://localhost/php_program/GameOfHistory/IMG_FILE/view-3d-arcade-game-box.jpg");
          background-repeat:no-repeat;
          background-size:cover;       
}
p{
  color:  red;
}
  

</style>



<body>
   

<div class="Container_section">

        <?php 
            $DOC_ART=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/ARTICOLO.xml") or die("Error: Cannot create object");
        ?>        

        <div class="Section_cart">
                <p>Il tuo carrello</p>
                  

                <?php 

                $DOC_CART=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/CARRELLO.xml") or die("Error: Cannot create object");
                $Index_End=$DOC_CART->count();

                for($Index_Start=0;$Index_Start<$Index_End;$Index_Start++){

                                                                      $ARR_cart=Extract_CART_Info($DOC_CART,$Index_Start);

                              if(strcmp($_SESSION['T_ID'],$ARR_cart[1])==0){
                                $ARR_art= array();
                                $ARR_art=Extract_Articolo_Info($DOC_ART,$Index_Start);
                                
                                echo  '<form action="MAIN.php?id='.$ARR_art[0].'"'.'method="POST" id='. $ARR_art[0] .'>';  

                ?>

                <div class="Articolo">

                       <!-- <img src='<?php echo $ARR_art[5]; ?>' alt="Foto articolo">-->
                           <p>
                              sessione id:  <?php echo $_SESSION['T_ID']; ?></br>
                              ID cliente nel File fav:  <?php echo $ARR_cart[1]; ?></br>  
                              Nome_articolo:  <?php echo $ARR_art[1];   ?></br>
                              Prezzo: &#8364; <?php echo $ARR_art[2];   ?></br>
                              <!--Quantita:-->
                          </p>     
                </div>
                
                <?php

                  } 
                }

                ?>

        </div>


        <div class="Section_Preferiti">
                <p> i tuoi preferiti</p>
                
                  <?php 
//estrazione dei record scelti dal cliente 
                $DOC_PREF=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/PREFERITI.xml") or die("Error: Cannot create object");
                $Index_End=$DOC_PREF->count();

                for($Index_Start=0;$Index_Start<$Index_End;$Index_Start++){   

                    $ARR_fav=Extract_FAV_Info($DOC_PREF,$Index_Start);
                    
                  if(strcmp($_SESSION['T_ID'],$ARR_fav[1])==0){

                  $ARR_art= array();
                  $ARR_art=Extract_Articolo_Info($DOC_ART,$Index_Start);
                  

                  echo  '<form action="MAIN.php?id='.$ARR_art[0].'"'.'method="POST" id='. $ARR_art[0] .'>';  

                ?>

                <div class="Articolo">

                       <!-- <img src='<?php echo $ARR_art[5]; ?>' alt="Foto articolo">-->
                           <p>  
                              sessione id:  <?php echo $_SESSION['T_ID']; ?></br>
                              ID cliente nel File fav:  <?php echo $ARR_fav[1]; ?></br>
                              Nome_articolo:  <?php echo $ARR_art[1]; ?></br>
                              Prezzo: &#8364; <?php echo $ARR_art[2]; ?></br>
                              <!--Quantita:-->
                          </p>     
                </div>
                
                <?php

                  } 
                }

                ?>


        </div> 

        <div class="Section_Paga">
                <p>Il tuo </p>
                  


                <div>
                      
                   
                </div>

        </div> 


</div >

</body>


  
</html>

<?php

function Extract_Articolo_Info($TEST,$Index_Start){

   
    $Array[0]=              strval($TEST->ARTICOLO["ART_ID"]);
    $Array[1]=              strval($TEST->ARTICOLO["Categoria"]);
    $Array[2]=              strval($TEST->ARTICOLO[$Index_Start]->Nome);
    $Array[3]=              strval($TEST->ARTICOLO[$Index_Start]->Prezzo);
    $Array[4]=              strval($TEST->ARTICOLO[$Index_Start]->Descrizione);
    $ART_Percorso_VALUE=    strval($TEST->ARTICOLO[$Index_Start]->IMG->Percorso);
    $ART_Nome_IMG_VALUE=    strval($TEST->ARTICOLO[$Index_Start]->IMG->Nome_IMG);
    $ART_Estensione_VALUE=  strval($TEST->ARTICOLO[$Index_Start]->IMG->Estensione);
    $Array[5]=              strval($ART_Percorso_VALUE.$ART_Nome_IMG_VALUE.$ART_Estensione_VALUE);
          /*
          echo $TEST->ARTICOLO["ART_ID"]."</br>";
          echo $TEST->ARTICOLO["Categoria"]."</br>";
          echo $TEST->ARTICOLO[$Index_Start]->Nome."</br>";
          echo $TEST->ARTICOLO[$Index_Start]->Prezzo."</br>";     
          echo $TEST->ARTICOLO[$Index_Start]->Descrizione."</br>";
          echo $TEST->ARTICOLO[$Index_Start]->IMG->Percorso."</br>";
          echo $TEST->ARTICOLO[$Index_Start]->IMG->Nome_IMG."</br>";
          echo $TEST->ARTICOLO[$Index_Start]->IMG->Estensione."</br>";  
          echo $path."</br>";
          */
   return $Array;       
}

function Extract_CART_Info($TEST,$Index_Start){
                      $CART=array();
                      $CART[0]=strval($TEST->CARRELLO[$Index_Start]->ART_ID);
                      $CART[1]=strval($TEST->CARRELLO[$Index_Start]->CLI_ID);

                      return $CART;
}
function Extract_FAV_Info($TEST,$Index_Start){
                      $FAV=array();
                      $FAV[0]=strval($TEST->PREFERITO[$Index_Start]->ART_ID);
                      $FAV[1]=strval($TEST->PREFERITO[$Index_Start]->CLI_ID);

                      return $FAV;
}


?>
