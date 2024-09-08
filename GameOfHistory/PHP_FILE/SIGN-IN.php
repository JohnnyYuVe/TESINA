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
              exit(header( $Path));      
              
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
   <link rel="stylesheet" href="http://localhost/php_program/GameOfHistory/CSS_FILE/SIGN-IN_STYLE.css"> 
  </div>
   
</head> 
<style>


</style>


<body>
      <div class="MAIN_Conteiner">            
            <div class="BOX_Destro Font_For_Text">
              <img src="http://localhost/php_program/GameOfHistory/IMG_FILE/futuristic-casino-architecture.jpg" alt="img">          
            </div> 


            <div class="BOX_Sinistro Font_For_Text">
                <h1>REGISTRAZIONE</h1>
              <form>
                <div class="FORM_Conteiner Font_For_Text">
                    <label for="T_Nome ">Nome:</label>
                    <input type="text" id="T_Nome" name="T_Nome" required>

                    <label for="T_Cognome">Cognome:</label>
                    <input type="text" id="T_Cognome" name="T_Cognome" required>

                    <label for="T_EMAIL">Email:</label>
                    <input type="text" id="T_EMAIL" name="T_EMAIL" required>

                    <label for="T_Eta">Eta:</label>
                    <input type="number" id="T_Eta" name="T_Eta" required>

                    <label for="T_Sesso">Sesso:</br></label>
                    <input type="radio" id="T_Sesso" name="T_Sesso" value="Maschio" ><span class="RR">Maschio</span>
                    <input type="radio" id="T_Sesso" name="T_Sesso" value="Femmina" ><span class="RR">Femmina</span>
                    <input type="radio" id="T_Sesso" name="T_Sesso" value="N/D"     ><span class="RR"> No Genere</span>
               
                    <div class="BUTTON_Conteiner ">
                        <button type="submit" name="REGISTRATI" class="BUTTON_REGISTRATI Font_For_Text">
                          <span>REGISTRATI</span>
                        </button>

                        <button type="button" name="ANNULLA" class="BUTTON_ANNULLA Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/MAIN.php'">
                          <span>ANNULLA</span>
                        </button>
                    </div>
                </div>         
              </form>        
            </div>
      </div>

</body>



</html>