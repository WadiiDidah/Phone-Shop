<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet"><!-- On laisse le style.css en dérnier pour écraser les autres.-->
    <title>Phone Shop</title>
</head>

<body>
    <header>

        <div class="w3-container w3-blue">
            <h1>Phone Shop</h1>
        </div>

    </header>




    <section class="conteneur flex">
        <div class="nav"><!-- premier contenue(nav)-->
            <ul>
                <li><a href="index.php?page=init">Contenu de presentation</a></li>
                <li><a href="index.php?page=produits">Liste des Smartphones</a></li>
                <li><a href="index.php?page=modifprod">Ajouter un Smartphone</a></li>

            </ul>
        </div>

        <div class="contenue flex"><!--deuxieme contenue(include)-->

            <?php
            if (isset($_GET["page"])) {//la page a inclure dans le contenueur index 
                switch ($_GET["page"]) {
                    case "init":
                        include("init.html");
                        break;
                    case "produits":
                        include("produits.php");
                        break;
                    case "modifprod":
                        include("modifprod.php");
                        break;
                }
            } else {//par default on inclut la page init
                include("init.html");
            }
            ?>

        </div>

    </section>



    <footer>
        <p>© 2020 DIDAH WADII</p>
    </footer>

</body>

</html>