<?php ob_start(); //NE PAS MODIFIER 
$titre = "Partie 6 - La programmation orientée objet"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php

class Arme
{
    private $nom;
    private $level;
    private $description;

    public function __construct($nom, $description)
    {

        $this->nom = $nom;
        $this->level = 5;
        $this->description = $description;
    }

    public function __toString()
    {
        $text = '<tr>';
        $text .= '<td><img src="./sources/' . $this->getNomImage() . '"></td>';
        $text .= '<td>';
        $text .= '<h2><b>'.$this->nom.'</b></h2><br>';
        $text .= '<p>'. $this->description . '</p>';
        $text .= '</td>';
        $text .= '</tr>';

        return $text;
    }

    public function getNomImage(){
        $carcaterSpeciaux = ["à", "é", "é", "ç", "ù"];
        $remplacant = ["a", "e", "e", "c", "u"];

        $nomSansAccent = str_replace($carcaterSpeciaux, $remplacant, $this->nom);
        return $nomSansAccent . "/" . $nomSansAccent . $this->level . ".png"; 
    }
    public function getNom()
    {
        return $this->nom;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setLevel($level)
    {
        $this->image = $level;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}

$arme1 = new Arme("Epée", "Une arme tranchante");
$arme2 = new Arme("Arc", "Une arme à distance");
$arme3 = new Arme("Hache", "Une arme tranchante ou un outil qui permet aussi de couper du bois");
$arme4 = new Arme("Fléau", "Une arme contondante du moyen-âge");

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
