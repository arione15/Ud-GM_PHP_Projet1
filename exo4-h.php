<?php

use Arme as GlobalArme;

ob_start(); //NE PAS MODIFIER 
$titre = "Partie 4 - La programmation orientée objet"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
class Arme
{
    public $nom;
    public $image;
    public $description;

    public function __construct($nom, $image, $description)
    {
        $this->nom = $nom;
        $this->image = $image;
        $this->description = $description;
    }
}
$arme1 = new Arme("Epée", "epee/epee1.png", "Une arme tranchante");
$arme2 = new Arme("Arc", "arc/arc1.png", "Une arme à distance");
$arme3 = new Arme("Hache", "hache/hache1.png", "Une arme tranchante ou un outil qui permet aussi de couper du bois");
$arme4 = new Arme("Fléau", "fleau/fleau1.png", "Une arme contondante du moyen-âge");

$armes = [$arme1, $arme2, $arme3, $arme4];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage détaillé des armes en POO</title>
</head>

<body>
    <p><b>Voici toutes les armes :</b></p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Nom/déscription</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($armes as $arme) : ?>
                <tr>
                    <td><img src="./sources/<?= $arme->image ?>"></td>
                    <td>
                        <h2><b><?= $arme->nom ?></b></h2><br>
                        <p><?= $arme->description ?></p>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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