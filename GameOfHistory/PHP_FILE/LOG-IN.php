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



              $_SESSION['ID']=  ;
              $_SESSION['Nome']=;
              $_SESSION['Cognome']=;
              $_SESSION['Email']=;
              $_SESSION['Password']=;
              $_SESSION['Sesso']=;
                        
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


function CheckInfoClient(){
  //APRO IL FILE ARTICOLO.XML
  doc("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/UTENTE.xml")/Utenti/User/INFO_PERSONA[ID_PERSONA=$_POST[]]
}



?>