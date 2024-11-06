<?php
    //FILE QUASI COMPLETATO MANCA IL REINDIRIZZAMENTO ALLA PAGINA PER EDITARE ALCUNI DATI DEL PROPRIO PROFILO.
    ini_set('display_errors', 1);
    session_start();
    error_reporting(E_ALL);
    require_once "funzioni.php";
    $DOC_CART=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/CARRELLO.xml") or die("Error: Cannot create object");
    $DOC_USER=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/UTENTE.xml") or die("Error: Cannot create object");
    $Index_End=count($DOC_CART);
    $I_END_USER=count($DOC_USER);
    $percorso=dirname($_SERVER['PHP_SELF']);
    $Path1="Location: ". $percorso ."/MAIN.php";

    if(isset($_POST['PAGA']) ){
        if(isset($_POST['PT_FEDELTA']) ){
           for ($I=0; $I <$I_END_USER ; $I++) { 
                 $ARR_USER=Extract_USER_Info($DOC_USER,$I);
                 
                 if(strcmp($_SESSION["T_ID"],$ARR_USER[1])==0){
                    $PT_HISTORY=$ARR_USER[9];
                    $PT_IN_EURO=((int)$PT_HISTORY*4)/10;

                    $sconto_CON_punti=(int)$_POST['SPESA']-$PT_IN_EURO;

                    if($sconto_CON_punti<0){

                        $PT_HISTORY=(($sconto_CON_punti*10)/4)*(-1);
                        EDIT_PT_HISTORY_UTENTE($DOC_USER,"UTENTE",$PT_HISTORY,$I);
                         $_SESSION['T_PUNTI']=$PT_HISTORY;
                    }else{
                         $_SESSION["RESTANTE"]=$sconto_CON_punti;
                    }
                 }

            } 
           
        }
      
        ADD_TO_STORICO($DOC_CART,$_SESSION['T_ID']);
        ADD_PUNTI_FEDELTA($DOC_USER,$_SESSION['T_ID'] ,(int)$_POST['SPESA']);   
        
   
           unset($DOC_CART->CARRELLO);
            file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/CARRELLO.xml', $DOC_CART->asXML());
         
          
      exit(header($Path1));
    }



    if(!isset($_SESSION["T_ID"]) ){
        $_SESSION['HIDE']=0;
    }else{
       $_SESSION['HIDE']=1;
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
    <link rel="stylesheet" href="http://localhost/php_program/GameOfHistory/CSS_FILE/CHECKOUT_STYLE.css">
  </head> 
<body>
        <?php             
             $DOC_CART=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/CARRELLO.xml") or die("Error: Cannot create object");
             $DOC_ART=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/ARTICOLO1.xml") or die("Error: Cannot create object");
             $DOC_USER=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/UTENTE.xml") or die("Error: Cannot create object");
            $Prezzo=Extract_Prezzo_Finale($DOC_CART,$DOC_ART);
             
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

      </div>    
    </div>      


    <div class="Container_Infomazioni">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">       
           
           <h1 class="Testo_align Dim_testo text_color">INDIRIZZO DI SPEDIZIONE</h1>
           <div class="Container_Indirizzo Container_DIM">            
                <p class="Font_For_Text text_color Dim_testo2">
                    <?php    
                        echo"Paese: "."N/A" ."</br>";
                        echo"Citta: "."N/A" ."</br>";
                        echo"Provincia: "."N/A" ."</br>";
                        echo"Cap: "."N/A" ."</br>";
                        echo"Via: "."N/A" ."</br>";
                        echo"Num: "."N/A" ."</br>";
                    ?>    
                </p>  
            </div> 


            <h1 class="Testo_align Dim_testo text_color">METODO DI PAGAMENTO</h1>
            <div class="Container_Metodo_pagamento Container_DIM">
                <p class="Font_For_Text text_color Dim_testo2">
                    <?php 
                        echo"Numero della carta: ". "XXXX-XXXX-XXXX-XXXX"."</br>";
                        echo"Nome sulla carta: "."N/A"."</br>";               
                        echo"data di scadenza: ". "N/A"."</br>";
                        echo"codice di sicurezza: ". "XXX"."</br>";
                     ?>
                </p>
            </div>

            <h1 class="Testo_align Dim_testo text_color">USA BUONI O CODICI PROMO</h1>
            <div class="Container_usa_discont Container_DIM">
                <p class="Font_For_Text text_color Dim_testo2">
                    <input type="checkbox" class="" Name="PT_FEDELTA" value=""> <span>Usa punti Fedelta:<?php echo $_SESSION['T_PUNTI']?> PT;</span></br>
                     <input  type="hidden"   name="SPESA"       value="<?php echo $Prezzo;?>" >
                </p>
            </div>

            <div class="Buttons_Conteiner_form ">
                <div class="BUTTON_Conteiner ">
                    <button type="submit" name="PAGA" class="BUTTON_PAGA Font_For_Text" >
                        <span>PAGA <?php if(isset($_SESSION["RESTANTE"])){echo $_SESSION["RESTANTE"];}else{echo $Prezzo;} ?>&#8364;</span>
                    </button>
                    <button type="button" name="ANNULLA" class="BUTTON_PAGA Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/CARRELLO.php'">
                        <span>Torna indietro</span>
                    </button>
                </div>
            </div>

           </div> 
        </form>
    </div>  

</body>


</html>
<?php
function Extract_Prezzo_Finale($DOC_CART,$DOC_ART){
    $F_INDEX_CART=count($DOC_CART);
    $F_INDEX_ART=count($DOC_ART);
    $Prezzo_Finale=0;

    for ($I=0; $I < $F_INDEX_CART; $I++) { 
        $ARR_CART=Extract_CART_Info($DOC_CART,$I);

        for ($J=0; $J <$F_INDEX_ART ; $J++) { 
            $ARR_ART=Extract_Articolo_Info($DOC_ART,$J);
            if(strcmp($ARR_CART[0],$ARR_ART[0])==0 && strcmp($ARR_CART[1],$_SESSION['T_ID'])==0 ){
                
               (double)$Prezzo_Finale=(double)$Prezzo_Finale+(double)$ARR_ART[3]; 
            }
        }
    }    


 return $Prezzo_Finale;   
}
?>