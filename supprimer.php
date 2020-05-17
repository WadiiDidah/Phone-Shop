<?php

if (isset($_GET["nom"])) {
  $filename = "DB/produits.txt";
  $file = fopen($filename, "r");
  $text = fread($file, filesize($filename));
  $produits = explode("\n", $text);

  for ($i = 0; $i < sizeof($produits); $i++) {
    if (explode('|', $produits[$i])[0] === $_GET["nom"]) { // transformer la ligne du texte en tableau et vérifier le nom
      unset($produits[$i]); // supprimer un element du tableau
    }
  }
  $file = fopen($filename, 'w');
  fwrite($file, implode("\n", $produits));
  fclose($filename);
  header("Location: index.php?page=produits");
}
