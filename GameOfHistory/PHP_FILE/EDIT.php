<?php   
  //FILE QUASI COMPLETO MANCA IL CONTROLLO SULLA EMAIL IN MODO TALE CHE SIA UNICO E SULLA PASSWORD CHE DEVE RISPETTARE ALCUNI CRITERI DI "SICUREZZA"
  ini_set('display_errors', 1);
  session_start();
  error_reporting(E_ALL);
  require_once "funzioni.php";
  
  $DOC_ART= $DOC_ART=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/ARTICOLO.xml') or die("Error: Cannot create object");
  $NOME_FILE="ARTICOLO";

  if (isset($_POST["OFF"])) {
    EDIT_HIDE_ARTICOLO($DOC_ART,$NOME_FILE,"0",(int)$_POST['INDEX']);
  }

  if (isset($_POST["ON"])) {
    EDIT_HIDE_ARTICOLO($DOC_ART,$NOME_FILE,"1",(int)$_POST['INDEX']);
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
    <link rel="stylesheet" href="http://localhost/php_program/GameOfHistory/CSS_FILE/EDIT_STYLE.css">
  </head> 

  <body>

    <div class="Container_section">
      
        <div Class="navigation_bar" id="nav_hide">
         
        <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='EDIT_ART.php' "> 
          <span class="material-symbols-outlined">home</span>EDIT ART  
        </button>

        <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='EDIT_USER.php' ">
        <span class="material-symbols-outlined">sports_esports</span> EDIT USER INFO                                 
        </button>
        
        <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='LOG-OUT.php' "> 
          <span class="material-symbols-outlined">logout</span>logout   
        </button>

      </div>    
    </div>

    <div class="Main_Container_Item">
    
      <div class="Box_container">       
        <div class="Disposizione">
          <?php 
            $DOC_ART=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/ARTICOLO.XML") or die("Error: Cannot create object");
            $INT_F=count($DOC_ART);
            for($INT_I=0; $INT_I<$INT_F; $INT_I++){
              $ARRAY_ART=Extract_Articolo_Info($DOC_ART, $INT_I);
              
              if((int)$ARRAY_ART[9]==1){
          ?>
              <div class="articolo Font_For_Text">
              <?php   
              }else{
              ?>
              <div class="articolo1 Font_For_Text">
                <?php   
                }
                ?>
                  <?php 
                    echo'<form action="TEST.php?id='.$ARRAY_ART[0].'"'.'method="POST" id='. $ARRAY_ART[0] .'>';
                  ?>
                  <img src='<?php echo  $ARRAY_ART[5]; ?>' alt="Foto articolo"> 
                  <p>
                    CATEGORIA:<?php echo $ARRAY_ART[1]; ?></br>
                    ID_ART:<?php echo $ARRAY_ART[1]; ?></br>
                    Nome_articolo:  <?php echo $ARRAY_ART[2]; ?></br>
                    Prezzo: &#8364; <?php echo $ARRAY_ART[3]; ?></br>
                    HIDE: <?php echo $ARRAY_ART[9]; ?>
                     Index: <?php echo $INT_I; ?>
                  </p >
                  <p class="red">
                    <?php 
                      echo $ARRAY_ART[4];
                    ?>
                  </p>                                                 
                  <div class="Button_Container">
                    <button type="submit " name="OFF" class="Button_Art Font_For_Text"> 
                      <span class="material-symbols-outlined">visibility_off</span>     
                    </button>
                    <button type="submit" name="ON" class="Button_Art Font_For_Text" >
                      <span class="material-symbols-outlined">visibility</span>     
                    </button>
                    <input type="hidden" name="ID_art"         value= "<?php echo $ARRAY_ART[0];?>">
                    <input type="hidden" name="Categoria_art"  value= "<?php echo $ARRAY_ART[1];?>">
                    <input type="hidden" name="Nome_art"       value= "<?php echo $ARRAY_ART[2];?>">
                    <input type="hidden" name="Prezzo"         value= "<?php echo $ARRAY_ART[3];?>">
                    <input type="hidden" name="INDEX"          value= "<?php echo $INT_I;?>">
                    </form>
                </div>
                               
              </div>
              <?php 
            }
            ?>                   
        </div>

      </div>     
    </div>


  </body>
</html>


<script>
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function(){
    var currentScrollPos = window.pageYOffset;
      if(prevScrollpos > currentScrollPos) {
        document.getElementById("nav_hide").style.top = "0";
      }else{
      document.getElementById("nav_hide").style.top = "-150px";
      }
    prevScrollpos = currentScrollPos;
  }
  /* il menu viene nascosto quando si scende giù nella pagina*/
</script>
