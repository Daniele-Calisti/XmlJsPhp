<?php

    ini_set('display_errors', 1);

    $id = $_POST['id'];
    $modello = $_POST['modello'];
    $anno = $_POST['anno'];
    $prezzo = $_POST['prezzo'];
    $qnt = $_POST['quantita'];

    if(isset($id) && isset($modello) && isset($anno) && isset($prezzo) && isset($qnt))
    {
        $xml = simplexml_load_file("../xml/index.xml");

        foreach($xml->children() as $xmlArticolo) {
            if($xmlArticolo['id'] == $id)
            {
                $xml->articolo[$id-1]->modello = $modello;
                $xml->articolo[$id-1]->anno = $anno;
                $xml->articolo[$id-1]->prezzo = $prezzo;
                $xml->articolo[$id-1]->quantita = $qnt;
            }
        }

        $xml->asXml('../xml/index.xml');
    }

        

?>