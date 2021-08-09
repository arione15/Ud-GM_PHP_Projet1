<?php 
session_start();

// Je défini les varibales de session (nom arbitraire) et je teste : si elles n'existent pas je les initialise à 1
if(!isset($_SESSION['Epée']))$_SESSION['Epée']=1;
if(!isset($_SESSION['Arc']))$_SESSION['Arc']=1;
if(!isset($_SESSION['Hache']))$_SESSION['Hache']=1;
if(!isset($_SESSION['Fléau']))$_SESSION['Fléau']=1;

ob_start(); //NE PAS MODIFIER 
$titre = "Partie 8 - La programmation orientée objet"; //Mettre le nom du titre de la page que vous voulez
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
                        $text .= '<option value="' . $i . '"';
                        $text .= ($i === (int)$_SESSION[$this->nom]) ? "selected" : "";
                        $text .= '>' . $i . '</option>';
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
// Mise-à-jour (et définition exacte pas uniquement le nom !!!) 
// de la variable de session avec l'info reçu dans l'url
if(isset($_GET['levelEpée'])){
    $_SESSION['Epée']=$_GET['levelEpée'];
}
if(isset($_GET['levelArc'])){
    $_SESSION['Arc']=$_GET['levelArc'];
}
if(isset($_GET['levelHache'])){
    $_SESSION['Hache']=$_GET['levelHache'];
}
if(isset($_GET['levelFléau'])){
    $_SESSION['Fléau']=$_GET['levelFléau'];
}

// setLevel doit être écrite en dehor du if(isset($_GET))
$arme1->setLevel($_SESSION['Epée']);
$arme2->setLevel($_SESSION['Arc']);
$arme3->setLevel($_SESSION['Hache']);
$arme4->setLevel($_SESSION['Fléau']);

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

<?php 

/* 
1- setLevel doit être écrite en dehor du if(isset($_GET))

2- Importance de (int) devant $_SESSION dans le codage de slected : 
$text .= ($i === (int)$_SESSION[$this->nom]) ? "selected" : "";
Sans (int) ca n'a pas fonctionné chez-moi.

3- 
*/
?>
