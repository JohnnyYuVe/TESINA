<?php
// FILE COMPLETATO
ini_set('display_errors', 1);
session_start();
error_reporting(E_ALL);




//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
if(isset($_POST["FAV"]) ){
                        
   if( empty($_POST["ID_art"] ) || empty($_POST["Categoria_art"] ) || empty($_POST["Nome_art"] ) || empty($_POST["Prezzo"]) ){

          echo "<p>CONTENUTO POST VUOTO1</p>";
              
   }else{

        if(!empty($_POST["ID_CLI"])){
          
              $DOC=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/PREFERITI.XML") or die("Error: Cannot create object");
              $Index_End=$DOC->count();

              $RESULT=CheckItemInFAV($DOC,$Index_End,$_POST["ID_CLI"],$_POST["ID_art"]);

                    if( $RESULT==0){
                    Add_Record_To_Preferiti("PREFERITI",$_POST["ID_art"],$_POST["ID_CLI"]);                            
                    }
                              
        }
    }                                           
}


//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
if(isset($_POST["CART"]) ){
                        
   if( empty($_POST["ID_art"] ) || empty($_POST["Categoria_art"] ) || empty($_POST["Nome_art"] ) || empty($_POST["Prezzo"]) ){

          echo "<p>CONTENUTO POST VUOTO 2</p>";  

   }else{

        if(!empty($_POST["ID_CLI"])){
          
              $DOC=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/CARRELLO.XML") or die("Error: Cannot create object");
              $Index_End=$DOC->count();

              $RESULT=CheckItemInCART($DOC,$Index_End,$_POST["ID_CLI"],$_POST["ID_art"]);

                    if( $RESULT==0){
                    Add_Record_To_Carrello("CARRELLO",$_POST["ID_art"],$_POST["ID_CLI"]);                            
                    }                             
        }

       
   }                  
                         
}
 
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    

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
     <link rel="stylesheet" type="text/css" href="http://localhost/php_program/GameOfHistory/CSS_FILE/MAIN_STYLE.css">
  </div>

</head>	
<style>

</style>
<body>

  <div Class="navigation_bar" id="nav_hide">

            <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/MAIN.php' "> 
                     <span class="material-symbols-outlined">home</span>home  
            </button>

            <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/MAIN.php' "> 
                        
            </button>

            <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/CARRELLO.php' "> 
                      <span class="material-symbols-outlined">shopping_cart</span>cart   
            </button>

            <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/LOG-IN.php' "> 
                    <span class="material-symbols-outlined">login</span> login 
            </button>

            <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/LOG-OUT.php' "> 
                    <span class="material-symbols-outlined">logout</span>logout   
            </button>


            <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/ACCOUNT.php' "> 
                     <span class="material-symbols-outlined">account_circle</span>account    
            </button>

            </button>

            <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/CUSTOMER_CARE.php' "> 
                      <span class="material-symbols-outlined">support_agent</span>support      
            </button>
  </div>



  <div class="Main_Container_Item">
       
          <div class="TEXT_conteiner">
                                    <img class="mySlides" src="http://localhost/php_program/GameOfHistory/IMG_FILE/helldiver2.jpg" alt="1">
                                    <img class="mySlides" src="http://localhost/php_program/GameOfHistory/IMG_FILE/wukong.jpg" alt="2">
                                    <img class="mySlides" src="http://localhost/php_program/GameOfHistory/IMG_FILE/BO6.jpg" alt="3">
                                    <img class="mySlides" src="http://localhost/php_program/GameOfHistory/IMG_FILE/space_marine.jpg" alt="4">
                                    <img class="mySlides" src="http://localhost/php_program/GameOfHistory/IMG_FILE/god_of_war.jpg" alt="5">
          </div>


          <div class="Box_container">
              
              <div class="Disposizione">
                    
<?php 
$DOC=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/ARTICOLO.XML") or die("Error: Cannot create object");
$Index_End=$DOC->count();

