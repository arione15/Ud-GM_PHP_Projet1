<?php ob_start(); //NE PAS MODIFIER 
$titre = "Partie 1 - Variables"; //Mettre le nom du titre de la page que vous voulez
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
    <title>Armes médiévales</title>
</head>

<body>
    <h1>Voici toutes les armes :</h1>
    <?php
    for ($i = 0; $i < count($armes); $i++) {
        echo "Arme " . ($i + 1) . " : " . $armes[$i] . "<br>";
    };
    echo "<br>";
    ?>

    <select name="armes">
        <?php for ($i = 0; $i < count($armes); $i++) : ?>
            <option value="">Choisir l'arme</option>
            <option value="epee"><?= $armes[$i] ?></option>
            <option value="arc"><?= $armes[$i] ?></option>
            <option value="hache"><?= $armes[$i] ?></option>
            <option value="fleau"><?= $armes[$i] ?></option>
        <?php endfor; ?>

    </select>


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