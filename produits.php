<h1>Liste des Smartphones</h1>

<!-- le php -->
<?php
$filename = "DB/produits.txt";
if (file_exists($filename)) {       // chercher la base de donnée
    $file = fopen($filename, "r");
    while (!feof($file)) {
        $infoProduit = explode('|', fgets($file)); // convertir la ligne actuelle en tableau

        if (sizeof($infoProduit) > 1) { // pour éviter les lignes vides, car ils nous donnent un element[0] vide

            //creation de la fonction pour  l'event Onclick 
            $fun_modifier = "modifier('$infoProduit[0]', '$infoProduit[1]', '$infoProduit[2]', '$infoProduit[3]')"; // Création de la fonction modifier() avec ces paramètres.
            
            // insertion des cartes on Html avec les données du tableau 
            echo "<article class='W3-card card'>
                        <div class='w3-large icones flex'>
                            <button onclick=\"$fun_modifier\"><i class='fa fa-edit'></i></button>
                            <button onclick=\"supprimer('$infoProduit[0]')\" ><i class='fa fa-close'></i></button>
                        </div>

                        <div class='img'><img src='$infoProduit[2]'> </div> 

                        <div class='underline'><h2>$infoProduit[0]</h2></div>

                        <div class='flex'><span>$infoProduit[3]</span><span>$infoProduit[1] €</span></div>
                    </article>";
        }
    }
}
?>

<!-- le script  -->
<script>
    function modifier(nom, prix, image, marque) {
        // on fait appelle à index avec le formulaire,et on ajoute des paramétres pour indiquer (&operation=modifier) et d'autres paramétres qui vont remplire le formulaire 
        window.location.href = `index.php?page=modifprod&operation=modifier&nom=${nom}&image=${image}&prix=${prix}&marque=${marque}`;
    }

    function supprimer(nom) { // pour appeler la page de suppression avec l'id qui doit être supprimer.
        window.location.href = `supprimer.php?nom=${nom}`;
    }
</script>


