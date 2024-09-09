<?php   
      ini_set('display_errors', 1);
      error_reporting(E_ALL);

        $percorso=dirname($_SERVER['PHP_SELF']);
        $Path="Location: ". $percorso ."/MAIN.php";

    if( isset($_POST['LOG_IN']) ){       
        if(empty($_POST['T_EMAIL']) || empty($_POST['T_PASS']) ){
              echo "<p>dati mancanti!!!</p>"; 
        }else{
              echo "<p> controllo avvenuto</p>";
              echo "<p>Inserimento dati nella sessione</p>";
              





/*
              session_start();



              $_SESSION['ID']=  ;
              $_SESSION['Nome']=;
              $_SESSION['Cognome']=;
              $_SESSION['Email']=;
              $_SESSION['Password']=;
              $_SESSION['Sesso']=;
                        
             exit(header( $Path));     
*/  
        }
    }

?>  

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>	
			

</head>	


<body>	
	
</body>

</html>	


<?php
$xmlString = "";
$doc = new DOMDocument();	
		
		foreach ( file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/UTENTE.XML') as $node ) {
											$xmlString .= trim($node);
		}

$doc->loadXML($xmlString);
		
		if ( $doc->validate() ) {
  						echo "<p>This document is valid</p>\n";
		}else{
  		 echo "<p>This document is not valid</p>\n";
		}



?>