for($i=0; $i<$Index_End; $i++){ 
              Extract_Articolo_Info($DOC,$i);

?>
                    <!--style="visibility: none; display: none;"-->
                <div class="articolo Font_For_Text"   >
                  <?php 

                  echo  '<form action="MAIN.php?id='.$GLOBALS["ART_ID_VALUE"].'"'.'method="POST" id='. $GLOBALS["ART_ID_VALUE"] .'>';
                  
                  ?>
                                                 <img src='<?php echo  $GLOBALS["path"]; ?>' alt="Foto articolo"> 

                                                                                              
                                                  <p > 
                                                      Nome_articolo:  <?php echo $GLOBALS["ART_Nome_VALUE"];   ?></br>
                                                      Prezzo: &#8364; <?php echo $GLOBALS["ART_Prezzo_VALUE"]; ?></br>
                                                  </p >

                                                  <p class="red">
                                                                <?php echo $GLOBALS["ART_Descrizione_VALUE"];
                                                                      echo $GLOBALS["ART_ID_VALUE"];
                                                                      echo $GLOBALS["ART_Categoria_VALUE"];
                                                                      echo $GLOBALS["ART_Prezzo_VALUE"];
                                                                ?>


                                                  </p> 
                                                
                                    <div class="Button_Container">
                                          <button type="submit " name="FAV" class="Button_Art Font_For_Text"> 
                                                  <span class="material-symbols-outlined">favorite</span>      
                                          </button>

                                          <button type="submit" name="CART" class="Button_Art Font_For_Text" >
                                                 <span class="material-symbols-outlined">add<span>     
                                          </button>

                                         <input type="hidden" name="ID_art"         value= "<?php echo $GLOBALS["ART_ID_VALUE"];?>">
                                         <input type="hidden" name="Categoria_art"  value= "<?php echo $GLOBALS["ART_Categoria_VALUE"];?>">
                                         <input type="hidden" name="Nome_art"       value= "<?php echo $GLOBALS["ART_Nome_VALUE"];?>">
                                         <input type="hidden" name="Prezzo"         value= "<?php echo $GLOBALS["ART_Prezzo_VALUE"];?>">

                                        <?php  
                                              if( isset($_SESSION['T_ID']) ){
                                                          if( empty($_SESSION['T_ID']) ){
                                                              echo  'ERRORE T_ID';

                                                          }else{                                           
                                                            echo '<input type="hidden" name="ID_CLI" value= "'.$_SESSION['T_ID'].'">';
                                                            echo  '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>';
                                                          }   

                                              }
                                         ?>
                                   </div>
                     <?php  
                     echo '</form>';                                 
                     ?>                    
                </div>
<?php 
}
 ?>                   
              </div>
               
              <div Class="ScorriPagina Font_For_Text">
                                                <a href="#">&laquo;</a>      
                                                <a href="#">1</a>
                                                <a href="#">2</a>
                                                <a href="#">3</a>
                                                <a href="#">&raquo;</a>
              </div>
        </div>     
  </div>
    

  <hr>
  <div class="Container_info Font_For_Text">
                              <div class="Box_contact" style="border-right-color:  black;"> 
                                    <h1>Contact info</h1>
                                    <p>
                                      Email: GameofHistory@gmail.com</br>
                                      Number:+39 0773 123123</br>
                                    </p>    
                              </div>

                              
                              <div class="Box_contact">
                                 <h1>Negozio</h1>
                                  
                                  <p>
                                    Corso della repubblica.</br>
                                  Orario:</br></br>
                                    Lun-Ven: 9:00-13:00 - 16:00-19:00</br>
                                    Sab-dom: 9:00-13:00</br>
                                  </p>  
                              </div>

                              <div class="Box_contact"style="border-left-color:  black;"> 
                                  <h1> Social</h1>
                                  <p><img  src="http://localhost/php_program/GameOfHistory/IMG_FILE/face.png"  alt="facebook">    facebook </p>
                                  <p><img  src="http://localhost/php_program/GameOfHistory/IMG_FILE/twit.png"  alt="twitter">     twitter  </p>
                                  <p><img  src="http://localhost/php_program/GameOfHistory/IMG_FILE/ins.png"   alt="instagram">   instagram</p>
                                  <p><img  src="http://localhost/php_program/GameOfHistory/IMG_FILE/what.png"  alt="whatsapp">    whatsapp </p>
                                
                              </div>

                            

</div>  

<!---------------------------------------------------------------------------------------------------------------------------------------------->
<script>
        /*cambia l'immagine dentro Textcontainer ogni 4 sec*/
        var myIndex = 0;

        carousel();
       
        function carousel() {
                        var i;
                        var x = document.getElementsByClassName("mySlides");
                        for (i = 0; i < x.length; i++) {
                                    x[i].style.display = "none";  
                        }
          myIndex++;


          if (myIndex > x.length) {
                              myIndex = 1
                            }    
          x[myIndex-1].style.display = "block";  
          setTimeout(carousel, 4000); // Change image every 4 seconds
        }

     
</script>

<script>
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("nav_hide").style.top = "0";
    } else {
      document.getElementById("nav_hide").style.top = "-150px";
    }
    prevScrollpos = currentScrollPos;
  }
  /* il menu viene nascosto quando si scende giù nella pagina*/
</script>



</body>


  
</html>


