# Armes médiévales

"CatArmes médiévales" est un site présentant des armes qui ont plusieurs niveaux qu'on peut définir grâce à une liste déroulante. Les infos (niveau de l'arme et l'image correspondante) sont conservées de page en page grâce aux sessions.

## I. Environnement de développement

* PHP 7.4
* POO

## II. Points à retenir
 
1. Dans `__toString()`, il ne faut pas mettre d'`echo` (`<?= $expression ?>`). Il faut juste concaténer avec l'expression php. De même utiliser `$this` car on est dans la classe :

   ```php
        public function __toString()
            {
                $text .= '<td><img src="./sources/'.$this->image.'"></td>';
   ```  
2. Par rapport à la correction qui s'est contenté d'utiliser les setters pour changer un à un les images aléatoires, j'ai créé une fonction pour génrer le nombre alétoire (qui est différent selon l'arme) :

   ```php
        function genererNbreAleatoire($nom)
        {
            if ($nom === "Arc") {
                $nombreAleatoire = rand(1, 2);
            } else {
                $nombreAleatoire = rand(1, 5);
            }
            return $nombreAleatoire;
        }
   ```
3. Dans l'exo 6 : supprimer la propriété `$image` (le chemin de l'image) et la remplacer par `$level` qui vaut 1 par défaut (dans la classe : `$this->level=1;` pas `private $level = 1;`). On aura l'affichage d'une image selon son son `$nom` et son `$level`.
4. Dans `__toString()` au lieu de `$this->image`, on va créer une fonction pour récuperer le chemin de l'image `$this->getNomImage()`. Cette fonction utilisera aussi `str_replace()` pour enlever les caractères spéciaux des noms : Le chemin étant écrit selon le motif : `nom(sans les accents)/nomchiffre.png`. On va donc utiliser la propriété `$nom` et le `level`.
   
   ```php
       public function getNomImage(){
        $carcaterSpeciaux = ["à", "é", "é", "ç", "ù"];
        $remplacant = ["a", "e", "e", "c", "u"];
        $nomSansAccent = str_replace($carcaterSpeciaux, $remplacant, $this->nom);
        return $nomSansAccent . "/" . $nomSansAccent . $this->level . ".png"; 
    }
   ```
   
5. Dans l'exo 7 : ajouter la propriété `$levelMax` et une liste déroulante pour chaque arme en fonction de `$levelMax`. Cette liste déroulante est à mettre dans un formulaire avec la méthode `GET`. Dans `__toString()` il faut distinguer le `name` du `select` car il y a pluisieurs armes, par exemple en écrivant : 
   `$text  .= '<select name="level'.$this->nom.'">';` :  c'est cette info qui sera véhiculée lors de soumission du formulaire.

6. Pour lier la valeur de l'option choisi à l'image correspondante : 
    - On ajoute `onChange` sur le `select` : quand on change de valeur on soumet le formulaire.
        ```php
                $text  .= '<select onChange="submit()" name="level'.$this->nom.'">';

        ```
        A ce stade, si on clique sur une autre valeur de la liste déoulante, on voit que l'information a été transmise au niveau de l'url, mais l'image ne change pas !! 
        Il faut tester cette valeur transmise au niveau de l'affichage de la page, après l'instanciation des armes : Si on reçoit une info dans le `GET` on affichera l'image correspondante :

        ```php
            if(isset($_GET['levelépée'])){
            $arme1->setLevel($_GET['levelépée']);
        }
        if(isset($_GET['levelarc'])){
            $arme2->setLevel($_GET['levelarc']);
            etc..
        }
        ```
        ---
        **_<u>Problème_**</u> :
        
        si on clique sur un autre level d'une autre arme, on perd l'info de la première arme => il faut utiliser les sessions (voir Exo. 8).
        <hr>

7. Pour utiliser les variables de session :

   - commencer par `session_start()`, définir (et initialiser) les variables de session pour chaque arme :
        ```php
        if(!isset($_SESSION['épée']))$_SESSION['épée']=1;
        ....
        /* ici épée etc  ne sont que des noms arbitraires, on aurait pu écrire x, y, z etc.. */

        ```
        On doit mettre le `if(!isset())` car sinon, à chaque fois qu'on recharge la page on remettra les variable à 1, ce qui n'est pas le but.
    
    - Mettre à jour les variables de session lorsque le formulaire à été soumis :
     
        au lieu de :
        ```php
            if(isset($_GET['levelEpée'])){
            $arme1->setLevel($_GET['levelEpée']);
            }
        ```
        on écrira :
        ```php
            if(isset($_GET['levelEpée'])){
            $_SESSION['Epée']=$_GET['levelEpée'];
            }
            .....
        ```

    - Puis mettre à jour les `level` pour pouvoir modifier l'image : 

        ```php
            $arme1->setLevel($_SESSION['Epée']);
            .....
        ```
8. Concerver le bon `level` de l'arme dans l'affichage de la liste déroulante :

    Dans `__toString`, dans `<option>`, tester le "bon" `level` et metre `selected`:

    ```php
    for ($i = 1; $i <= $this->levelMax; $i++) {
        $text .= '<option value="' . $i . '"';
        $text .= ($i === (int)$_SESSION[$this->nom]) ? "selected" : "";
        $text .= '>' . $i . '</option>';
    }
    ```
    <ins>ATTENTION :</ins> `$_SESSION[$this->nom]` est un chiffre. Mettre (int) pour éviter erreur.