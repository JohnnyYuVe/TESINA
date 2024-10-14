<?php   
      ini_set('display_errors', 1);
      session_start();
      error_reporting(E_ALL);
      $Path_IMG_FILE="http://localhost/php_program/GameOfHistory/IMG_FILE/";
      $Path_CSS_FILE="http://localhost/php_program/GameOfHistory/CSS_FILE/";
      $Path_PHP_FILE="http://localhost/php_program/GameOfHistory/PHP_FILE/";
      $Path_DDT_FILE="http://localhost/php_program/GameOfHistory/XML_FILE/DTD_SCHEMA";  
      $Path_XML_FILE="http://localhost/php_program/GameOfHistory/XML_FILE/XML";

      Validate_DomDocument();
      Extract_PREFERITO_Info();
     	


/*
             exit(header( $Path));     
*/  
?>  

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>	
			

</head>	


<body>	

<?php  


?>

</body>

</html>	


<?php

function Validate_DomDocument(){
                          
                            $xmlString = ""; 
                            $doc = new DOMDocument();
                             /*variabile di tipo DOMDocument */
                            /* rimuovo dal file utente.xml parti non utili alla parser */   

                               foreach ( file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/PREFERITI.xml') as $node ) {                                  
                                                 $xmlString .= trim($node);
                                }

                            $doc->loadXML($xmlString);

                            //Validazione xml se è conforme con il suo schema   
                                if ( $doc->validate() ) {
                                          echo "<p>This document is valid</p>\n";
                                }else{
                                   echo "<p>This document is not valid</p>\n";
                                }
}

function Extract_Articolo_Info(){

$TEST=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/ARTICOLO.XML") or die("Error: Cannot create object");
$Index_End=$TEST->count();

for($Index_Start=0; $Index_Start<$Index_End; $Index_Start++){
		
		$ART_ID_VALUE	=			$TEST->ARTICOLO["ART_ID"];
		$ART_Categoria_VALUE=		$TEST->ARTICOLO["Categoria"];
		$ART_Nome_VALUE	=			$TEST->ARTICOLO[$Index_Start]->Nome;
		$ART_Prezzo_VALUE	=		$TEST->ARTICOLO[$Index_Start]->Prezzo;
		$ART_Descrizione_VALUE	=	$TEST->ARTICOLO[$Index_Start]->Descrizione;
		$ART_Percorso_VALUE	=		$TEST->ARTICOLO[$Index_Start]->IMG->Percorso;
		$ART_Nome_IMG_VALUE	=		$TEST->ARTICOLO[$Index_Start]->IMG->Nome_IMG;
		$ART_Estensione_VALUE	=	$TEST->ARTICOLO[$Index_Start]->IMG->Estensione;
		$path=						$ART_Percorso_VALUE.$ART_Nome_IMG_VALUE.$ART_Estensione_VALUE;

					echo $TEST->ARTICOLO["ART_ID"]."</br>";
					echo $TEST->ARTICOLO["Categoria"]."</br>";
					echo $TEST->ARTICOLO[$Index_Start]->Nome."</br>";
					echo $TEST->ARTICOLO[$Index_Start]->Prezzo."</br>";			
					echo $TEST->ARTICOLO[$Index_Start]->Descrizione."</br>";
					echo $TEST->ARTICOLO[$Index_Start]->IMG->Percorso."</br>";
					echo $TEST->ARTICOLO[$Index_Start]->IMG->Nome_IMG."</br>";
					echo $TEST->ARTICOLO[$Index_Start]->IMG->Estensione."</br>";	
					echo $path."</br>";
			
}






}



function Count_Record_File($NOME_FILE){

			$DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");
			$Index_End=$DOC->count();
			return $Index_End;
}

function Extract_CART_Info($TEST,$Index_Start){

                      $CART[0]=$TEST->CARRELLO->ART_ID[$Index_Start];
                      $CART[1]=$TEST->CARRELLO->CLI_ID[$Index_Start];

                      return $CART;
}
function Extract_FAV_Info($TEST,$Index_Start){

                      $CART[0]=$TEST->PREFERITI->ART_ID[$Index_Start];
                      $CART[1]=$TEST->PREFERITI->CLI_ID[$Index_Start];

                      return $CART;
}



function Add_Record_To_Articolo($NOME_FILE,$New_Nome,$New_Prezzo,$New_Descrizione,$New_ART_ID,$New_Categoria,$New_Percorso,$New_Nome_IMG,$New_Estensione){

			$DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");

				$RecordADD=$DOC->addChild("ARTICOLO");
				$RecordADD->addAttribute("ART_ID",$New_ART_ID);
				$RecordADD->addAttribute("Categoria",$New_Categoria);
				$RecordADD->addChild("Nome",$New_Nome);
				$RecordADD->addChild("Prezzo",$New_Prezzo);
				$RecordADD->addChild("Descrizione",$New_Descrizione);

				$RecordADD1=$RecordADD->addChild("IMG");
				$RecordADD1->addChild("Percorso",$New_Percorso);
				$RecordADD1->addChild("Nome_IMG",$New_Nome_IMG);
				$RecordADD1->addChild("Estensione",$New_Estensione);

			file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());	
}



