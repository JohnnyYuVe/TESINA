<?php   
  //FILE QUASI COMPLETO MANCA IL CONTROLLO SULLA EMAIL IN MODO TALE CHE SIA UNICO E SULLA PASSWORD CHE DEVE RISPETTARE ALCUNI CRITERI DI "SICUREZZA"
  ini_set('display_errors', 1);
  session_start();
  error_reporting(E_ALL);
  require_once "funzioni.php";

  $percorso=dirname($_SERVER['PHP_SELF']);
  $Path0="Location: ". $percorso ."/EDIT.php";

  $DOC=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/ARTICOLO.xml") or die("Error: Cannot create object");
  $F_FILE=count($DOC);
  $NOME_FILE="ARTICOLO";
  
  

  if(isset($_POST['SEARCH']) ){
    if(strlen($_POST['ID'])!=0){
      ;
      for ($I=0; $I <$F_FILE ; $I++) { 
        $ARR_ART=Extract_Articolo_Info($DOC,$I);
       
        if(strcmp($_POST['ID'],$ARR_ART[0])==0){
          $_POST['INFO_ART']=$ARR_ART;
          $_POST['INFO_ART'][11]=$I;
          break;
        }
      }
    }
  }


if(isset($_POST['APPLY'])){
  if(isset($_POST['Index'])){
    
    if(isset($_POST['id'])){
      if(strlen($_POST['id'])!=0){
        EDIT_ID_ARTICOLO($DOC,$NOME_FILE,$_POST['id'],(int)$_POST['Index']);
      }
    }
     if(isset($_POST['categoria'])){
      if(strlen($_POST['categoria'])!=0){
        EDIT_CATEGORIA_ARTICOLO($DOC,$NOME_FILE,$_POST['categoria'],(int)$_POST['Index']);
      }
    }

     if(isset($_POST['nome_art'])){
      if(strlen($_POST['nome_art'])!=0){
        EDIT_NOME_ARTICOLO($DOC,$NOME_FILE,$_POST['nome_art'],(int)$_POST['Index']);
      }
    }

     if(isset($_POST['descrizione'])){
      if(strlen($_POST['descrizione'])!=0){
        EDIT_DESCRIZIONE_ARTICOLO($DOC,$NOME_FILE,$_POST['descrizione'],(int)$_POST['Index']);
      }
    }

     if(isset($_POST['percorso'])){
      if(strlen($_POST['percorso'])!=0){
        EDIT_PERCORSO_ARTICOLO($DOC,$NOME_FILE,$_POST['percorso'],(int)$_POST['Index']);
      }
    }

     if(isset($_POST['estensione'])){
      if(strlen($_POST['estensione'])!=0){
        EDIT_ESTENSIONE_ARTICOLO($DOC,$NOME_FILE,$_POST['estensione'],(int)$_POST['Index']);
      }
    }
     if(isset($_POST['prezzo'])){
      if(strlen($_POST['prezzo'])!=0){
        EDIT_PREZZO_ARTICOLO($DOC,$NOME_FILE,$_POST['prezzo'],(int)$_POST['Index']);
      }
    }
     if(isset($_POST['nome_IMG'])){
      if(strlen($_POST['nome_IMG'])!=0){
         EDIT_IMG_ARTICOLO($DOC,$NOME_FILE,$_POST['nome_IMG'],(int)$_POST['Index']);
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
    <link rel="stylesheet" href="http://localhost/php_program/GameOfHistory/CSS_FILE/EDIT_ART_STYLE.css">
  </head> 


  <body>
   
    <div class="MAIN_CONTAINER">
      <div class="TITLE">
        <div >
          <h1 class="Font_For_Text align">EDIT ART ITEMS</h1>
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
          <span>ID:</span>
          <span>CATEGORIA:</span>
          <span>NOME ART:</span>
          <span>PREZZO:</span>
          <span>DESCRIZIONE:</span>
          <span>PERCORSO IMG:</span>
          <span>NOME IMG:</span>
          <span>ESTENSIONE IMG:</span>
        </div> 

        <div class="input_field">
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="text" name="id" class="BOX_TEXT">
            <input type="text" name="categoria" class="BOX_TEXT">
            <input type="text" name="nome_art" class="BOX_TEXT">
            <input type="text" name="prezzo" class="BOX_TEXT">
            <input type="text" name="descrizione" class="BOX_TEXT">
            <input type="text" name="percorso" class="BOX_TEXT">
            <input type="text" name="nome_IMG" class="BOX_TEXT">
            <input type="text" name="estensione" class="BOX_TEXT">
            <input type="hidden" name="Index" value="<?php if(isset($_POST["INFO_ART"])){echo$_POST["INFO_ART"][11];}?>">
          
          <button type="submit" name="APPLY" class="BUTTON_CHECK Font_For_Text" >
            <span class="material-symbols-outlined FONT_TEXT">check</span> APPLY EDIT    
          </button>

        </form>
      </div>
      </div>
        


     <div class="CONTAINER_SX_EDIT Font_For_Text">
        <?php
          if(isset($_POST['INFO_ART'])){
        ?> 
        <div class="text_1">
          <span>ID:</span>
          <span>CATEGORIA:</span>
          <span>NOME ART:</span>
          <span>PREZZO:</span>
          <span>DESCRIZIONE:</span>
          <span>PERCORSO IMG:</span>
          <span>NOME IMG:</span>
          <span>ESTENSIONE IMG:</span>
        </div> 

        <div class="text_1">
          <span><?php echo $_POST['INFO_ART'][0];?></span>
          <span><?php echo $_POST['INFO_ART'][1];?></span>
          <span><?php echo $_POST['INFO_ART'][2];?></span>
          <span><?php echo $_POST['INFO_ART'][3];?></span>
          <span><?php echo $_POST['INFO_ART'][4];?></span>
          <span style="font-size: 30px"><?php echo $_POST['INFO_ART'][6];?></span>
          <span><?php echo $_POST['INFO_ART'][7];?></span>
          <span><?php echo $_POST['INFO_ART'][8];?></span>
        </div>
        
        <?php
          }else{
        ?> 
        <div class="text_1">
           <span>ID:</span>
          <span>CATEGORIA:</span>
          <span>NOME ART:</span>
          <span>PREZZO:</span>
          <span>DESCRIZIONE:</span>
          <span>PERCORSO IMG:</span>
          <span>NOME IMG:</span>
          <span>ESTENSIONE IMG:</span>
        </div> 
        <?php    
          }
        ?> 
      </div> 
      </div>

     

    </div>

  </body>
</html>    