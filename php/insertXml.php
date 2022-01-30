<?php
    ini_set('display_errors', 1);

    $modello = $_POST['modello'];
    $anno = $_POST['anno'];
    $prezzo = $_POST['prezzo'];
    $qnt = $_POST['quantita'];

    if(isset($modello) && isset($anno) && isset($prezzo) && isset($qnt))
    {
        $xmldoc = new DOMDocument();
        $xmldoc->load('../xml/index.xml');

        //Prendo il numero di articoli presenti e aggiungo 1 per avere il nuovo id
        $id = $xmldoc->getElementsByTagName('articolo')->length + 1;

        $root = $xmldoc->firstChild;

        $newArticolo = $xmldoc->createElement('articolo');
        $idArticolo = $xmldoc->createAttribute('id');
        $idArticolo->value = strval($id);
        $newArticolo->appendChild($idArticolo);

        
        $root->appendChild($newArticolo);

        $xmlModello = $xmldoc->createElement('modello');
        $xmlAnno = $xmldoc->createElement('anno');
        $xmlPrezzo = $xmldoc->createElement('prezzo');
        $xmlQnt = $xmldoc->createElement('quantita');

        $xmlModello->appendChild($xmldoc->createTextNode($modello));
        $xmlAnno->appendChild($xmldoc->createTextNode($anno));
        $xmlPrezzo->appendChild($xmldoc->createTextNode($prezzo));
        $xmlQnt->appendChild($xmldoc->createTextNode($qnt));

        $newArticolo->appendChild($xmlModello);
        $newArticolo->appendChild($xmlAnno);
        $newArticolo->appendChild($xmlPrezzo);
        $newArticolo->appendChild($xmlQnt);

        $xmldoc->save('../xml/index.xml');
    }

    
?>
