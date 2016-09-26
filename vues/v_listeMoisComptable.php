<div id="contenu">
    <h3>Liste des mois avec des fiches de frais à valider</h3>
    <form method="POST" action="index.php?uc=gererValidationFrais&action=listeVisiteurDate">
        <label for="lstMois">Mois :</label>
        <select name="lstmois" id="lstMois">
        <?php foreach($aValider as $annee => $mois): ?>
            <?php foreach($mois as $item): ?>
            <option value="<?php echo $annee . $item ?>"><?php echo $item . " / " . $annee; ?></option>
            <?php endforeach; ?>
        <?php endforeach; ?>
        </select>
        <button type="submit">Valider</button>
    </form>
</div>
