<h1 class="display-4">Liste des Salles Informatiques</h1>
<?php
for ($i = 0; $i < count($listeDetail); $i++) 
{
    if($listeDetail[$i]["nSalle"] == $idS){
        ?>
    
        <div class="descrCard"><?= "<h2 class='titreSalle'>".$listeDetail[$i]['nomSalle'] . "</h2>"; ?>
            <br />
            <?= " Il y a ",$listeDetail[$i]["nbPoste"], " postes dans la salle" ?>
            <br>
            <?php for ($j = 0; $j < count($listeDetailPoste); $j++) {
               if($listeDetail[$i]["nomSalle"] == $listeDetailPoste[$j]["nomSalle"]) {?>
                 <br/><br/><h3><?= " ",$listeDetailPoste[$j]["nomPoste"]," :"; ?></h3> <br/>
                <?= "Numéro De Poste : ",$listeDetailPoste[$j]["nPoste"];?> <br/>
                <?= "IP : ",$listeDetailPoste[$j]["indIP"],".",$listeDetailPoste[$j]["ad"];?> <br/>
                <?= "Type Poste : ",$listeDetailPoste[$j]["typePoste"];
            }}?>
            <br />
        </div>
        <?php
    }
}
?>