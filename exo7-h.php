<?php ob_start(); //NE PAS MODIFIER 
$titre = "Partie 7 - La programmation orientée objet"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
class Arme
{
    private $nom;
    private $level;
    private $levelMax;
    private $description;

    public function __construct($nom, $description)
    {
        $this->nom = $nom;
        $this->description = $description;
        $this->level = 1;
    }
    public function __toString()
    {
        $text = '<tr>';

        $text .= '<td><img src="./sources/' . $this->getNomImage() . '"></td>';
        
        $text .= '<td>';
            $text .= '<form action="" method="GET">';
                $text  .= '<select onChange="submit()" name="level'.$this->nom.'">';
                    for ($i = 1; $i <= $this->levelMax; $i++) {
                        $text .= '<option value="' . $i . '">' . $i . '</option>';
                    }
                $text .= '</select>';
            $text .= '</form>';
        $text .= '</td>';
        
        $text .= '<td>';
        $text .= '<h2><b>' . $this->nom . '</b></h2><br>';
        $text .= '<p>' . $this->description . '</p>';
        $text .= '</td>';
        
        $text .= '</tr>';

        return $text;
    }
    public function getNomImage()
    {
        $carcaterSpeciaux = ["à", "é", "é", "ç", "ù"];
        $remplacant = ["a", "e", "e", "c", "u"];

        $nomSansAccent = str_replace($carcaterSpeciaux, $remplacant, $this->nom);
        return $nomSansAccent . "/" . $nomSansAccent . $this->level . ".png";
    }


    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of level
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set the value of level
     *
     * @return  self
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get the value of levelMax
     */
    public function getLevelMax()
    {
        return $this->levelMax;
    }

    /**
     * Set the value of levelMax
     *
     * @return  self
     */
    public function setLevelMax($levelMax)
    {
        $this->levelMax = $levelMax;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}

$arme1 = new Arme("Epée", "Une arme tranchante");
$arme1->setLevelMax(5);
$arme2 = new Arme("Arc", "Une arme à distance");
$arme2->setLevelMax(2);
$arme3 = new Arme("Hache", "Une arme tranchante ou un outil qui permet aussi de couper du bois");
$arme3->setLevelMax(5);
$arme4 = new Arme("Fléau", "Une arme contondante du moyen-âge");
$arme4->setLevelMax(5);

$armes = [$arme1, $arme2, $arme3, $arme4];

// Traitement de l'info. capturée dans l'url via la méthode get
if(isset($_GET['levelEpée'])){
    $arme1->setLevel($_GET['levelEpée']);
}
if(isset($_GET['levelArc'])){
    $arme2->setLevel($_GET['levelArc']);
}
if(isset($_GET['levelHache'])){
    $arme3->setLevel($_GET['levelHache']);
}
if(isset($_GET['levelFléau'])){
    $arme4->setLevel($_GET['levelFléau']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste déroulante et formulaire</title>
</head>

<body>
    <p><b>Voici toutes les armes :</b></p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Level</th>
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