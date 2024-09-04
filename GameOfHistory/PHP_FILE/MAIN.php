
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>	
		<title>GameOFHistory</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
    <!--<link rel="stylesheet" href="http://localhost/php_program/GameOfHistory/CSS_FILE/INDEX_PAGE_STYLE.css">	-->
<style> 

body {
      margin:0;
      background-image: url(http://localhost/php_program/GameOfHistory/IMG_FILE/bowling-alley-with-neon-lights.jpg);
      background-repeat:no-repeat;
      background-size:cover;

      height: 1500px;
}


.navbar {
  overflow: hidden;
  background-color: /*#8A2BE2*/ none;
  position: fixed ;
  text-align: center;
  left: 5%;
  top: 5%;
  border-radius: 100px;
  padding: 10px 25px;
  z-index: 9999;

  
}

.Button_Menu_Nav{
                padding: 30px 90px;
                border: none;
                border-radius: 30px;
                box-shadow: 5px 10px 0px #562087;
                background-color: #8A2BE2;

                color: white;
                font-size: 15px; 

}

.Button_Menu_Nav:hover {
                    background-color: #3e8e41
                  }

.Button_Menu_Nav:active {
                  background-color: #3e8e41;
                  box-shadow: 0 5px #666;
                  transform: translateY(10px);
}

.Main_Container_Item{
                    background-color:#736372;
                    padding: 30px 40px;
                    position: relative ;
                    left: 7%;
                    top: 30%;
                    width: 80%;
                    height: auto ;
                    border-radius: 30px;



}


.TEXT_conteiner{
                background-color: grey;
                height: 700px;
                
                border-radius: 5px;
                padding: none;
                text-align: center;
                margin-bottom: 100px;
                

}
hr{
    border: 3px solid black;
}

.Box_container{
            width:90%;
            height: auto;       
            
            display: inline-block;
          
            padding: 5% 5%;

}



.Button_Container{
                  text-align: right;
                  padding: 10px 10px;
}

.Disposizione{
              
              margin: none;
              padding-block: 10px;
              display: flex;
              flex-wrap: wrap;
              justify-content: center;
}





.Button_Art{
            border-radius: 12%;

}

.Button_Art:hover {
                    background-color: #3e8e41
                  }

.Button_Art:active {
                  background-color: #3e8e41;
                  box-shadow: 0 5px #666;
                  transform: translateY(10px);
}


.articolo{
          background-color: #8A2BE2;    
          text-align: center;
          padding: 25px 25px;
          width: 540px;
          border-radius: 10px;
          margin-bottom: 10px;
          margin-inline: 40px;

          border-color: black;
          border-style: solid;  



}

.articolo img{
               
               height: 300px;

}


.articolo p{
            text-align:left ;
}

.PageScroll{
            text-align: center;
            padding-block: 30px;


}

.PageScroll a {
              color: black;
              padding: 8px 16px;
              text-decoration: none;
              transition: background-color .3s;
}

.PageScroll a.active {
                      background-color: dodgerblue;
                      color: white;
}


.PageScroll a:hover:not(.active) {
                                background-color: #ddd;
}




.Font_For_Text{
              font-family: "New Amsterdam", sans-serif;
              font-weight: 400;
              font-style: normal;
}

.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 300,
  'GRAD' 0,
  'opsz' 24
}
 




</style>

</head>	


<body>



<div Class="navbar">

          <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/MAIN.php' "> 
                   <span class="material-symbols-outlined">home</span>home  
          </button>

          <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                      
          </button>

          <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                    <span class="material-symbols-outlined">shopping_cart</span>cart   
          </button>

          <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                  <span class="material-symbols-outlined">login</span> login 
          </button>

          <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                  <span class="material-symbols-outlined">logout</span>logout   
          </button>


          <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                   <span class="material-symbols-outlined">account_circle</span>account    
          </button>

          </button>

          <button type="button" class="Button_Menu_Nav Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                    <span class="material-symbols-outlined">support_agent</span>support      
          </button>
 
</div>


<div class="Main_Container_Item">
        
        <div class="TEXT_conteiner">

                slider immagini

        </div>
<hr>
    <div class="Box_container">

      <div class="Disposizione">
              <div class="articolo Font_For_Text">
                                           <img src="" alt="Foto articolo">
                                            
                                            <p>

                                             Nome_articolo</br>
                                              &#8364;Prezzo</br>
                                            </p>

                                            <p>
                                              descrizione breve dell'articolo
                                            </p>

                              <div class="Button_Container">
                                    <button type="button" class="Button_Art Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                                              <span class="material-symbols-outlined">favorite</span>      
                                    </button>
       
                                    <button type="button" class="Button_Art  Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                                              <span class="material-symbols-outlined">add</span>      
                                    </button>
                           <!--
                                    <button type="button" class="Button_Art Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                                              <span class="material-symbols-outlined">support_agent</span>      
                                    </button>
                            -->        
                              </div>
              </div>

              <div class="articolo Font_For_Text">
                                           <img src="" alt="Foto articolo">
                                            
                                            <p>

                                             Nome_articolo</br>
                                              &#8364;Prezzo</br>
                                            </p>

                                            <p>
                                              descrizione breve dell'articolo
                                            </p>

                              <div class="Button_Container">
                                    <button type="button" class="Button_Art Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                                              <span class="material-symbols-outlined">support_agent</span>      
                                    </button>
       
                                    <button type="button" class="Button_Art  Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                                              <span class="material-symbols-outlined">support_agent</span>      
                                    </button>
                           
                                    <button type="button" class="Button_Art Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                                              <span class="material-symbols-outlined">support_agent</span>      
                                    </button>
                              </div>
              </div>

              <div class="articolo Font_For_Text">
                                           <img src="" alt="Foto articolo">
                                            
                                            <p>

                                             Nome_articolo</br>
                                              &#8364;Prezzo</br>
                                            </p>

                                            <p>
                                              descrizione breve dell'articolo
                                            </p>

                              <div class="Button_Container">
                                    <button type="button" class="Button_Art Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                                              <span class="material-symbols-outlined">support_agent</span>      
                                    </button>
       
                                    <button type="button" class="Button_Art  Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                                              <span class="material-symbols-outlined">support_agent</span>      
                                    </button>
                           
                                    <button type="button" class="Button_Art Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                                              <span class="material-symbols-outlined">support_agent</span>      
                                    </button>
                              </div>
              </div>


              <div class="articolo Font_For_Text">
                                           <img src="" alt="Foto articolo">
                                            
                                            <p>

                                             Nome_articolo</br>
                                              &#8364;Prezzo</br>
                                            </p>

                                            <p>
                                              descrizione breve dell'articolo
                                            </p>

                              <div class="Button_Container">
                                    <button type="button" class="Button_Art Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                                              <span class="material-symbols-outlined">support_agent</span>      
                                    </button>
       
                                    <button type="button" class="Button_Art  Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                                              <span class="material-symbols-outlined">support_agent</span>      
                                    </button>
                           
                                    <button type="button" class="Button_Art Font_For_Text" onclick="location.href='http://localhost/php_program/GameOfHistory/PHP_FILE/INDEX_PAGE.php' "> 
                                              <span class="material-symbols-outlined">support_agent</span>      
                                    </button>
                              </div>
              </div>



    </div> 
    <div Class="PageScroll Font_For_Text">
   
    <a href="#">&laquo;</a>      
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">&raquo;</a>   

<div>
</div>                


</body>

</html>


