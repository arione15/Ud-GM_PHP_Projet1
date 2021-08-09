<?php ob_start(); //NE PAS MODIFIER 
$titre = "Partie 4 - La programmation orientée objet"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
    class Arme{
        public $nom;
        public $image;
        public $description;

        public function __construct($nom,$image,$description){
            $this->nom = $nom;
            $this->image = $image;
            $this->description = $description;
        }
    }

    $arme1 = new Arme("épée","epee/epee1.png","Une arme tranchante");
    $arme2 = new Arme("arc","arc/arc1.png","Une arme à distance");
    $arme3 = new Arme("hache","hache/hache1.png","Une arme tranchante ou un outil qui permet aussi de couper du bois");
    $arme4 = new Arme("fléau","fleau/fleau1.png","Une arme contondante du moyen-âge");

    $armes = [$arme1,$arme2,$arme3,$arme4];
?>

<div>
    <b>Voici toutes les armes : </b>
</div>
<?php foreach($armes as $arme){ ?>
    <div class="row align-items-center">
        <div class="col-3 text-center">
            <img src="sources/<?= $arme->image; ?>" />
        </div>
        <div class="col-auto">
            <h2><?= $arme->nom; ?></h2>
            <p><?=$arme->description; ?></p>
        </div>
    </div>

<?php } ?>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
