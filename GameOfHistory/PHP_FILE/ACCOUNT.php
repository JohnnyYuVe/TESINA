<?php


?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>	
	
  <div class="Link_used">	
    <title>GameOFHistory</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
   <!--<link rel="stylesheet" href="http://localhost/php_program/GameOfHistory/CSS_FILE/.css">	-->
  </div>

<style>

body{                 
          background-image: url("http://localhost/php_program/GameOfHistory/IMG_FILE/view-3d-arcade-game-box.jpg");
          background-repeat:no-repeat;
          background-size:cover;       
}
p{
  color:  red;
}

.Font_For_Text{
              font-family: "New Amsterdam", sans-serif;
              font-weight: 400;
              font-style: normal;
              padding: none;
                margin: none;
}

.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 300,
  'GRAD' 0,
  'opsz' 24
}

.INFO_Conteiner{
                width: 70%;                
                height: 80%;


                background-color:  #8A2BE2;
                position: relative;

                display: flex;
                flex-wrap: wrap;
                
                
                  border: 5px solid;
                  border-radius: 15px;
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  transform: translate(-50%, -50%);
                  text-align: center;

}

.INFO_Conteiner span{
                    color: black;
                    font-size: 40px;
}

.INFO_Conteiner p{
                  color: white;
                  position: relative;
                  font-size: 40px;

}

.INFO1{
      position: relative;
      width: 45%;
      text-align: left;
      padding: 30px 30px ;
}

.INFO2{
      position: relative;
      width: 45%;
      text-align: left;
      padding: 30px 30px ;
}

.INFO3{
      position: relative;
      width: 100%;
      text-align: left;
      padding: 30px 30px ;
      text-align: center;
}

.BackGround_TEXT2{
                    background: none;
                    position: relative;

                    
}

.BackGround_TEXT2 p{
                      text-align: center;
                      color: white;
                      font-size: 15px;

}


.Big_Button{
              background-color: #8A2BE2;
              padding: 60px 128px;
              border: none;
              border-radius: 30px;
              box-shadow: 15px 15px 5px BLACK;
              border-color:black;
              border:solid;
              



              /* 
              box-shadow Spiegazione:
              -i primi due valori specificano quanto deve essere grande l'ombra.
              -il terzo parametro specifica quanto intenso deve essere il blur. 
              -l'ultimo campo specifica il colore.
              border-radius Spiegazione:
              - Specifico la smussatura dei bordi.
              */
}

.Big_Button:hover {
                    background-color: #3e8e41
                  }

.Big_Button:active {
                  background-color: #3e8e41;
                  box-shadow: 0 5px #666;
                  transform: translateY(40px);
}

.Big_Button span{
              font-size:60px;                                        
              color: white;

}


</style>

</head>	


<body>
    <div class="INFO_Conteiner Font_For_Text">
          <div class="INFO1">
          <p>
              <span>ID :</span> 1</br>
              <span>Nome :</span> 2</br>    
              <span>Cognome :</span> 3</br>
              <span>Email :</span> 4</br>
              <span>Eta :</span> 5</br>
              <span>Sesso :</span> 6</br>
          </p>
          </div>

          <div class="INFO2">
          <p>
              <span>Punti HISTORY :</span> 1</br>
              <span>Data iscrizione :</span> 2</br>    
              <span>Membership :</span> 3</br>
              <span>TEST :</span> 4</br>
              <span>TEST :</span> 5</br>
              <span>TEST :</span> 6</br>
          </p>
          </div>

          <div class="INFO3">
                <div class="BackGround_Button">
                  <button type="button" class="Big_Button Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/MAIN.php'"><span>EDIT INFO</span> </button>
                </div>                    
          </div>

    </div>     



</body>


  
</html>


