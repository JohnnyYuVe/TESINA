<?php
function Extract_Articolo_Info($DOC,$Index_Start){
  $Array[0]=strval($DOC->ARTICOLO[$Index_Start]["ART_ID"]);
  $Array[1]=strval($DOC->ARTICOLO[$Index_Start]["Categoria"]);
  $Array[9]=strval($DOC->ARTICOLO[$Index_Start]["HIDE"]);
  $Array[2]=strval($DOC->ARTICOLO[$Index_Start]->Nome);
  $Array[3]=strval($DOC->ARTICOLO[$Index_Start]->Prezzo);
  $Array[4]=strval($DOC->ARTICOLO[$Index_Start]->Descrizione);
  $Array[6]=$ART_Percorso_VALUE=    strval($DOC->ARTICOLO[$Index_Start]->IMG->Percorso);
  $Array[7]=$ART_Nome_IMG_VALUE=    strval($DOC->ARTICOLO[$Index_Start]->IMG->Nome_IMG);
  $Array[8]= $ART_Estensione_VALUE= strval($DOC->ARTICOLO[$Index_Start]->IMG->Estensione);
  $Array[5]=strval($ART_Percorso_VALUE.$ART_Nome_IMG_VALUE.$ART_Estensione_VALUE);

  return $Array;       
}

function Extract_Utente_Info($Pass,$Email,){

  $DOC=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/UTENTE.xml") or die("Error: Cannot create object");
  $I_END=count($DOC);
  
  for($I_START=0; $I_START<$I_END; $I_START++){
    $ARR_USER=Extract_USER_Info($DOC,$I_START);
    if(strcmp($ARR_USER[4],$Email)==0 && strcmp($ARR_USER[7],$Pass)==0){     
      $_SESSION['T_PRIVILEGGIO']=          strval($ARR_USER[0]);
      $_SESSION['T_ID']=                   strval($ARR_USER[1]);
      $_SESSION['T_NOME']=                 strval($ARR_USER[2]);
      $_SESSION['T_COGNOME']=              strval($ARR_USER[3]);
      $_SESSION['T_EMAIL']=                strval($ARR_USER[4]);
      $_SESSION['T_ETA']=                  strval($ARR_USER[5]);
      $_SESSION['T_SESSO']=                strval($ARR_USER[6]);
      $_SESSION['T_PASS']=                 strval($ARR_USER[7]);
      $_SESSION['T_DATA_REGISTRAZIONE']=   strval($ARR_USER[8]);
      $_SESSION['T_PUNTI']=                strval($ARR_USER[9]);
      $_SESSION['T_MEMBERSHIP']=           strval($ARR_USER[10]);
      return 0;
    }
  }
  return 1;
}

function Extract_USER_Info($DOC,$INDEX){
  $ARR_USER=array();
  $ARR_USER[0]= $DOC->Utente[$INDEX]["Privieggio"];
  $ARR_USER[1]= $DOC->Utente[$INDEX]->INFO_PERSONA["ID_Persona"];
  $ARR_USER[2]= $DOC->Utente[$INDEX]->INFO_PERSONA->Nome;
  $ARR_USER[3]= $DOC->Utente[$INDEX]->INFO_PERSONA->Cognome;
  $ARR_USER[4]= $DOC->Utente[$INDEX]->INFO_PERSONA->Email;
  $ARR_USER[5]= $DOC->Utente[$INDEX]->INFO_PERSONA->Eta;
  $ARR_USER[6]= $DOC->Utente[$INDEX]->INFO_PERSONA->Sesso;
  $ARR_USER[7]= $DOC->Utente[$INDEX]->INFO_PERSONA->Password;
  $ARR_USER[8]= $DOC->Utente[$INDEX]->Data_Registrazione;
  $ARR_USER[9]= $DOC->Utente[$INDEX]->Punti_History;
  $ARR_USER[10]= $DOC->Utente[$INDEX]->Membership;
  return $ARR_USER;
}

function Extract_CART_Info($DOC,$Index_Start){
  $CART=array();
  $CART[0]=strval($DOC->CARRELLO[$Index_Start]->ART_ID);
  $CART[1]=strval($DOC->CARRELLO[$Index_Start]->CLI_ID);
  return $CART;
}

function Extract_FAV_Info($DOC,$Index_Start){
  $FAV=array();
  $FAV[0]=strval($DOC->PREFERITO[$Index_Start]->ART_ID);
  $FAV[1]=strval($DOC->PREFERITO[$Index_Start]->CLI_ID);
  return $FAV;
}

