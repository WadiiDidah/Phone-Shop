<?php
if (isset($_GET["nom"]) && isset($_GET["image"]) && isset($_GET["prix"]) && isset($_GET["marque"])) {
  $filename = "DB/produits.txt";
  $file = fopen($filename, "r");
  $text = fread($file, filesize($filename));
  $produits = explode("\n", $text);

  for ($i = 0; $i < sizeof($produits); $i++) {
    if (explode('|', $produits[$i])[0] === $_GET["nom"]) {
      $produits[$i] = $_GET['nom'] . "|" . $_GET['prix'] . "|" . $_GET['image'] . "|" . $_GET['marque'];
    }
  }

  $file = fopen($filename, 'w');
  fwrite($file, implode("\n", $produits)); // on transforme le tableau modifier en texte
  fclose($filename);
  header("Location: index.php?page=produits");
}
?>
