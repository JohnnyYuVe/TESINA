<?php   
  //FILE QUASI COMPLETO MANCA IL CONTROLLO SULLA EMAIL IN MODO TALE CHE SIA UNICO E SULLA PASSWORD CHE DEVE RISPETTARE ALCUNI CRITERI DI "SICUREZZA"
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  require_once "funzioni.php";

 
  $DOC_UTENTE=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/UTENTE.xml") or die("Error: Cannot create object");
  $I=count($DOC_UTENTE);
  $DATA_ISCR=date("d/m/Y");
  $CLIENT_ID="CLI".$I;
  $MEMBER="BRONZE";
  $percorso=dirname($_SERVER['PHP_SELF']);
  $Path="Location: ". $percorso ."/MAIN.php";
  
  if( isset($_POST['REGISTRATI']) ){           
    if(empty($_POST['T_Nome']) || empty($_POST['T_Cognome'])|| empty($_POST['T_EMAIL'])|| empty($_POST['T_PASS']) || empty($_POST['T_Eta'])|| empty($_POST['T_Sesso']) ){
      echo "<p>dati mancanti!!!</p>"; 
    }else{

      $ARR_USER_INFO[0]=$CLIENT_ID;
      $ARR_USER_INFO[1]=$_POST['T_Nome'];
      $ARR_USER_INFO[2]=$_POST['T_Cognome'];
      $ARR_USER_INFO[3]=$_POST['T_EMAIL'];
      $ARR_USER_INFO[4]=$_POST['T_PASS'];
      $ARR_USER_INFO[5]=$_POST['T_Eta'];
      $ARR_USER_INFO[6]=$_POST['T_Sesso'];
      $ARR_USER_INFO[7]=$DATA_ISCR;
      $ARR_USER_INFO[8]=0;
      $ARR_USER_INFO[9]=$MEMBER;
      $ARR_USER_INFO[10]="UTENTE";
            
      if( Check_User_Email_already_Used($DOC_UTENTE,$_POST['T_EMAIL'])==0 ){    
        Add_Record_To_Utente($DOC_UTENTE,$ARR_USER_INFO);
      }else{
        //messaggio popup che dice l'email non è valido;
         echo "<p> email non valida</p>";
      }        
              //aspettare 5 secondi per far vedere che la registrazione è avvenuta;
              exit(header( $Path));             
    }
  }

   if( isset($_POST['HOME']) ){  
       exit(header($Path));
  }  
?>  

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <?xml version="1.0" encoding="UTF-8"?>
  <head>
    <title>GameOFHistory</title>     
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/php_program/GameOfHistory/CSS_FILE/SIGN-IN_STYLE.css">      
  </head> 
  <body>
    <div class="MAIN_Conteiner">
      <div class="BOX_Destro Font_For_Text">
        <img src="http://localhost/php_program/GameOfHistory/IMG_FILE/futuristic-casino-architecture.jpg" alt="img">          
      </div> 
      <div class="BOX_Sinistro Font_For_Text">
         <div class="COUNTAINER_HOME">
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <button type="submit " name="HOME" class="Button_Art Font_For_Text"> 
              <span class="material-symbols-outlined">home</span>      
            </button>
          </form>
        </div>
        <h1>REGISTRAZIONE</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="FORM_Conteiner Font_For_Text">
            <label for="T_Nome ">Nome:</label>
            <input type="text" id="T_Nome" name="T_Nome" required>

            <label for="T_Cognome">Cognome:</label>
            <input type="text" id="T_Cognome" name="T_Cognome" required>

            <label for="T_EMAIL">Email:</label>
            <input type="text" id="T_EMAIL" name="T_EMAIL" required>

            <label for="T_PASS">Password:</label>
            <input type="text" id="T_EMAIL" name="T_PASS" required>

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
              <button type="button" name="ANNULLA" class="BUTTON_ANNULLA Font_For_Text" onclick="location.href='MAIN.php'">
                <span>ANNULLA</span>
              </button>
            </div>
          </div>         
        </form>
      </div>

       

    </div>
  </body>
</html>









