<?php ob_start(); //NE PAS MODIFIER 
$titre = "Partie 5 - La programmation orientée objet"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php

class Arme
{
    private $nom;
    private $image;
    private $description;

    public function __construct($nom, $image, $description)
    {
        $this->nom = $nom;
        $this->image = $image;
        $this->description = $description;
    }

    public function __toString()
    {
        $text = '<tr>';
        $text .= '<td><img src="./sources/'.$this->image.'"></td>';
        $text .= '<td>';
        $text .= '<h2><b>'.$this->nom.'</b></h2><br>';
        $text .= '<p>'. $this->description . '</p>';
        $text .= '</td>';
        $text .= '</tr>';

        return $text;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}

function genererNbreAleatoire($nom)
{
    if ($nom === "Arc") {
        $nombreAleatoire = rand(1, 2);
    } else {
        $nombreAleatoire = rand(1, 5);
    }
    return $nombreAleatoire;
}

$arme1 = new Arme("Epée", "epee/epee" . genererNbreAleatoire('Epée') . ".png", "Une arme tranchante");
$arme2 = new Arme("Arc", "arc/arc" . genererNbreAleatoire('Arc') . ".png", "Une arme à distance");
$arme3 = new Arme("Hache", "hache/hache" . genererNbreAleatoire('Hache') . ".png", "Une arme tranchante ou un outil qui permet aussi de couper du bois");
$arme4 = new Arme("Fléau", "fleau/fleau" . genererNbreAleatoire('Fléau') . ".png", "Une arme contondante du moyen-âge");

$armes = [$arme1, $arme2, $arme3, $arme4];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage détaillé des armes en POO (Private et toString)</title>
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
            foreach ($armes as $arme) {
                echo $arme;
            } ?>
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