<?php
$nom = $prix = $image = $marque = "";
$modification = false;//une variable pour definir le comportement du formulaire en cas de modification

// Si &operation est définie sur l'url et bien affecté (modifier||exist) on mets à jour et on remplit  le formulaire 
// sinon on fait appelle à la page on étant ajouter ( formulaire vide) 
if (isset($_GET["operation"]) && ($_GET["operation"] == "exist" || $_GET["operation"] == "modifier")) {
  $modification = ($_GET["operation"] === "modifier");//True on cas de &operation=modifier

  // remplir les valeurs du formulaire.
  if (isset($_GET["nom"])) $nom = "value='" . $_GET['nom'] . "'";
  if (isset($_GET["prix"])) $prix = "value='" . $_GET['prix'] . "'";
  if (isset($_GET["image"])) $image = "value='" . $_GET['image'] . "'";
  if (isset($_GET["marque"])) $marque = "value='" . $_GET['marque'] . "'";
}

?>

<h1><?php echo ($modification) ? "Modifier" : "Ajouter" ?> un Smartphone</h1>
<div>
  <form method="" id="myform">
    <label for="nom">Nom</label> <?php if(isset($_GET["operation"]) && $_GET["operation"]==="exist") echo "<span style='color:red'>(Ce Smartphone existe déjà)</span>" ?>
    <input type="text" id="nom" name="nom" placeholder="Nom du produit ..." <?php echo $nom ?> <?php if ($modification) echo "disabled" ?> >
    <label for="prix">Prix</label>
    <input type="number" id="prix" name="prix" placeholder="Ex:$500" min="0" <?php echo $prix  ?>>
    <label for="image">Image</label>
    <input type="text" id="image" name="image" placeholder="http://......." <?php echo $image  ?>>
    <label for="marque">Marque</label>
    <input type="text" list='listMarque' id="marque" name="marque" <?php echo $marque ?>>
    <datalist id="listMarque">
      <option>Apple</option>
      <option>Samsung</option>
      <option>Huawei</option>
    </datalist>

    <input type="button" value="Valider" onclick="verifier()">
    <p id="message"></p>
  </form>
</div>

<script>
  function verifier() {

    const nom = document.getElementById("nom").value;
    const prix = document.getElementById("prix").value;
    const image = document.getElementById("image").value;
    const marque = document.getElementById("marque").value;

    if (nom.length <= 0 || prix.length <= 0 || image.length <= 0 || marque.length <= 0) {
      document.getElementById("message").textContent = "Veuillez remplir tous les champs.";
      document.getElementById("message").style.color = "red";

    } else {
      // avec la variable php $modification on peut programmer le javascript à nous envoyer sur la page ajouter ou modifier suivie par ces parametres 
      window.location.href = `<?php echo ($modification) ? "modifier.php" : "ajouter.php" ?>?nom=${nom}&prix=${prix}&image=${image}&marque=${marque}`;

    }
  }
</script>