function Add_Record_To_Carrello($NOME_FILE,$New_ART_ID_CART,$New_CLI_ID_CART){
			
			$DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");

				$RecordADD=$DOC->addChild("CARRELLO");
				$RecordADD->addChild("ART_ID",$New_ART_ID_CART);
				$RecordADD->addChild("CLI_ID",$New_CLI_ID_CART);

			file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());	
			
}






function Add_Record_To_Preferiti($NOME_FILE,$New_ART_ID_PREF,$New_CLI_ID_PREF){
				$DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");

					$RecordADD=$DOC->addChild("PREFERITO");
					$RecordADD->addChild("ART_ID",$New_ART_ID_PREF);
					$RecordADD->addChild("CLI_ID",$New_CLI_ID_PREF);

				file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());	

}



function Check_User_Email_already_Used($NOME_FILE,$Email_to_Check){
				$DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");
				$J=Count_Record_File($NOME_FILE);
				$I=0;
				while($I<$J){
							$DB_EMAIL=$DOC->Utente->INFO_PERSONA->Email;
							if(!strcmp($Email_to_Check,$DB_EMAIL)){
								return 1;
							}
				}
				return 0;	
}





function Add_Record_To_Storico($NOME_FILE){
$DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");
	$RecordADD=$DOC->addChild("Utente");


file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());
}



function Add_Record_To_MetodoDiPagamento($NOME_FILE){
$DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");
	$RecordADD=$DOC->addChild("Utente");


file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());
}



function Add_Record_To_FAQResponse($NOME_FILE){
$DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");
	$RecordADD=$DOC->addChild("Utente");


file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());
}



function Add_Record_To_FAQRequest($NOME_FILE){
$DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");
	$RecordADD=$DOC->addChild("Utente");

file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());
}











function AddUserTODataBase(){
      $XmlStringUtente = "";

  foreach ( file("UTENTE.xml") as $nodeCart ) {
                                                      $XmlStringUtente .= trim($nodeCart);
  }

$Doc_Utente = new DOMDocument();

  if (!$Doc_Utente->loadXML($XmlStringUtente)) {
                                              die ("ERROR PARSING THIS DOCUMENT\n");
  }

// creazione di un nuovo record per carrello (serve per aggiungere gli articoli scelti dall'utente dentro il suo carrello)
$rootCart = $Doc_Utente->documentElement;
$NewRecordCart = $Doc_Utente->createElement("record");

$NewClient_Nome            =   $Doc_Utente->createElement   ( "ID_CLIENTE",       $_POST["T_Nome"]   );
$NewClient_Cognome         =   $Doc_Utente->createElement   ( "ID_ARTICOLO",      $_POST["T_Cognome"]);
$NewClient_Email           =   $Doc_Utente->createElement   ( "CODICE_ART",       $_POST["T_EMAIL"]  );
$NewClient_Eta             =   $Doc_Utente->createElement   ( "NOME_ARTICOLO",    $_POST["T_Eta"]    );
$NewClient_Sesso           =   $Doc_Utente->createElement   ( "NOME_BRAND",       $_POST["T_Sesso"]  );
  


$New_Record_Client -> appendChild ($NewClient_Nome);
$New_Record_Client -> appendChild ($NewClient_Cognome);
$New_Record_Client -> appendChild ($NewClient_Email   );
$New_Record_Client -> appendChild ($NewClient_Eta     );
$New_Record_Client -> appendChild ($NewClient_Sesso   ); 

$New_Record_Client -> appendChild ($NewClient_Sesso   ); 
$New_Record_Client -> appendChild ($NewClient_Sesso   ); 
$New_Record_Client -> appendChild ($NewClient_Sesso   ); 
$New_Record_Client -> appendChild ("User"); 

/*
echo "\n<br />--- ... ecco fatto ";
echo "\n<br />--- il nuovo record: " . $New_Record_Client->firstChild->textContent;
echo "\n<br />--- " . $New_Record_Client->childNodes->item(1)->textContent;
echo "\n<br />--- " . $New_Record_Client->lastChild->textContent . " ---";
echo "\n</p>";

inserimento del record all'interno del file CARRELLO_DATA.XML
*/

$NewRecordCartCopy=$New_Record_Client->cloneNode(TRUE);
$rootCart->appendChild($NewRecordCartCopy);

}  


function countCLIRecord(){
$DOC=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/ARTICOLO.XML") or die("Error: Cannot create object");
return $Index_End=$DOC->count();

}



?>