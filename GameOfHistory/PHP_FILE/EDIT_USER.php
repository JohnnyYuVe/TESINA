<?php   
  //FILE QUASI COMPLETO MANCA IL CONTROLLO SULLA EMAIL IN MODO TALE CHE SIA UNICO E SULLA PASSWORD CHE DEVE RISPETTARE ALCUNI CRITERI DI "SICUREZZA"
  ini_set('display_errors', 1);
  session_start();
  error_reporting(E_ALL);
  require_once "funzioni.php";

    $percorso=dirname($_SERVER['PHP_SELF']);
  $Path0="Location: ". $percorso ."/EDIT.php";

  $DOC=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/UTENTE.xml") or die("Error: Cannot create object");
  $F_FILE=count($DOC);
  $NOME_FILE="UTENTE";
  $percorso=dirname($_SERVER['PHP_SELF']);
  $Path0="Location: ". $percorso ."/EDIT.php";
  

  if(isset($_POST['SEARCH']) ){
    if(strlen($_POST['ID'])!=0){
      ;
      for ($I=0; $I <$F_FILE ; $I++) { 
        $ARR_USER=Extract_USER_Info($DOC,$I);
       
        if(strcmp($_POST['ID'],$ARR_USER[1])==0){
          $_POST['INFO_PERSONA']=$ARR_USER;
          $_POST['INFO_PERSONA'][11]=$I;
          break;
        }
      }
    }
  }

if(isset($_POST['APPLY'])){
  if(isset($_POST['Index'])){
    
    if(isset($_POST['cognome'])){
      if(strlen($_POST['cognome'])!=0){
        EDIT_COGNOME_UTENTE($DOC,$NOME_FILE,$_POST['cognome'],(int)$_POST['Index']);
      }
    }
     if(isset($_POST['sesso'])){
      if(strlen($_POST['sesso'])!=0){
        EDIT_SEX_UTENTE($DOC,$NOME_FILE,$_POST['sesso'],(int)$_POST['Index']);
      }
    }
     if(isset($_POST['email'])){
      if(strlen($_POST['email'])!=0){
        EDIT_EMAIL_UTENTE($DOC,$NOME_FILE,$_POST['email'],(int)$_POST['Index']);
      }
    }

     if(isset($_POST['password'])){
      if(strlen($_POST['password'])!=0){
        EDIT_PASSWORD_UTENTE($DOC,$NOME_FILE,$_POST['password'],(int)$_POST['Index']);
      }
    }

     if(isset($_POST['Membership'])){
      if(strlen($_POST['Membership'])!=0){
        EDIT_MEMBERSHIP_UTENTE($DOC,$NOME_FILE,$_POST['Membership'],(int)$_POST['Index']);
      }
    }
     if(isset($_POST['pt_history'])){
      if(strlen($_POST['pt_history'])!=0){
        EDIT_PT_HISTORY_UTENTE($DOC,$NOME_FILE,$_POST['pt_history'],(int)$_POST['Index']);
      }
    }
     if(isset($_POST['nome'])){
      if(strlen($_POST['nome'])!=0){
         EDIT_NOME_UTENTE($DOC,$NOME_FILE,$_POST['nome'],(int)$_POST['Index']);
      }
    }

  }  
} 

 if( isset($_POST['HOME']) ){  
       exit(header($Path0));
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
    <link rel="stylesheet" href="http://localhost/php_program/GameOfHistory/CSS_FILE/EDIT_USER_STYLE.css">
  </head> 


  <body>
   
    <div class="MAIN_CONTAINER">
     

      <div class="TITLE">
        <div >
          <h1 class="Font_For_Text align">EDIT USER ITEMS</h1>
        </div>
         <div class="COUNTAINER_HOME">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
          <button type="submit " name="HOME" class="Button_Art Font_For_Text"> 
            <span class="material-symbols-outlined">home</span>      
          </button>
        </form>
      </div>
      </div>


      <div class="CONTAINER_SEARCH ">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
          <input type="text" name="ID" class="BOX_TEXT" value="ID">
            <button type="submit" name="SEARCH" class="BUTTON_CHECK Font_For_Text" >
              <span class="material-symbols-outlined">search</span>
            </button>
        </form>  
      </div>  

       <div class="CONTAINER_DX_EDIT Font_For_Text">
        
        <div class="text_1">
          <span>nome:</span>
          <span>cognome:</span>
          <span>sesso:</span>
          <span>email:</span>
          <span>password:</span>
          <span>Membership: </span>
          <span>pt_history: </span>
        </div> 

        <div class="input_field">
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="text" name="nome" class="BOX_TEXT">
            <input type="text" name="cognome" class="BOX_TEXT">
            <input type="text" name="sesso" class="BOX_TEXT">
            <input type="text" name="email" class="BOX_TEXT">
            <input type="text" name="password" class="BOX_TEXT">
            <input type="text" name="Membership" class="BOX_TEXT">
            <input type="text" name="pt_history" class="BOX_TEXT">
            <input type="hidden" name="Index" value="<?php if(isset($_POST["INFO_PERSONA"])){echo$_POST["INFO_PERSONA"][11];}?>">
          
          <button type="submit" name="APPLY" class="BUTTON_CHECK Font_For_Text" >
            <span class="material-symbols-outlined FONT_TEXT">check</span> APPLY EDIT    
          </button>

        </form>
      </div>
      </div>
        


     <div class="CONTAINER_SX_EDIT Font_For_Text">
        <?php
          if(isset($_POST['INFO_PERSONA'])){
        ?> 
        <div class="text_1">
          <span>nome:</span>
          <span>cognome:</span>
          <span>sesso:</span>
          <span>email:</span>
          <span>password:</span>
          <span>Membership: </span>
          <span>pt_history: </span>
        </div> 

        <div class="text_1">
          <span><?php echo $_POST['INFO_PERSONA'][2];?></span>
          <span><?php echo $_POST['INFO_PERSONA'][3];?></span>
          <span><?php echo $_POST['INFO_PERSONA'][6];?></span>
          <span><?php echo $_POST['INFO_PERSONA'][4];?></span>
          <span><?php echo $_POST['INFO_PERSONA'][7];?></span>
          <span><?php echo $_POST['INFO_PERSONA'][10];?></span>
          <span><?php echo $_POST['INFO_PERSONA'][9];?></span>
        </div>
        
        <?php
          }else{
        ?> 
        <div class="text_1">
          <span>nome:</span>
          <span>cognome:</span>
          <span>sesso:</span>
          <span>email:</span>
          <span>password:</span>
          <span>Membership: </span>
          <span>pt_history: </span>
        </div> 
        <?php    
          }
        ?> 
      </div> 
      </div>

     

    </div>

  </body>
</html>    