function Extract_Prezzo_BY_ID($Art_inf){
  $DOC_Art=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/ARTICOLO.xml") or die("Error: Cannot create object");
  $Index_End=$DOC_Art->count();
  for($Index_Start=0; $Index_Start<$Index_End; $Index_Start++){
    $arr_sup=Extract_Articolo_Info( $DOC_Art,$Index_Start);
    if(strcmp($Art_inf,$arr_sup[0])==0){
      return (int)$arr_sup[3];  
    }
  }                    
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

function Add_Record_To_Storico($NOME_FILE,$NEW_ART_ID, $NEW_CLI_ID ,$NEW_DATA){
  $DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");
  
  $RecordADD=$DOC->addChild("ACQUISTO");
  $RecordADD->addChild("ID_CLIENTE",$NEW_CLI_ID);
  $RecordADD->addChild("ID_ARTICOLO",$NEW_ART_ID);
  $RecordADD->addChild("DATA_ACQUISTO",$NEW_DATA);

  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());
}

function Add_Record_To_MetodoDiPagamento($NOME_FILE){
  $DOC=simplexml_load_file('http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/'.$NOME_FILE.'.xml') or die("Error: Cannot create object");
  $RecordADD=$DOC->addChild("Utente");
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());
}

function  EDIT_ID_ARTICOLO($DOC,$NOME_FILE,$VALUE,$INDEX){
    $DOC->ARTICOLO[$INDEX]["ART_ID"]=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
}

function  EDIT_HIDE_ARTICOLO($DOC,$NOME_FILE,$VALUE,$INDEX){
    $DOC->ARTICOLO[$INDEX]["HIDE"]=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
}

function  EDIT_CATEGORIA_ARTICOLO($DOC,$NOME_FILE,$VALUE,$INDEX){
    $DOC->ARTICOLO[$INDEX]["Categoria"]=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
} 
function  EDIT_NOME_ARTICOLO($DOC,$NOME_FILE,$VALUE,$INDEX){
    $DOC->ARTICOLO[$INDEX]->Nome=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
} 
function  EDIT_PREZZO_ARTICOLO($DOC,$NOME_FILE,$VALUE,$INDEX){
    $DOC->ARTICOLO[$INDEX]->Prezzo=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
}
function  EDIT_DESCRIZIONE_ARTICOLO($DOC,$NOME_FILE,$VALUE,$INDEX){
    $DOC->ARTICOLO[$INDEX]->Descrizione=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
} 
function  EDIT_PERCORSO_ARTICOLO($DOC,$NOME_FILE,$VALUE,$INDEX){
    $DOC->ARTICOLO[$INDEX]->IMG->Percorso=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
} 
function  EDIT_IMG_ARTICOLO($DOC,$NOME_FILE,$VALUE,$INDEX){
    $DOC->ARTICOLO[$INDEX]->IMG->Nome_IMG=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
}

function  EDIT_ESTENSIONE_ARTICOLO($DOC,$NOME_FILE,$VALUE,$INDEX){
    $DOC->ARTICOLO[$INDEX]->IMG->Estensione=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
} 
function EDIT_PRIV_UTENTE($DOC,$NOME_FILE,$VALUE,$INDEX){
  $DOC->Utente[$INDEX]["Privieggio"]=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());     
}

function EDIT_NOME_UTENTE($DOC,$NOME_FILE,$VALUE,$INDEX){
  $DOC->Utente[$INDEX]->INFO_PERSONA->Nome=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());     
}

function EDIT_COGNOME_UTENTE($DOC,$NOME_FILE,$VALUE,$INDEX){
    $DOC->Utente[$INDEX]->INFO_PERSONA->Cognome=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
}

function EDIT_SEX_UTENTE($DOC,$NOME_FILE,$VALUE,$INDEX){
   $DOC->Utente[$INDEX]->INFO_PERSONA->Sesso=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
}

function EDIT_EMAIL_UTENTE($DOC,$NOME_FILE,$VALUE,$INDEX){
    $DOC->Utente[$INDEX]->INFO_PERSONA->Email=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
}

function EDIT_ETA_UTENTE($DOC,$NOME_FILE,$VALUE,$INDEX){
    $DOC->Utente[$INDEX]->INFO_PERSONA->Eta=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
}

function EDIT_PASSWORD_UTENTE($DOC,$NOME_FILE,$VALUE,$INDEX){
    $DOC->Utente[$INDEX]->INFO_PERSONA->Password=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
}

function EDIT_MEMBERSHIP_UTENTE($DOC,$NOME_FILE,$VALUE,$INDEX){
  $DOC->Utente[$INDEX]->Membership=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
}

function EDIT_PT_HISTORY_UTENTE($DOC,$NOME_FILE,$VALUE,$INDEX){
  $DOC->Utente[$INDEX]->Punti_History=$VALUE;
  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$NOME_FILE.'.xml', $DOC->asXML());  
}

