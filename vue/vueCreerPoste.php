<br>
<h1 class="h1">Créer un poste</h1>
<div class="row">
    <div class="col-md-12">
        <form action="./?action=creer" method="POST">
            <input type="text" name="numPoste" placeholder="Numéro du poste (ex : p1)" /><br />
            <input type="text" name="nomPoste" placeholder="Nom du poste"  /><br />
            </br> <span>Choix de la salle: </span><select class="btn btn-info dropdown-toggle" name="numSalle" id="listNomSalC">
            <?php
            for ($i = 0; $i < count($listeSalle); $i++) {
                ?>
                        <option><?php echo $listeSalle[$i]['nSalle'] ?> </option>
                <?php } ?>
            </select> </br> </br> 
            <span>Choix du type du poste: </span><select class="btn btn-info dropdown-toggle" name="typePoste" id="listTypeC">
            <?php
            for ($i = 0; $i < count($listeType); $i++) {
                ?>
                        <option><?php echo $listeType[$i]['typeLP'] ?> </option>
                <?php } ?>
            </select> </br></br> 
            <input type="submit" name="creerPoste" value="Creer le poste" class="btn btn-success"/>

        </form>
    </div>
</div>    