<?php
  // FILE COMPLETATO
  ini_set('display_errors', 1);
  session_start();
  error_reporting(E_ALL);
  require_once "funzioni.php";

  if(isset($_SESSION["T_ID"])){ 
              
      session_destroy();
  }else{
    echo"<p>HEY NON HAI ESEGUITO NESSUN ACCESSO</p>";
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
      <link rel="stylesheet" href="http://localhost/php_program/GameOfHistory/CSS_FILE/LOG_OUT_STYLE.css">  
    </div>
  </head> 

  <body>
    <div class="MAIN_Conteiner">
      <div class="BackGround_TEXT1 Font_For_Text">
        <h1>GAME OF HISTORY</h1>
         <p>Arrivederci ci vediamo la prossima volta :D</p>
      </div>

      <div class="BackGround_Button ">
        <button type="button" class="Big_Button Font_For_Text" onclick="location.href='MAIN.php'"><span>Go Home</span></button>
      </div>

      <div class="BackGround_TEXT2 Font_For_Text">
        <p>Credit to: Yu John Veneth</p>
      </div>
    </div>
  </body>
</html>