function CalcolaPrezzo(){
  $DOC_PREF=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/ARTICOLO.xml") or die("Error: Cannot create object");
  $Index_End=$DOC_PREF->count();
  $Arr_art=array();
  $Count=count($_SESSION['ART_ID_DA_PAGARE']);
                      
  for($Index_Start=0;$Index_Start<$Index_End;$Index_Start++){
    $Arr_art=Extract_Articolo_Info($TEST,$Index_Start);
      if($_SESSION['ART_ID_DA_PAGARE'][$Count]==$Arr_art[0]){                      
        $Somma= $Somma+$Arr_art[3];
      }
  }
  return $Somma;                      
}

function CheckItemInFAV($DOC,$Index_End,$ID_CLI, $ID_art ){
        
  for( $Index_Start=0; $Index_Start<$Index_End; $Index_Start++){

    $INFO_DOC_ART=$DOC->PREFERITO[$Index_Start]->ART_ID;
    $INFO_DOC_CLI=$DOC->PREFERITO[$Index_Start]->CLI_ID;              
    $str1=strval($INFO_DOC_CLI);
    $str3=strval($ID_CLI);
    $str2=strval($INFO_DOC_ART);              
    $str4=strval($ID_art);  
    if(strcmp($str1,$str3)==0 && strcmp($str2 ,$str4)==0){
      return 1; //lo trova E NON VA AGGIUNTO AL FILE PREFERITI
    }

  }
  return 0;//non lo trova E VA AGGIUNTO AL FILE PREFERITI
}

function CheckItemInCART($DOC,$Index_End,$ID_CLI, $ID_art ){
  for( $Index_Start=0; $Index_Start<$Index_End; $Index_Start++){

    $INFO_DOC_ART=$DOC->CARRELLO[$Index_Start]->ART_ID;
    $INFO_DOC_CLI=$DOC->CARRELLO[$Index_Start]->CLI_ID;
              
    $str1=strval($INFO_DOC_CLI);
    $str3=strval($ID_CLI);
    $str2=strval($INFO_DOC_ART);              
    $str4=strval($ID_art);  

    if(strcmp($str1,$str3)==0 && strcmp($str2 ,$str4)==0){
      return 1; //lo trova E NON VA AGGIUNTO AL FILE PREFERITI
    }

  }
  return 0;//non lo trova E VA AGGIUNTO AL FILE PREFERITI
}



function Check_User_Email_already_Used($DOC,$Email_to_Check){  
  $J=count($DOC);
  $I=0;
  while($I<$J){
    $DB_EMAIL=$DOC->Utente[$I]->INFO_PERSONA->Email;  
    if(strcmp($Email_to_Check,$DB_EMAIL)==0){     
      return 1;
    }
    $I++;
  }
  return 0; 
}

function Add_Record_To_Utente($DOC,$ARR_USER){
       
          $RecordADD=$DOC->addChild("Utente");
          $RecordADD->addAttribute("Privieggio","CLIENTE");

          $RecordADD1=$RecordADD->addChild("INFO_PERSONA");
          $RecordADD1->addAttribute("ID_Persona",$ARR_USER[0]);
          $RecordADD1->addChild("Nome",$ARR_USER[1]);
          $RecordADD1->addChild("Cognome",$ARR_USER[2]);
          $RecordADD1->addChild("Eta",$ARR_USER[5]);
          $RecordADD1->addChild("Email",$ARR_USER[3]);
          $RecordADD1->addChild("Password",$ARR_USER[4]);
          $RecordADD1->addChild("Sesso",$ARR_USER[6]);

          $RecordADD->addChild("Data_Registrazione",$ARR_USER[7]);
          $RecordADD->addChild("Punti_History",$ARR_USER[8]);
          $RecordADD->addChild("Membership",$ARR_USER[9]);

        file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/'.$ARR_USER[10].'.xml', $DOC->asXML());         
}

function ADD_TO_STORICO($DOC_CART,$ID_CLI){
  $DOC_STORICO=simplexml_load_file("http://localhost/php_program/GameOfHistory/XML%20_FILE/XML/STORICO_ACQUISTI.xml") or die("Error: Cannot create object");
  $F=Count($DOC_CART);
  $NOME_FILE="STORICO_ACQUISTI";
  $NEW_DATA=date("d/m/Y");

  for($I=0;$I<$F;$I++){
                      $ARR_CART=Extract_CART_Info($DOC_CART,$I);
                      Add_Record_To_Storico($NOME_FILE,$ARR_CART[0] ,$ARR_CART[1] ,$NEW_DATA);
  }
}

function ADD_PUNTI_FEDELTA($DOC,$ID_CLI,$SPESA){
  $F=Count($DOC);
  for($I=0;$I<$F;$I++){
     $ARR_USER=Extract_USER_Info($DOC,$I);

     if(strcmp( $ARR_USER[1] ,$ID_CLI)==0){
      $PT_HISTORY=(int)$SPESA/2.5;
    
      $_SESSION['T_PUNTI']=$DOC->Utente[$I]->Punti_History=(int)$ARR_USER[9]+(int)$PT_HISTORY;
      file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/UTENTE.xml', $DOC->asXML());  
     }
  }  
}

