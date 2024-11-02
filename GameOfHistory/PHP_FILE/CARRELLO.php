<?php
  //FILE QUASI COMPLETATO MANCA IL REINDIRIZZAMENTO ALLA PAGINA PER EDITARE ALCUNI DATI DEL PROPRIO PROFILO.
  ini_set('display_errors', 1);
  session_start();
  error_reporting(E_ALL);
  require_once "funzioni.php";
  $DOC_CART=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/CARRELLO.xml") or die("Error: Cannot create object");
  $DOC_PREF=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/PREFERITI.xml") or die("Error: Cannot create object");
  $I_END_CART=count($DOC_PREF);
  $I_END_PREF=count($DOC_CART);

  if(isset($_POST["PAGA"]) ){
    
    if($I_END_CART==0){
      echo"<p>IL TUO CARRELLO è VUOTO</br></p>";
    }else{
      header("Location:CHECKOUT.php");
    }   
  }

  if(isset($_POST["later"]) ){  
    if(strlen( $_POST["ID_ART"] )==0){
      
    }else{  
          
      for($Index_Start=0;$Index_Start<$I_END_CART;$Index_Start++){
        $ARR_CART=Extract_CART_Info($DOC_CART,$Index_Start);
      
        if(strcmp($_SESSION['T_ID'],$ARR_CART[1])==0 && strcmp($_POST["ID_ART"],$ARR_CART[0])==0){              
          Add_Record_To_Preferiti("PREFERITI", $_POST['ID_ART'], $_SESSION['T_ID']);            
          unset($DOC_CART->CARRELLO[intval($Index_Start)]);
          file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/CARRELLO.xml', $DOC_CART->asXML()); 
          $Index_Start=$I_END_CART;
        } 
      }    
    }
  }

 
if(isset($_POST["MOVE_TO_CART"]) ){
  if(strlen( $_POST["ID_ART"] )==0){
  
  }else{  
   
    for($Index_Start=0; $Index_Start<$I_END_PREF; $Index_Start++){  
      $ARR_PREF=Extract_FAV_Info($DOC_PREF,$Index_Start);

      if(strcmp($_SESSION['T_ID'],$ARR_PREF[1])==0 && strcmp($_POST["ID_ART"],$ARR_PREF[0])==0){
      echo"<p>";
      echo "_SESSION['T_ID']:".$_SESSION['T_ID']."";
      echo"</p>";
        Add_Record_To_Carrello("CARRELLO", $_POST['ID_ART'], $_SESSION['T_ID']);  
        unset( $DOC_PREF->PREFERITO[intval($Index_Start)] );
        file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/PREFERITI.xml', $DOC_PREF->asXML());
        $Index_Start=$I_END_PREF;
       
      }
    }
     
  }
}

