<?php

if (isset($_GET["nom"]) && isset($_GET["marque"]) && isset($_GET["image"]) && isset($_GET["prix"])) {


    if (!is_dir("DB")) {
        mkdir("DB");
    }

    $filename = "DB/produits.txt";
    // créer le fichier s'il n'existe pas
    if (!file_exists($filename)) {
        $file = fopen($filename, "w");
    }

    $file = fopen($filename, "r");
    // on transforme le données lues en string on précisant la limite de lecture sur le deuxième paramètre
    $text = fread($file, filesize($filename));
    $produits = explode("\n", $text);// créer un tableau de produits en utilisant les "\n"
   
    $exist = false;
    // boucle pour vérifier si un produit existe déjà
    for ($i = 0; $i < sizeof($produits); $i++)
        if (explode('|', $produits[$i])[0] === $_GET["nom"]) 
            $exist = true;


    if ($exist) {// on fait appelle à index avec le formulaire,et on ajoute des paramétres pour indiquer (&operation=exist) et d'autres paramétres qui vont remplire le formulaire 
        header("Location: index.php?page=modifprod&operation=exist&nom=" . $_GET['nom'] . "&prix=" . $_GET['prix'] . "&image=" . $_GET['image'] . "&marque=" . $_GET['marque']);
    } else {// on l'ajoute et on se dérige vers la page produits
        $file = fopen($filename, "a");
        fputs($file, $_GET["nom"] . "|" . $_GET["prix"] . "|" . $_GET["image"] . "|" . $_GET["marque"] . "|\n");
        fclose($file);
        header("Location: index.php?page=produits");
    }

    
}
