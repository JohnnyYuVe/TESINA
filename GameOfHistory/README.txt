GAME OF HISTORY
GITHUB Repostery: https://github.com/JohnnyYuVe/TESINA

Per la tesina, ho deciso di sviluppare il progetto "GAME OF HISTORY" da lei assegnato.

All'interno del file, troverà tre differenti cartelle nelle quali ho suddiviso i vari file, rendendo più facile la navigazione.
In questo progetto a differenza degli altri progetti da me consegnato ho deciso di realizzare più file css, in quanto è più facile tenere traccia di ciò che sto manipolando.

Idea di implementazione delle varie pagine html/php:

1)INDEX_PAGE.php

-Questa pagina fungerà semplicemente da "ingresso" per la vera pagina.
-Questa pagina avrà uno sfondo e un pulsante gigante al centro con la scritta "SHOP NOW"
-Al click del pulsante l'utente verrà reindirizzato alla pagina "HOME.php".

LE POSSIBILI ENTI INDIVIDUATE che visiteranno la pagina sono:

-Utente non registrato.
-Utente registrato.
-amministratore. 

L'utente non registrato cosa può fare?
-potrà solamente vedere il catalogo.
-effettuare il login.
-effettuare la registrazione.

L'utente registrato cosa può fare?
(IMPORTANTE: se l'articolo è già presente nel carello non potrà aggiungerlo lo stesso articolo nei preferiti,)
- aggiungere articoli dentro i preferiti.
-aggiungere articolo dentro il carrello.
-vedere le informazioni del proprio account
- Vedere cosa ha aggiunto nel suo carrello o nei suoi preferiti.
-pagare quello che ha aggiunto nel carrello.
-sfruttare i punti bonus per avere uno sconto.

L'amministratore cosa puo fare? 
-potrà scegliere se nascondere o far vedere determinati articoli
-potrà modificare i campi dei articoli e degli utenti.

2)MAIN.php

- Verranno esposti i videogiochi che verranno venduti, in colonne da due con un massimo di 5 righe per pagina.
- ci sarà una barra principale sulla parte più alta della pagina che reindirizzerà l'utente nelle varie sezioni della pagina.
- la pagina avrà un bakground.
- l'utente(registrato) potrà aggiungere l'articolo dentro il suo carrello(ICONA A FORMA DI CROCE) oppure aggiungerlo tra i suoi preferiti(ICONA A FORMA DI cuore)
- l'anagrafica dell'articolo avrà (Immagine, Nome, prezzo e una descrizione breve).



3)LOG-IN.php


-classica pagina da log in con i vari input box al centro della pagina.
-confronta i dati inseriti dal utente con i dati salvati nel file xml.
 
4)LOG-OUT-php

-Semplice pagina che fa il dump delle informazioni dell'utente.
-viene ridirizzato oppure tramite bottone si torna alla "HOME.php"

5)SIGN-IN.php

-Piccola pagina dove vengono presi i dati dell'utente per poi essere salvati dentro i file xml.

8)CARRELLO.php	
-l'utente qui vedrà sia gli articoli messi nel carrello e sia quelli messi tra i preferiti,l'utente potrà spostare un articolo dal carrello a quello dei preferiti e viceversa.
-l'utente quando vorrà pagare verrà reidirizzato alla pagina "CHECKOUT.php"

8)CHECKOUT.php
-l'utente qui effettuerà il pagamento

-il contenuto del carrello verrà spostato nello storico dopo che l'utente avrà premuto il pulsante paga .
-potra decidere se usare i suoi punti History che vengono generati in base alla spesa effettuata.


GENERE GIOCHI:

-AZIONE
-AVVENTURA
-RACING
-SHOOTERS
-SIMULATION
-SPORT
-STRATEGIA
-ROLE PLAYING

PUNTI HISTORY:

-in base alla spesa totale verranno generati dei punti utilizzabili per il prossimo acquisto: 
-per ogni 10 euro di spesa vengono generati 4pt history-
