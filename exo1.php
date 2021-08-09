<?php ob_start(); //NE PAS MODIFIER 
$titre = "Partie 1 - Variables"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
    $arme1 = "épée";
    $arme2 = "arc";
    $arme3 = "hache";
    $arme4 = "fléeau";
?>

<div>
    <b>Voici toutes les armes : </b>
</div>
<p>
    Arme 1 : <?= $arme1; ?><br />
    Arme 2 : <?= $arme2; ?><br />
    Arme 3 : <?= $arme3; ?><br />
    Arme 4 : <?= $arme4; ?><br />
</p>

<select>
    <option></option>
    <option><?= $arme1; ?></option>
    <option><?= $arme2; ?></option>
    <option><?= $arme3; ?></option>
    <option><?= $arme4; ?></option>
</select>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
