<?php ob_start(); //NE PAS MODIFIER 
$titre = "Partie 2 - Les tableaux"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php

$arme1 = "Epée";
$arme2 = "Arc";
$arme3 = "Hache";
$arme4 = "Fléau";
$armes = [$arme1, $arme2, $arme3, $arme4];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Différents affichages des armes</title>
</head>

<body>
    <p><b>Voici les armes dans un tableau PHP :</p></b>
    <div>
        Arme 1 : <?= $armes[0] . "<br>" ?>
        Arme 2 : <?= $armes[1] . "<br>" ?>
        Arme 3 : <?= $armes[2] . "<br>" ?>
        Arme 4 : <?= $armes[3] . "<br>" ?>
    </div>
<br>
    <p><b>Affichage dans une boucle for :</p></b>
    <?php for ($i = 0; $i < count($armes); $i++) {
        echo "Arme " . ($i + 1) . " : " . $armes[$i] . "<br>";
    }
?>

<br>
    <p><b>Affichage dans une boucle foreach :</p></b>
    <?php foreach ($armes as $key => $valeur) {
    echo "Arme " . ($key+1) . " : " . $valeur . "<br>";
    } 
    ?>
</body>

</html>



<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
$content = ob_get_clean();
require "../../global/common/template.php";
?>