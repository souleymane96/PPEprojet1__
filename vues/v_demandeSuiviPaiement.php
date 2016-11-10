<h2>Liste des fiches de frais</h2>
<select name="" id="">
    <?php foreach($fiches as $fiche): ?>
        <option value="<?= $fiche['mois'] . '-' . $fiche['idvisiteur'] ?>"><?=  substr($fiche['mois'], 4, 2) . ' - ' . $fiche['nom'] . ' ' . $fiche['prenom']; ?></option>
    <?php endforeach; ?>
</select>