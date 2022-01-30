<?php
    ini_set('display_errors', 1);

    $id = $_POST['id'];

    if(isset($id))
    {
        $doc = new DOMDocument; 
        $doc->load('../xml/index.xml');

        $thedocument = $doc->documentElement;

        //this gives you a list of the messages
        $list = $thedocument->getElementsByTagName('articolo');

        //figure out which ones you want -- assign it to a variable (ie: $nodeToRemove )
        $nodeToRemove = null;
        foreach ($list as $domElement){
          $attrValue = $domElement->getAttribute('id');
          if ($attrValue == $id) {
            $nodeToRemove = $domElement; //will only remember last one- but this is just an example :)
          }
        }

        //Now remove it.
        if ($nodeToRemove != null)
            $thedocument->removeChild($nodeToRemove);

        $doc->save('../xml/index.xml'); 
    }
?>
