<div id="contenu">
    <h3>Liste des mois avec des fiches de frais à valider</h3>
    <form method="GET" action="index.php">
        <label for="lstMois">Mois :</label>
        <select name="lstmois" id="lstMois">
        <?php foreach($aValider as $annee => $mois): ?>
            <?php foreach($mois as $item): ?>
            <option value="<?php echo $annee . $item ?>" <?php echo (isset($_POST['lstmois']) && $_POST['lstmois'] == $annee . $item) ? 'selected': ''; ?>><?php echo $item . " / " . $annee; ?></option>
            <?php endforeach; ?>
        <?php endforeach; ?>
        </select>

        <input type="hidden" name="uc" value="gererValidationFrais">
        <input type="hidden" name="action" value="demandeValiderFrais">
        <input type="hidden" name="part" value="2">
        <?php if($part === "2"): ?>
            <label for="lstVisiteurs">Liste des visiteurs :</label>
            <select name="lstvisiteurs" id="lstVisiteurs">
                <?php foreach($visiteurs as $visiteur): ?>
                    <option value="<?php echo $visiteur->id; ?>" <?php echo (isset($_GET['lstvisiteurs']) && $_GET['lstvisiteurs'] === $visiteur->id) ? 'selected' : ''; ?>><?php echo $visiteur->nom . " " . $visiteur->prenom; ?></option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>
        <button type="submit">Valider</button>
    </form>
    <?php if(isset($afficherFiche) && $afficherFiche): ?>
        <h2>Les frais hors forfait</h2>
        <table style="width:100%">
            <thead>
            <tr>
                <th>Libellé</th>
                <th>Montant</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($fiche["horsForfait"] as $frais): ?>
                    <tr>
                        <td><?php echo $frais['libelle']; ?></td>
                        <td><?php echo $frais['montant']; ?>€</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p>&nbsp;</p>
        <h2>Les frais forfaitaires</h2>
        <table style="width:100%">
            <form method="POST" action="index.php?uc=gererValidationFrais&action=actualiserFrais">
            <thead>
            <tr>
                <th>Libellé</th>
                <th>Quantité</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($fiche['forfait'] as $ficheF): ?>
                    <tr>
                        <td><?php echo $ficheF['libelle']; ?></td>
                        <td><input type="text" name="frais[<?php echo $ficheF['idfrais']; ?>]" value="<?php echo $ficheF['quantite']; ?>"></td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <td colspan="2">
                        <button type="submit" style="width:100%">Actualiser</button>
                        <input type="hidden" name="idvisiteur" value="<?php echo $_GET['lstvisiteurs']; ?>">
                        <input type="hidden" name="mois" value="<?php echo $_GET['lstmois']; ?>">
                    </td>
                </tr>
            </tbody>
            </form>
        </table>
        <form style="text-align: center" method="" action="">
            <p><button type="submit">Valider la fiche</button></p>
        </form>
    <?php endif; ?>
</div>
