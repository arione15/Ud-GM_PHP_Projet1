<?php 
session_start();

if(!isset($_SESSION['épée']))$_SESSION['épée']=1;
if(!isset($_SESSION['arc']))$_SESSION['arc']=1;
if(!isset($_SESSION['hache']))$_SESSION['hache']=1;
if(!isset($_SESSION['fléau']))$_SESSION['fléau']=1;

ob_start(); //NE PAS MODIFIER 
$titre = "Partie 8 - La programmation orientée objet"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
    class Arme{
        private $nom;
        private $level;
        private $levelMax;
        private $description;

        public function __construct($nom,$description,$maxLevel){
            $this->nom = $nom;
            $this->level = 1;
            $this->levelMax = $maxLevel;
            $this->description = $description;
        }

        public function __toString(){
            $txt ="";
            $txt .='<div class="row align-items-center">';
                $txt .='<div class="col-3 text-center">';
                    $txt .='<img src="sources/'.$this->getImageName() .'" />';
                $txt .='</div>';
                $txt .="<div class='col-1'>";
                    $txt .='<form action="" method="GET">';
                        $txt .= '<select onChange="submit()" name="level'.$this->nom.'">';
                            for($i=1; $i <= $this->levelMax; $i++){
                                $txt .= "<option value='".$i."'";
                                $txt .= ($i === (int)$_SESSION[$this->nom]) ? "selected" : "";
                                $txt .= ">".$i."</option>";
                            }
                        $txt .= '</select>';
                    $txt .='</form>';
                $txt .="</div>";
                $txt .='<div class="col-auto">';
                    $txt .='<h2>'. $this->nom .'</h2>';
                    $txt .='<p>'. $this->description .'</p>';
                $txt .='</div>';
            $txt .='</div>';
            return $txt;
        }

        public function getImageName(){
            $recherche = ["à","é","è","ç","ù"];
            $remplacement = ["a","e","e","c","u"];
            $nomSansAccent = str_replace($recherche,$remplacement,$this->nom);
            return $nomSansAccent."/".$nomSansAccent.$this->level.".png";
        }

        public function getNom(){return $this->nom;}
        public function getLevel(){return $this->level;}
        public function getLevelMax(){return $this->levelMax;}
        public function getDescription(){return $this->description;}

        public function setNom($nom){$this->nom = $nom;}
        public function setLevel($level){$this->level = $level;}
        public function setLevelMax($levelMax){$this->levelMax = $levelMax;}
        public function setDescription($description){$this->$description = $description;}
    }

    $arme1 = new Arme("épée","Une arme tranchante",5);
    $arme2 = new Arme("arc","Une arme à distance",2);
    $arme3 = new Arme("hache","Une arme tranchante ou un outil qui permet aussi de couper du bois",5);
    $arme4 = new Arme("fléau","Une arme contondante du moyen-âge",5);

    $armes = [$arme1,$arme2,$arme3,$arme4];

    if(isset($_GET['levelépée'])){
        $_SESSION['épée'] = $_GET['levelépée'];
    }
    if(isset($_GET['levelarc'])){
        $_SESSION['arc'] = $_GET['levelarc'];
    }
    if(isset($_GET['levelhache'])){
        $_SESSION['hache'] = $_GET['levelhache'];
    }
    if(isset($_GET['levelfléau'])){
        $_SESSION['fléau'] = $_GET['levelfléau'];
    }

    $arme1->setLevel($_SESSION['épée']);
    $arme2->setLevel($_SESSION['arc']);
    $arme3->setLevel($_SESSION['hache']);
    $arme4->setLevel($_SESSION['fléau']);
?>

<div>
    <b>Voici toutes les armes : </b>
</div>
<?php foreach($armes as $arme){ 
    echo $arme;
} ?>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