function FILTRA_PER_GENERE($DOC_ART,$DOC_ART_SUPP,$GENERE,$TIPOLOGIA_FILTRO){

    $INT_F=count($DOC_ART);
    unset( $DOC_ART_SUPP->ARTICOLO);
    file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/ARTICOLO1.xml', $DOC_ART_SUPP->asXML());

  if(strlen($GENERE)==0){
    for ($I=0; $I < $INT_F ; $I++) { 
      $ARR_ART=Extract_Articolo_Info($DOC_ART,$I);
      Add_Record_To_ART1($DOC_ART_SUPP,$ARR_ART);   
    }
  }else{  
    for ($I=0; $I < $INT_F ; $I++) { 
        $ARR_ART=Extract_Articolo_Info($DOC_ART,$I);
        if( strcmp( $ARR_ART[1], $GENERE)==0 ){
             Add_Record_To_ART1($DOC_ART_SUPP,$ARR_ART);   
        }
    }
  }
  return count($DOC_ART_SUPP);  
  
}
    
function SORT_FILE($DOC_ART,$TIPOLOGIA_FILTRO){
  
    switch($TIPOLOGIA_FILTRO){
        case 'CRESCENTE':
            ORDINA_PREZZO_CRESCENTE($DOC_ART);
        break;

        case 'DECRESCENTE':
            ORDINA_PREZZO_DECRESCENTE($DOC_ART); 
        break;
    }
}

function ORDINA_PREZZO_CRESCENTE($DOC_ART){
    $I_END=count($DOC_ART);
    $ARR_LOAD=array();

   for($I=0; $I <$I_END ; $I++){
      $ARR_ART[$I]=Extract_Articolo_Info($DOC_ART,$I);
   }

    for($I=0; $I<$I_END; $I++){
        for($J=$I+1; $J<$I_END; $J++){
            
            if((double)$ARR_ART[$I][3]<(double)$ARR_ART[$J][3]){
                $supp=$ARR_ART[$I];
                $ARR_ART[$I]=$ARR_ART[$J];
                $ARR_ART[$J]=$supp;
            }   
       }  
    }
    unset($DOC_ART->ARTICOLO);
    file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/ARTICOLO1.xml', $DOC_ART->asXML());

    for($Index_Start=0;$Index_Start<$I_END; $Index_Start++){
         Add_Record_To_ART1($DOC_ART,$ARR_ART[$Index_Start]); 
    }  
    file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/ARTICOLO1.xml', $DOC_ART->asXML());
}

function ORDINA_PREZZO_DECRESCENTE($DOC_ART){
 $I_END=count($DOC_ART);
    $ARR_LOAD=array();
   for($I=0; $I <$I_END ; $I++){
      $ARR_ART[$I]=Extract_Articolo_Info($DOC_ART,$I);
   }
    for($I=0; $I<$I_END; $I++){
        for($J=$I+1; $J<$I_END; $J++){
            if((double)$ARR_ART[$I][3]>(double)$ARR_ART[$J][3]){
                $supp=$ARR_ART[$I];
                $ARR_ART[$I]=$ARR_ART[$J];
                $ARR_ART[$J]=$supp;
            }   
       }  
    }
    unset($DOC_ART->ARTICOLO);
    file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/ARTICOLO1.xml', $DOC_ART->asXML());

    for($Index_Start=0;$Index_Start<$I_END; $Index_Start++){
         Add_Record_To_ART1($DOC_ART,$ARR_ART[$Index_Start]); 
    }  
    file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/ARTICOLO1.xml', $DOC_ART->asXML());
}

function Add_Record_To_ART1($DOC,$ARR_ART){
  
  $RecordADD=$DOC->addChild("ARTICOLO");
  $RecordADD->addAttribute("ART_ID",$ARR_ART[0]);
  $RecordADD->addAttribute("Categoria",$ARR_ART[1]);
  $RecordADD->addAttribute("HIDE",$ARR_ART[9]);
  $RecordADD->addChild("Nome",$ARR_ART[2]);
  $RecordADD->addChild("Prezzo",$ARR_ART[3]);
  $RecordADD->addChild("Descrizione",$ARR_ART[4]);
          
  $RecordADD1=$RecordADD->addChild("IMG");
 
  $RecordADD1->addChild("Percorso",$ARR_ART[6]);
  $RecordADD1->addChild("Nome_IMG",$ARR_ART[7]);
  $RecordADD1->addChild("Estensione",$ARR_ART[8]);

  file_put_contents('D:/xampp/htdocs/php_program/GameOfHistory/XML _FILE/XML/ARTICOLO1.xml', $DOC->asXML()); 
}

?>