if(!isset($_SESSION["T_ID"]) ){
     $_SESSION['HIDE']=0;// nascondi
  }else{
   $_SESSION['HIDE']=1;// mostra
  }
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <head>     
    <title>GameOFHistory</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/php_program/GameOfHistory/CSS_FILE/CARRELLO_STYLE.css">
  </head> 

  <body>     
  <?php 
    $DOC_ART=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/ARTICOLO.xml") or die("Error: Cannot create object");
    $DOC_CART=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/CARRELLO.xml") or die("Error: Cannot create object");
    $DOC_PREF=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/PREFERITI.xml") or die("Error: Cannot create object");
    $S=count($DOC_ART);
    echo"_SESSION[T_ID]:".$_SESSION["T_ID"];
  ?>

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

  <div class="Section_cart">

    <h1 class="Font_For_Text">Il tuo carrello</h1>
    <div class="blocco_ART">
      <?php 
         
        $F=count($DOC_CART);
        
                               
        if($F==0){
          echo"CARRELLO vuoto";
        }else{
          for($I=0; $I<$F; $I++){
            $ARRAY_CART=Extract_CART_Info($DOC_CART,$I);
            for($J=0;$J<$S; $J++){
              $ARRAY_ART=Extract_Articolo_Info($DOC_ART,$J);
              if(strcmp($ARRAY_ART[0],$ARRAY_CART[0])==0 && strcmp($ARRAY_CART[1],$_SESSION['T_ID'])==0 ){
      ?>
      <div class="Articolo_CART text_Art">                                                                                                                                    
          <div class="align">
            <img src='<?php echo $ARRAY_ART[5]; ?>' alt="Foto articolo">     
                      
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <p class="Font_For_Text text_color"> 
                  <span class="Font_For_Name">                    <?php echo $ARRAY_ART[2];   ?></span></br>
                  <span class="Font_For_Prezzo">  Prezzo: &#8364; <?php echo $ARRAY_ART[3];   ?></span></br>
                  <span class="Font_For_Name">                    <?php echo $ARRAY_ART[0];   ?></span></br>
                  <span class="Font_For_Name">    Posizione:      <?php echo $I;   ?></span></br>
                                                                                                                                                                    
                  <input  type="hidden"   name="ID_ART"       value="<?php echo $ARRAY_ART[0];?>" >
                  <button type="submit"   name="later"     class=" Font_For_Text">
                    <span>salva per dopo</span>
                  </button>
                </p>
              </form>
          </div>
            
        <?php 
                break; 
              }

            }
        ?>                                                   
      </div>
                                     
      <?php
          }
        }         
      ?> 
      <div class="blocco_CONFERMA">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="BUTTON_Conteiner ">
            <button type="submit" name="PAGA" class="BUTTON_PAGA Font_For_Text" >
              <span>PAGA</span>
            </button>
            <button type="button" name="ANNULLA" class="BUTTON_ANNULLA Font_For_Text" onclick="location.href='MAIN.php'">
              <span>ANNULLA</span>
            </button>
          </div>
        </form> 
      </div>                     
    </div>      
  </div>
  
  <div class="Section_Preferiti ">
    <h1 class="Font_For_Text"> i tuoi preferiti</h1>
      <div class="align_Pref_art">
    <?php
      
      $F=count($DOC_PREF);
      
      if($F==0){
          echo"Nessun articolo nei preferiti";
        }else{
          for($I=0; $I<$F; $I++){
            $ARRAY_PREF=Extract_FAV_Info($DOC_PREF,$I);
            for($J=0;$J<$S; $J++){
              $ARRAY_ART=Extract_Articolo_Info($DOC_ART,$J);
              if(strcmp($ARRAY_ART[0],$ARRAY_PREF[0])==0 && strcmp($ARRAY_PREF[1],$_SESSION['T_ID'])==0 ){
    ?>      
          <div class="articolo_PREF Font_For_Text">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">    
              <img src='<?php echo  $ARRAY_ART[5]; ?>' alt="Foto articolo">     
               
                <p class="text_color">
                  Nome_articolo:  <?php echo $ARRAY_ART[2]; ?></br>
                  Prezzo: &#8364; <?php echo $ARRAY_ART[3]; ?></br>
                  <span class="Font_For_Name">                    <?php echo $ARRAY_ART[2];           ?></span></br>
                  <span class="Font_For_Prezzo">  Prezzo: &#8364; <?php echo $ARRAY_ART[3];           ?></span></br>
                  <span class="Font_For_Name">                    <?php echo $ARRAY_ART[0];           ?></span></br>
                  
                  <input  type="hidden"  name="ID_ART"     value="<?php echo strval($ARRAY_ART[0] );  ?>">                                
                </p>
                
                <div class="BUTTON_Conteiner ">
                 <button type="submit" name="MOVE_TO_CART" class=" Font_For_Text">
                    <span>Sposta nel carrello</span>
                  </button>                             
                </div>
              </form>                                            
          </div>
          <?php      
            }
          }          
        }
      }
    ?>
    </div>         
  </div> 

  </body>   
</html>

         









<script>
  var prevScrollpos = window.pageYOffset;
  window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.getElementById("nav_hide").style.top = "0";
    } else {
      document.getElementById("nav_hide").style.top = "-150px";
    }
    prevScrollpos = currentScrollPos;
  }
  /* il menu viene nascosto quando si scende giù nella pagina*/
</script>




