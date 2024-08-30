GAME OF HISTORY
GITHUB Repostery: https://github.com/JohnnyYuVe/TESINA

Per la tesina, ho deciso di sviluppare il progetto "GAME OF HISTORY" da lei assegnato.

All'interno del file, troverà tre differenti cartelle nelle quali ho suddiviso i vari file, rendendo più facile la navigazione.
In questo progetto a differenza degli altri progetti da me consegnato ho deciso di realizzare più file css, in quanto è più facile tenere traccia di ciò che sto manipolando.

Idea di implementazione delle varie pagine html/php:

1)INDEX_PAGE.php

-Questa pagina fungerà semplicemente da "ingresso" per la vera pagina.
-Questa pagina avrà uno sfondo e un pulsante gigante al centro con la scritta "SHOP NOW"
-Al click del punsante l'utente verrà reidirizzato alla pagina "HOME.php".


2)HOME.php

- Verrano esposti i videogiochi che verrannò venduti, in colonne da due con un massimo di 5 righe per pagina.
- ci sarà una barra principale sulla parte più alta della pagina che reindirizzerà l'utente nelle varie sezioni della pagina.
- la pagina avrà un bakground sfocato.
- l'utente(registrato) potrà aggiungere l'articolo dentro il suo carrello(icon carrello) oppure aggiungerlo tra i suoi preferiti(icon cuore)
- l'anagrafica dell'articolo avrà (Immagine,Nome,prezzo,descrizione,breve).
- al click dell'img verrà reidirizzato su un'altra pagina nella quale avrà più dettagli dell'articolo.
-

3)LOG-IN-php

-Scritta grossa "LOG IN" sulla parte alta, centrata della pagina(possibilmente con un font carino).
-classica pagina da log in con i vari input box al centro della pagina.
-confronta i dati inseriti dal utente con i dati salvati nel file xml.
 
4)LOG-OUT-php

-Semplice pagina che fa il dump delle informazioni dell'utente.
-viene reidirizzato al "INDEX_PAGE.php"

5)SIGN-IN.php

-Piccola pagina dove vengono presi i dati dell'utente per poi essere salvati dentro i file xml.

6)CUSTOMER_CARE.php

- pagina dedicata per l'utente nella quale potrà mandare una email allo staff per ricevere supporto.

8)CARRELLO.php
-l'utente qui vedrà sia gli articoli messi nel carrello e sia quelli messi tra i preferiti,l'utente potrà spostare un articolo dal carrello a quello dei preferiti e viceversa.
-l'utente quando vorrà pagare verrà reidirizzato alla pagina "CHECKOUT.php"

8)CHECKOUT.php
-l'utente qui effettuerà il pagamento
- potrà decidere il metodo di pagamento.
- se sfruttare qualche tipologia di sconto(reputazione, crediti, codici sconto non commulabile).
- decidere se ritirare in negozio, o farselo spedire.
- 