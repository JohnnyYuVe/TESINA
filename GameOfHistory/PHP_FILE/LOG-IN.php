<?php   
      ini_set('display_errors', 1);
      error_reporting(E_ALL);

        $percorso=dirname($_SERVER['PHP_SELF']);
        $Path="Location: ". $percorso ."/MAIN.php";

    if( isset($_POST['LOG_IN']) ){       
        if(empty($_POST['T_EMAIL']) || empty($_POST['T_PASS']) ){
              echo "<p>dati mancanti!!!</p>"; 
        }else{
              echo "<p> controllo avvenuto</p>";
              echo "<p>Inserimento dati nella sessione</p>";
              


              session_start();
              Extract_Utente_Info();
              


/*

              $_SESSION['ID']=  ;
              $_SESSION['Nome']=;
              $_SESSION['Cognome']=;
              $_SESSION['Email']=;
              $_SESSION['Password']=;
              $_SESSION['Sesso']=;
                        
              exit(header( $Path));     
*/              
        }
    }

?>  



<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?xml version="1.0" encoding="UTF-8"?>
<head>  
 
  <div class="Link_used"> 
    <title>GameOFHistory</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="http://localhost/php_program/GameOfHistory/CSS_FILE/LOG-IN_STYLE.css">  
  </div>
   
</head> 


<body>
      <div class="MAIN_Conteiner Font_For_Text">
                                  <div class="IMG_Conteiner">
                                          <img src="http://localhost/php_program/GameOfHistory/IMG_FILE/view-3d-arcade-game-box.jpg" alt="img">
                                          
                                  </div>

                                
                                <div class="LOG_IN_Conteiner "> 
                                 <form action="<?php $_SERVER['PHP_SELF'] ?>" class="Box_Container_Input" method="post"> 
                                          <h1>LOG-IN</h1>
                                            <div class="FORM_Conteiner Font_For_Text">
                                              <label for="T_EMAIL">Email:</label>
                                              <input type="text" id="T_EMAIL" name="T_EMAIL" required>
                                              <label for="T_PASS">Password:</label>
                                              <input type="text" id="T_PASS" name="T_PASS" required> 
                                            </div>

                                  <div class="BUTTON_Conteiner "> 
                                      <button type="submit" name="LOG_IN" class="BUTTON_LOGIN Font_For_Text">
                                        <span>LOG-IN</span>
                                      </button>

                                      <button type="button" name="REGISTRATI" class="BUTTON_RESET Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/SIGN-IN.php'">
                                        <span> REGISTRATI</span>
                                      </button>                                   
                                  </div>  
                                
                               
                                </form>
                               </div>  
      </div>  



</body>


  
</html>

<?php

function Validate_DomDocument(){

}


function Extract_Utente_Info(){

$TEST=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/UTENTE.XML") or die("Error: Cannot create object");
$Index_End=$TEST->count();
$Path='Location:http://localhost/php_program/GameOfHistory/PHP_FILE/MAIN.php';

//qui ho usato simpleXML in quanto è più facile per visitare gli elementi/attributi di un record;

for($Index_Start=0; $Index_Start<$Index_End; $Index_Start++){
      
      $ID_PERSONA_VALUE=$TEST->Utente[$Index_Start]->INFO_PERSONA["ID_Persona"];
      echo"<p>";
      echo "valore strcmp(".$Index_Start."):".strcmp($ID_PERSONA_VALUE,"uno1")."</br>"."</br>";
      echo"</p>";
          $Value_Privieggio=          $TEST->Utente["Privieggio"];
          $Value_ID_Persona=          $TEST->Utente[$Index_Start]->INFO_PERSONA["ID_Persona"];
          $Value_Nome=                $TEST->Utente[$Index_Start]->INFO_PERSONA->Nome;
          $Value_Cognome=             $TEST->Utente[$Index_Start]->INFO_PERSONA->Cognome;
          $Value_Email=               $TEST->Utente[$Index_Start]->INFO_PERSONA->Email;
          $Value_Eta=                 $TEST->Utente[$Index_Start]->INFO_PERSONA->Eta;
          $Value_Sesso=               $TEST->Utente[$Index_Start]->INFO_PERSONA->Sesso;
          $Value_Password=            $TEST->Utente[$Index_Start]->Password;
          $Value_Data_Registrazione=  $TEST->Utente[$Index_Start]->Data_Registrazione;
          $Value_Punti_History=       $TEST->Utente[$Index_Start]->Punti_History;
          $Value_Membership=          $TEST->Utente[$Index_Start]->Membership;
      //Controllo su i dati di login   
      if( !(strcmp($Value_Email,$_POST["T_EMAIL"]) && strcmp($ID_PERSONA_VALUE,$_POST['T_PASS'])) ){
          
           $_SESSION['T_EMAIL']=$_POST["T_EMAIL"];
           $_SESSION['T_PASS']=$_POST['T_PASS'];
           exit( header($Path) );
           
        /*per il debug rimuovere il commento e commentare la funzione exit( header($Path) ); cosi da vedere il risultato 
          echo"<p>";
          echo $Value_Privieggio."</br>";
          echo $TEST->Utente[$Index_Start]->INFO_PERSONA["ID_Persona"]."</br>";
          echo $Value_ID_Persona."</br>";
          echo $Value_Nome."</br>";
          echo $Value_Cognome."</br>";
          echo $TEST->Utente[$Index_Start]->INFO_PERSONA->Eta."</br>";
          echo $TEST->Utente[$Index_Start]->INFO_PERSONA->Sesso."</br>";
          echo $TEST->Utente[$Index_Start]->Data_Registrazione."</br>";
          echo $TEST->Utente[$Index_Start]->Punti_History."</br>";
          echo $TEST->Utente[$Index_Start]->Password."</br>";    
          echo $TEST->Utente[$Index_Start]->Membership."</br>";
          echo"</p>";
          */
          
      }
}

}

?>