<h1>Liste des Salles Informatiques</h1>
<?php
for ($i = 0; $i < count($listeSalle); $i++) 
{
    ?>
    <div class="card">
        <div class="descrCard"><?= "<div class='titreSalle'><a href='./?action=detail&nSalle=" . $listeSalle[$i]['nSalle'] . "'>" . $listeSalle[$i]['nomSalle'] . "</a></div>"; ?>
            <br />
        </div>

    </div>
    <?php
}
?>


