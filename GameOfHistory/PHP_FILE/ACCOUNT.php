<?php
  //FILE QUASI COMPLETATO MANCA IL REINDIRIZZAMENTO ALLA PAGINA PER EDITARE ALCUNI DATI DEL PROPRIO PROFILO.
  ini_set('display_errors', 1);
  session_start();
  error_reporting(E_ALL);
  require_once "funzioni.php";

  if(!isset($_SESSION["T_ID"]) ){
     $_SESSION['HIDE']=0;
  }else{
   $_SESSION['HIDE']=1;
  }
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
      <link rel="stylesheet" href="http://localhost/php_program/GameOfHistory/CSS_FILE/ACCOUNT_STYLE.css">
    </div>
  </head> 

  <body>
    <div class="Container_section">
      <?php  
        
          if($_SESSION["HIDE"]==1){
        ?>
        <div Class="navigation_bar" id="nav_hide">
        <?php
        }else{
        ?>
        <div Class="navigation_bar1" id="nav_hide">
        <?php  
        } 
        ?> 

        <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='MAIN.php' "> 
          <span class="material-symbols-outlined">home</span>home  
        </button>

        <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='GAMES.php' ">
        <span class="material-symbols-outlined">sports_esports</span>giochi                                 
        </button>
        <?php  
          if($_SESSION["HIDE"]==1){
        ?>
        <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='CARRELLO.php' "> 
          <span class="material-symbols-outlined">shopping_cart</span>cart   
        </button>

        <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='LOG-OUT.php' "> 
          <span class="material-symbols-outlined">logout</span>logout   
        </button>

        <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='ACCOUNT.php' "> 
          <span class="material-symbols-outlined">account_circle</span>account    
        </button>
        <?php
        }else{
        ?>
        <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='LOG-IN.php' "> 
          <span class="material-symbols-outlined">login</span> login 
        </button>
         <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='SIGN-IN.php' "> 
          <span class="material-symbols-outlined">login</span> registrati 
        </button>

         <?php  
        } 
        ?>  
                   
        <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='CUSTOMER_CARE.php' "> 
          <span class="material-symbols-outlined">support_agent</span>support      
        </button>

      </div>    
    </div>

    <div class="INFO_Conteiner Font_For_Text">

      <?php 
      if(isset($_SESSION["T_ID"]) ){   
      ?>
        <div class="INFO1">
          <p>
            <span>ID :      </span> <?php echo $_SESSION['T_ID'];     ?></br>
            <span>Nome :    </span> <?php echo $_SESSION['T_NOME'];   ?></br>    
            <span>Cognome : </span> <?php echo $_SESSION['T_COGNOME'];?></br>
            <span>Email :   </span> <?php echo $_SESSION['T_EMAIL'];  ?></br>
            <span>Eta :     </span> <?php echo $_SESSION['T_ETA'];    ?></br>
            <span>Sesso :   </span> <?php echo $_SESSION['T_SESSO'];  ?></br>
          </p>
        </div>
        <div class="INFO2">
          <p>
            <span>Punti HISTORY :   </span> <?php echo $_SESSION['T_PUNTI'];              ?></br>
            <span>Data iscrizione : </span> <?php echo $_SESSION['T_DATA_REGISTRAZIONE']; ?></br>    
            <span>Membership :      </span> <?php echo $_SESSION['T_MEMBERSHIP'];         ?></br>
            <span>Privileggio :     </span> <?php echo $_SESSION['T_PRIVILEGGIO'];        ?></br>
            <span>TEST :            </span> <?php echo $_SESSION['T_NOME'];               ?></br>
            <span>TEST :            </span> <?php echo $_SESSION['T_NOME'];               ?></br>
          </p>
        </div>
      <?php 
        }else{   
      ?>
        <div class="INFO1">
          <p>
            <span>ID :      </span> <?php echo "N/A";?></br>
            <span>Nome :    </span> <?php echo "N/A";?></br>    
            <span>Cognome : </span> <?php echo "N/A";?></br>
            <span>Email :   </span> <?php echo "N/A";?></br>
            <span>Eta :     </span> <?php echo "N/A";?></br>
            <span>Sesso :   </span> <?php echo "N/A";?></br>
          </p>
        </div>

        <div class="INFO2">
          <p>
            <span>Punti HISTORY :   </span> <?php echo "N/A";?></br>
            <span>Data iscrizione : </span> <?php echo "N/A";?></br>    
            <span>Membership :      </span> <?php echo "N/A";?></br>
            <span>Privileggio :     </span> <?php echo "N/A";?></br>
            <span>TEST :            </span> <?php echo "N/A";?></br>
            <span>TEST :            </span> <?php echo "N/A";?></br>
          </p>
        </div>
      <?php 
        }  
      ?>

      <div class="INFO3">
        <div class="BackGround_Button">
          <button type="button" class="Big_Button Font_For_Text" onclick="location.href='MAIN.php'">
            <span>EDIT INFO</span> 
          </button>
        </div>                    
      </div>
    </div>
  </body>
</html>


