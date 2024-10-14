<?php   
//FILE QUASI COMPLETO MANCA IL CONTROLLO SULLA EMAIL IN MODO TALE CHE SIA UNICO E SULLA PASSWORD CHE DEVE RISPETTARE ALCUNI CRITERI DI "SICUREZZA"
      ini_set('display_errors', 1);
      error_reporting(E_ALL);

        $NOME_FILE="UTENTE";

        $I=Count_Record_File($NOME_FILE);
        $DATA_ISCR=date("d/m/Y");
        $CLIENT_ID="CLI".$I;
        $MEMBER="BRONZE";

        $percorso=dirname($_SERVER['PHP_SELF']);
        $Path="Location: ". $percorso ."/MAIN.php";


    if( isset($_POST['REGISTRATI']) ){       
     
        if(empty($_POST['T_Nome']) || empty($_POST['T_Cognome'])|| empty($_POST['T_EMAIL'])|| empty($_POST['T_PASS']) || empty($_POST['T_Eta'])|| empty($_POST['T_Sesso']) ){
              echo "<p>dati mancanti!!!</p>"; 

              //messaggio popup che dice mancano dati non è valido;
        }else{

              echo "<p> controllo avvenuto</p>";

             
             if( Check_User_Email_already_Used($NOME_FILE,$_POST['T_EMAIL'])==1 ){    
                  Add_Record_To_Utente($NOME_FILE,$CLIENT_ID,$_POST['T_Nome'],$_POST['T_Cognome'],$_POST['T_Eta'],$_POST['T_EMAIL'],$_POST['T_PASS'],$_POST['T_Sesso'],$DATA_ISCR,"0", $MEMBER);
              }else{
                  //messaggio popup che dice l'email non è valido;
                echo "<p> email non valida</p>";
              }
              
              //aspettare 5 secondi per far vedere che la registrazione è avvenuta;
              //exit(header( $Path));      
              
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














<?php   

function Count_Record_File($NOME_FILE){

      $DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");
      $Index_End=$DOC->count();
      return $Index_End;
}



function Add_Record_To_Utente($NOME_FILE,$New_User_ID,$New_User_NOME,$New_User_COGNOME,$New_User_ETA,$New_User_EMAIL,$New_User_PASS,$New_User_SEX,$New_User_DataREG,$New_User_PuntiHistory,$New_User_Membership){
        $DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");

          $RecordADD=$DOC->addChild("Utente");
          $RecordADD->addAttribute("Privieggio","CLIENTE");
          
          $RecordADD1=$RecordADD->addChild("INFO_PERSONA");
          $RecordADD1->addAttribute("ID_Persona",$New_User_ID);
          $RecordADD1->addChild("Nome",$New_User_NOME);
          $RecordADD1->addChild("Cognome",$New_User_COGNOME);
          $RecordADD1->addChild("Eta",$New_User_ETA);
          $RecordADD1->addChild("Email",$New_User_EMAIL);
          $RecordADD1->addChild("Password",$New_User_PASS);
          $RecordADD1->addChild("Sesso",$New_User_SEX);

          $RecordADD->addChild("Data_Registrazione",$New_User_DataREG);
          $RecordADD->addChild("Punti_History",$New_User_PuntiHistory);
          $RecordADD->addChild("Membership",$New_User_Membership);

        file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());         

}



function Check_User_Email_already_Used($NOME_FILE,$Email_to_Check){
        $DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");
        $J=Count_Record_File($NOME_FILE);
        $I=0;
        echo $J;
        while($I<$J){        
              $DB_EMAIL=$DOC->Utente[$I]->INFO_PERSONA->Email;

              echo "<p>";
              echo $DB_EMAIL."</br>";
              echo $Email_to_Check."</br>";
              echo "</p>";
              if(strcmp($Email_to_Check,$DB_EMAIL)==0) {
                  //le stringe sono uguali quindi non posso prendere l'email;              
                 return 0;
              }
             $I++; 
        }
        //le stringe non sono uguali quindi posso prendere l'email;
        return 1; 
}


?>  