<?php

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//   FUNZIONE PER PREFERITO
function CheckItemInFAV($DOC,$Index_End,$ID_CLI, $ID_art ){
        
      for( $Index_Start=0; $Index_Start<$Index_End; $Index_Start++){

            $INFO_DOC_ART=$DOC->PREFERITO[$Index_Start]->ART_ID;
            $INFO_DOC_CLI=$DOC->PREFERITO[$Index_Start]->CLI_ID;
              
              $str1=strval($INFO_DOC_CLI);
              $str3=strval($ID_CLI);

              $str2=strval($INFO_DOC_ART);              
              $str4=strval($ID_art);  

            if(strcmp($str1,$str3)==0 && strcmp($str2 ,$str4)==0){
              return 1; 
              //lo trova E NON VA AGGIUNTO AL FILE PREFERITI
            }

      }
      return 0;
      //non lo trova E VA AGGIUNTO AL FILE PREFERITI
}



//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//   FUNZIONE PER PREFERITO
function Add_Record_To_Preferiti($NOME_FILE,$New_ART_ID_PREF,$New_CLI_ID_PREF){
        $DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");

          $RecordADD=$DOC->addChild("PREFERITO");
          $RecordADD->addChild("ART_ID",$New_ART_ID_PREF);
          $RecordADD->addChild("CLI_ID",$New_CLI_ID_PREF);

        file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML()); 

}






//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//   FUNZIONE PER ATICOLO
function Extract_Articolo_Info($TEST,$Index_Start){

   $GLOBALS["ART_ID_VALUE"]           =$TEST->ARTICOLO[$Index_Start]["ART_ID"];
   $GLOBALS["ART_Categoria_VALUE"]    =$TEST->ARTICOLO[$Index_Start]["Categoria"];
   $GLOBALS["ART_Nome_VALUE"]         =$TEST->ARTICOLO[$Index_Start]->Nome;
   $GLOBALS["ART_Prezzo_VALUE"]       =$TEST->ARTICOLO[$Index_Start]->Prezzo;
   $GLOBALS["ART_Descrizione_VALUE"]  =$TEST->ARTICOLO[$Index_Start]->Descrizione;
   $ART_Percorso_VALUE                =$TEST->ARTICOLO[$Index_Start]->IMG->Percorso;
   $ART_Nome_IMG_VALUE                =$TEST->ARTICOLO[$Index_Start]->IMG->Nome_IMG;
   $ART_Estensione_VALUE              =$TEST->ARTICOLO[$Index_Start]->IMG->Estensione;
   $ART_Path_VALUE                    =$ART_Percorso_VALUE.$ART_Nome_IMG_VALUE.$ART_Estensione_VALUE;
   $GLOBALS["path"]                   =$ART_Path_VALUE; 
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//   FUNZIONE CARRELLO
function CheckItemInCART($DOC,$Index_End,$ID_CLI, $ID_art ){
          for( $Index_Start=0; $Index_Start<$Index_End; $Index_Start++){

            $INFO_DOC_ART=$DOC->CARRELLO[$Index_Start]->ART_ID;
            $INFO_DOC_CLI=$DOC->CARRELLO[$Index_Start]->CLI_ID;
              
              $str1=strval($INFO_DOC_CLI);
              $str3=strval($ID_CLI);

              $str2=strval($INFO_DOC_ART);              
              $str4=strval($ID_art);  

            if(strcmp($str1,$str3)==0 && strcmp($str2 ,$str4)==0){
              return 1; 
              //lo trova E NON VA AGGIUNTO AL FILE PREFERITI
            }

      }
      return 0;
      //non lo trova E VA AGGIUNTO AL FILE PREFERITI
}

function Extract_CARRELLO_Info($TEST,$Index_Start){

                            $CART[0]=$TEST->PREFERITO->ART_ID[$Index_Start];
                            $CART[1]=$TEST->PREFERITO->CLI_ID[$Index_Start];
                            return $CART;
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//   FUNZIONE PER CARRELLO
function Add_Record_To_Carrello($NOME_FILE,$New_ART_ID_CART,$New_CLI_ID_CART){
      
      $DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");

        $RecordADD=$DOC->addChild("CARRELLO");
        $RecordADD->addChild("ART_ID",$New_ART_ID_CART);
        $RecordADD->addChild("CLI_ID",$New_CLI_ID_CART);

      file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML()); 
      
}


//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function Validate_DomDocument($NOME_FILE){
                          
                            $xmlString = ""; 
                            $doc = new DOMDocument();
                             /*variabile di tipo DOMDocument */
                            /* rimuovo dal file utente.xml parti non utili alla parser */   

                               foreach ( file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') as $node ) {                                  
                                                 $xmlString .= trim($node);
                                }

                            $doc->loadXML($xmlString);

                            //Validazione xml se è conforme con il suo schema   
                                if ( $doc->validate() ) {
                                          echo "<p>This document is valid</p>\n";
                                }else{
                                   echo "<p>This document is not valid</p>\n";
                                }
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function PrintParziale(){

}

?>