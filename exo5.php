<?php ob_start(); //NE PAS MODIFIER 
$titre = "Partie 5 - La programmation orientée objet"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
    class Arme{
        private $nom;
        private $image;
        private $description;

        public function __construct($nom,$image,$description){
            $this->nom = $nom;
            $this->image = $image;
            $this->description = $description;
        }

        public function __toString(){
            $txt ="";
            $txt .='<div class="row align-items-center">';
                $txt .='<div class="col-3 text-center">';
                    $txt .='<img src="sources/'.$this->image .'" />';
                $txt .='</div>';
                $txt .='<div class="col-auto">';
                    $txt .='<h2>'. $this->nom .'</h2>';
                    $txt .='<p>'. $this->description .'</p>';
                $txt .='</div>';
            $txt .='</div>';
            return $txt;
        }

        public function getNom(){return $this->nom;}
        public function getImage(){return $this->image;}
        public function getDescription(){return $this->description;}

        public function setNom($nom){$this->nom = $nom;}
        public function setImage($image){$this->image = $image;}
        public function setDescription($description){$this->$description = $description;}
    }

    $arme1 = new Arme("épée","epee/epee1.png","Une arme tranchante");
    $arme2 = new Arme("arc","arc/arc1.png","Une arme à distance");
    $arme3 = new Arme("hache","hache/hache1.png","Une arme tranchante ou un outil qui permet aussi de couper du bois");
    $arme4 = new Arme("fléau","fleau/fleau1.png","Une arme contondante du moyen-âge");

    $armes = [$arme1,$arme2,$arme3,$arme4];

    $randomArme = rand(1,5);
    $arme1->setImage("epee/epee".$randomArme.".png");
    $randomArme = rand(1,2);
    $arme2->setImage("arc/arc".$randomArme.".png");
    $randomArme = rand(1,5);
    $arme3->setImage("hache/hache".$randomArme.".png");
    $randomArme = rand(1,5);
    $arme4->setImage("fleau/fleau".$randomArme.".png");
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
