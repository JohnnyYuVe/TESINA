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
              session_start();





/*
              



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

function InizializzazioneFile()
{
	// code...
}
/* 
creazione/caricamento/validazione documento
*/
$xmlString = ""; 
$FirstRecordToVisit = 0;
$LastRecordToVisit  = 1;
$doc = new DOMDocument(); /*variabile di tipo DOMDocument */
/* rimuovo dal file utente.xml parti non utili alla parser */		
		foreach ( file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/UTENTE.XML') as $node ) {
											$xmlString .= trim($node);
		}
$doc->loadXML($xmlString);
//Validazione xml se è conforme con il suo schema		
		if ( $doc->validate() ) {
  						echo "<p>This document is valid</p>\n";
		}else{
  		 echo "<p>This document is not valid</p>\n";
		}



/* 
in questo modo mi posiziono dentro il record dove sono contenuti gli elementi del record
ovvero
-nome
-cognome
-...
*/
$RecordsHolder=$doc->documentElement->childNodes; 

/*
	for( $i = $FirstRecordToVisit; $i<$LastRecordToVisit; $i++ ){

con la funzione item() scorro i record contenuti nella radice ovvero RECORD_UTENTE che è la radice del file utente.xml


		$Record_Visited=$RecordsHolder->item($i);

		$Record_Item_Idex=$Record_Visited->firstChild;

		$a=$doc->getElementbytagname("a");
	    echo $doc->getAttribute("ID_Persona");
		echo $doc->getAttribute('Privieggio');

	}	
*/

echo "hello</br>";
$TEST=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/UTENTE.XML") or die("Error: Cannot create object");

$Index_End=$TEST->count();
echo $Index_End ."</br></br>";

//qui ho usato simpleXML in quanto è più facile per visitare gli elementi/attributi di un record;

for($Index_Start=0; $Index_Start<$Index_End; $Index_Start++){
			
			$ID_PERSONA_VALUE=$TEST->Utente[$Index_Start]->INFO_PERSONA["ID_Persona"];

			echo "valore strcmp(".$Index_Start."):".strcmp($ID_PERSONA_VALUE,"uno1")."</br>"."</br>";

			if(!strcmp($ID_PERSONA_VALUE,"Uno1") ){
					echo $TEST->Utente["Privieggio"]."</br>";
					echo $TEST->Utente[$Index_Start]->INFO_PERSONA["ID_Persona"]."</br>";
					echo $TEST->Utente[$Index_Start]->INFO_PERSONA->Nome."</br>";
					echo $TEST->Utente[$Index_Start]->INFO_PERSONA->Cognome."</br>";
					echo $TEST->Utente[$Index_Start]->INFO_PERSONA->Email."</br>";
					echo $TEST->Utente[$Index_Start]->INFO_PERSONA->Eta."</br>";
					echo $TEST->Utente[$Index_Start]->INFO_PERSONA->Sesso."</br>";
					echo $TEST->Utente[$Index_Start]->Data_Registrazione."</br>";
					echo $TEST->Utente[$Index_Start]->Punti_History."</br>";
					echo $TEST->Utente[$Index_Start]->Membership."</br>";
			}
}				
?>