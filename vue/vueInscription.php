<br>
<h1 class="h1">Inscription</h1>
<br>
<br>
<span id="alerte"><?= $msg ?></span>
<form action="./?action=inscription" method="POST">

    <input type="text" name="mailU" placeholder="Email de connexion" /><br />
    <input type="password" name="mdpU" placeholder="Mot de passe"  /><br />
    <input type="text" name="pseudoU" placeholder="Nom" /><br />
 <hr>

    <input type="submit" value="S'inscrire" class="btn btn-success"/>

</form>
