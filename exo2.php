<?php ob_start(); //NE PAS MODIFIER 
$titre = "Partie 2 - Les tableaux"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
    $arme1 = "épée";
    $arme2 = "arc";
    $arme3 = "hache";
    $arme4 = "fléau";

    $armes = [$arme1,$arme2,$arme3,$arme4];
?>

<div>
    <b>Voici toutes les armes : </b>
</div>
<p>
    Arme 1 : <?= $armes[0]; ?><br />
    Arme 2 : <?= $armes[1]; ?><br />
    Arme 3 : <?= $armes[2]; ?><br />
    Arme 4 : <?= $armes[3]; ?><br />
</p>

<div><b>Affichage dans une boucle for : </b></div>
<?php for($i=0;$i < count($armes) ; $i++){
    echo "Arme ". ($i+1) . " : ". $armes[$i]. "<br />";
}
?>

<div><b>Affichage dans une boucle foreach : </b></div>
<?php foreach($armes as $key => $arme){
    echo "Arme ". ($key + 1) . " : ". $arme . "<br />";
}
?>


<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
