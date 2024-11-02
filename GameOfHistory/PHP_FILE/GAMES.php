<?php   
  //FILE QUASI COMPLETO MANCA IL CONTROLLO SULLA EMAIL IN MODO TALE CHE SIA UNICO E SULLA PASSWORD CHE DEVE RISPETTARE ALCUNI CRITERI DI "SICUREZZA"
  ini_set('display_errors', 1);
  session_start();
  error_reporting(E_ALL);
  require_once "funzioni.php";
 
  if(isset($_POST["FAV"]) ){
    if( empty($_POST["ID_art"] ) || empty($_POST["Categoria_art"] ) || empty($_POST["Nome_art"] ) || empty($_POST["Prezzo"]) ){
      echo "<p>CONTENUTO POST VUOTO1</p>";             
    }else{
      if(!empty($_POST["ID_CLI"])){
                
        $DOC_PREF=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/PREFERITI.XML") or die("Error: Cannot create object");
        $DOC_CART=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/CARRELLO.XML") or die("Error: Cannot create object");
        $Index_End_PREF=count($DOC_PREF);
        $Index_End_CART=count($DOC_CART);
        $RESULT_PREF=CheckItemInFAV($DOC_PREF,$Index_End_PREF,$_POST["ID_CLI"],$_POST["ID_art"]);
        $RESULT_CART=CheckItemInCART($DOC_CART,$Index_End_CART,$_POST["ID_CLI"],$_POST["ID_art"]);

        if( $RESULT_CART==0 && $RESULT_PREF==0){
          Add_Record_To_Preferiti("PREFERITI",$_POST["ID_art"],$_POST["ID_CLI"]);                            
        }                             
      }
    }                                           
  }


  if(isset($_POST["CART"]) ){
    if( empty($_POST["ID_art"] ) || empty($_POST["Categoria_art"] ) || empty($_POST["Nome_art"] ) || empty($_POST["Prezzo"]) ){
      echo "<p>CONTENUTO POST VUOTO 2</p>";  
    }else{
      if(!empty($_POST["ID_CLI"])){
        $DOC_PREF=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/PREFERITI.XML") or die("Error: Cannot create object");
        $DOC_CART=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/CARRELLO.XML") or die("Error: Cannot create object");
        $Index_End_PREF=count($DOC_PREF);
        $Index_End_CART=count($DOC_CART);
        $RESULT_PREF=CheckItemInFAV($DOC_PREF,$Index_End_PREF,$_POST["ID_CLI"],$_POST["ID_art"]);
        $RESULT_CART=CheckItemInCART($DOC_CART,$Index_End_CART,$_POST["ID_CLI"],$_POST["ID_art"]);

        if( $RESULT_CART==0 && $RESULT_PREF==0){
                    Add_Record_To_Carrello("CARRELLO",$_POST["ID_art"],$_POST["ID_CLI"]);                            
        }                             
      }    
    }                                         
  }

  if(isset($_POST["APPLICA_FILTRO"]) ){
    ;
    if( isset($_POST["GENERE"])  &&  isset($_POST["TIPOLOGIA_FILTRO"])  ){
        $DOC_ART=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/ARTICOLO.xml') or die("Error: Cannot create object");
        $DOC_ART_SUPP=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/ARTICOLO1.xml') or die("Error: Cannot create object");
        
        if(strlen($_POST["GENERE"])==0  &&  strlen($_POST["TIPOLOGIA_FILTRO"])==0 ){
            $_SESSION["ATTIVA_FILTRO"]=0;
            $_SESSION['INIZIO']=0;
            $_SESSION['FINE']=$_SESSION['INCR'];
        }

         if(strlen($_POST["GENERE"])==0  &&  strlen($_POST["TIPOLOGIA_FILTRO"])!=0 ){
          FILTRA_PER_GENERE($DOC_ART,$DOC_ART_SUPP,$_POST["GENERE"],$_POST["TIPOLOGIA_FILTRO"]); //ESTRAGGO SOLO UN TIPO DI GENERE
          SORT_FILE($DOC_ART_SUPP,$_POST["TIPOLOGIA_FILTRO"]);
            $_SESSION["ATTIVA_FILTRO"]=0;
            $_SESSION['INIZIO']=0;
            $ $_SESSION['FINE']=$F_FILE_Filtrato; 
       }

        if(strlen($_POST["GENERE"])!=0  &&  strlen($_POST["TIPOLOGIA_FILTRO"])!=0 ){
          $F_FILE_Filtrato=FILTRA_PER_GENERE($DOC_ART,$DOC_ART_SUPP,$_POST["GENERE"],$_POST["TIPOLOGIA_FILTRO"]); //ESTRAGGO SOLO UN TIPO DI GENERE
          SORT_FILE($DOC_ART_SUPP,$_POST["TIPOLOGIA_FILTRO"]);
            $_SESSION["ATTIVA_FILTRO"]=1;
            $_SESSION['INIZIO']=0;
            $_SESSION['FINE']=$F_FILE_Filtrato; 
       }

       

        if(strlen($_POST["GENERE"])!=0  &&  strlen($_POST["TIPOLOGIA_FILTRO"])==0 ){
          FILTRA_PER_GENERE($DOC_ART,$DOC_ART_SUPP,$_POST["GENERE"],$_POST["TIPOLOGIA_FILTRO"]); //ESTRAGGO SOLO UN TIPO DI GENERE
            $_SESSION["ATTIVA_FILTRO"]=1;
            $_SESSION['INIZIO']=0;
             $_SESSION['FINE']=$F_FILE_Filtrato; 
       }
    }
}

  if(isset($_POST["Prev"])){
      
    if($_SESSION['INIZIO']-$_SESSION['INCR']>=0){
      $_SESSION['INIZIO']=$_SESSION['INIZIO']-$_SESSION['INCR'];

      if($_SESSION['FINE']==$_SESSION['FINE_FILE']){
      $_SESSION['FINE']=$_SESSION['FINE']-$_SESSION['RESTANTI'];
      }else{
        $_SESSION['FINE']=$_SESSION['FINE']-$_SESSION['INCR']; 
      }  
    }else{
      $_SESSION['INIZIO']=0;
      $_SESSION['FINE']=$_SESSION['INCR'];
       
    }
  }  

  if(isset($_POST["Successivo"])){

    if($_SESSION['FINE']+$_SESSION['INCR']<$_SESSION['FINE_FILE']){
      $_SESSION['INIZIO']=$_SESSION['FINE'];
      $_SESSION['FINE']=$_SESSION['FINE']+$_SESSION['INCR'];
    }else{
       $_SESSION['INIZIO']=$_SESSION['FINE'];
       $_SESSION['FINE']=$_SESSION['FINE_FILE'];
      $_SESSION['RESTANTI']=$_SESSION['FINE_FILE']-$_SESSION['INIZIO'];
    }
  }

  if(!isset($_SESSION["T_ID"]) ){
     $_SESSION['HIDE']=0;
  }else{
   $_SESSION['HIDE']=1;
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
    <link rel="stylesheet" href="http://localhost/php_program/GameOfHistory/CSS_FILE/GAMES_STYLE.css">
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
    
     <div class="Main_Container_Item">
     </div>  

    <div class="BOX_FILTRI">
      
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="CONTAINER_FILTRO">     
                <div class="FILTRO_GENERE">
                    <select name="GENERE" class="custom Font_For_Text">
                        <optgroup label="GENERE">
                            <option value=""></option>
                            <option value="AZIONE">AZIONE</option>
                            <option value="AVVENTURA">AVVENTURA</option>
                            <option value="RACING">RACING</option>
                            <option value="SHOOTERS">SHOOTERS</option>
                            <option value="SIMULATION">SIMULATION</option>
                            <option value="SPORT">SPORT</option>
                            <option value="STRATEGIA">STRATEGIA</option>
                            <option value="ROLE_PLAYING">ROLE PLAYING</option>
                        </optgroup>
                    </select>
                </div>

                <div class="ORDINA_PER">
                    <select name="TIPOLOGIA_FILTRO" class="custom Font_For_Text">
                        <optgroup label="ORDINA">
                            <option value=""></option>
                            <option value="CRESCENTE">PREZZO CRESCENTE</option>
                            <option value="DECRESCENTE">PREZZO DECRESCENTE</option>
                         
                        </optgroup>
                    </select>
                </div>

                <div class="CONTAINER_BUTTON">
                     <button type="submit" name="APPLICA_FILTRO" class="Button_Art Font_For_Text">
                        <span class="material-symbols-outlined Font_For_Text">APPLICA<span>     
                      </button>
                    
                </div>
            </div>
        </form>
      
    </div> 
    
    <div class="Main_Container_Item">
      <?php

      if($_SESSION["ATTIVA_FILTRO"]==0){
        $DOC_ART=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/ARTICOLO.xml") or die("Error: Cannot create object");
        $_SESSION["FINE_FILE"]=count($DOC_ART);
      }else{
        $DOC_ART=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/ARTICOLO1.xml") or die("Error: Cannot create object");
        $_SESSION["FINE_FILE"]=count($DOC_ART);
      }

      
      
      if($_SESSION['INIZIO']==0){
       $visButton1="hidden";
       if($_SESSION['INCR']>$_SESSION["FINE_FILE"]){
          $_SESSION['INCR']=$_SESSION["FINE_FILE"];
       }else{
        $_SESSION['INCR']=10;
       }
       $_SESSION["INDEX_PAGE"]=0;//IN QUALE PAGINA CI TROVIAMO
       $_SESSION['INIZIO']=0; 
       $_SESSION['FINE']= $_SESSION['INCR'];
      }else{
        $visButton1=""; 
      }
      $INT_I=$_SESSION['INIZIO'];
      $INT_F=$_SESSION['FINE'];     
      ?>
      <div class="Box_container">       
        <div class="Disposizione">
          <?php 
            for($INT_I; $INT_I<$INT_F; $INT_I++){
              $ARRAY_ART=Extract_Articolo_Info($DOC_ART, $INT_I);
          ?>
              <!--style="visibility: none; display: none;"-->
              <div class="articolo Font_For_Text">
                <?php 
                  echo'<form action="GAMES.php?id='.$ARRAY_ART[0].'"'.'method="POST" id='. $ARRAY_ART[0] .'>';
                ?>
                <img src='<?php echo  $ARRAY_ART[5]; ?>' alt="Foto articolo"> 
                <p> 
                  Nome_articolo:  <?php echo $ARRAY_ART[2]; ?></br>
                  Prezzo: &#8364; <?php echo $ARRAY_ART[3]; ?></br>
                </p >
                <p class="red">
                  <?php 
                    echo $ARRAY_ART[4];
                  ?>
                </p>                                                 
                <div class="Button_Container">
                  <button type="submit " name="FAV" class="Button_Art Font_For_Text"> 
                    <span class="material-symbols-outlined">favorite</span>      
                  </button>
                  <button type="submit" name="CART" class="Button_Art Font_For_Text" >
                    <span class="material-symbols-outlined">add<span>     
                  </button>
                  <input type="hidden" name="ID_art"         value= "<?php echo $ARRAY_ART[0];?>">
                  <input type="hidden" name="Categoria_art"  value= "<?php echo $ARRAY_ART[1];?>">
                  <input type="hidden" name="Nome_art"       value= "<?php echo $ARRAY_ART[2];?>">
                  <input type="hidden" name="Prezzo"         value= "<?php echo $ARRAY_ART[3];?>">
                  <?php  
                    if($_SESSION["HIDE"]==1){
                      echo '<input type="hidden" name="ID_CLI" value= "'.$_SESSION['T_ID'].'">';
                    }  
                  ?>
                </div>
                <?php  
                 echo'</form>';                                 
                ?>                    
              </div>
              <?php 
            }
            ?>                   
        </div>

        <div Class="ScorriPagina Font_For_Text">
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <button type="submit" name="Prev" class="Button_Art Font_For_Text" <?php  echo $visButton1; ?>>
              <span class="material-symbols-outlined Font_For_Text ">Prev Page<span>     
            </button> 
            <?php 
              if($_SESSION['FINE']==$_SESSION['FINE_FILE']){
                $visButton2="hidden";
              }else{
                 $visButton2=""; 
              }  
            ?>
            <button type="submit" name="Successivo" class="Button_Art Font_For_Text" <?php  echo $visButton2; ?>>
              <span class="material-symbols-outlined Font_For_Text">Next Page<span>     
            </button>   
          </form>  
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
