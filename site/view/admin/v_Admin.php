<?php require_once('controllers/admin/c_Admin.php') ?>
<?php $title = "Piscines municipales de Rennes - Page administrateur"; ?>

<?php ob_start(); ?>

<?php $ControllerAdmin = new Admin ?>

<main>
    <h1>Gestion des formules</h1>
    <div class="alignRight">
        <div class="dispColumn">
            <?php $ControllerAdmin->printInfoConnection(); ?>
            <form method="post" action="index.php">
                <input type="hidden" name="action" value="adminRedirection">
                <input type="hidden" name="step" value="disconnect">
                <input type="submit" value="Déconnexion">
            </form>
        </div>
    </div>
    <div id="adminAction">
        <input class="btnSmall btnNotClicked btnAdminOption" type="button" value="Activités" name="divAct" onclick="adminClickEvent(this)" />
        <input class="btnSmall btnNotClicked btnAdminOption" type="button" value="Situations" name="divSit" onclick="adminClickEvent(this)" />
        <input class="btnSmall btnNotClicked btnAdminOption" type="button" value="Formules" name="divOff" onclick="adminClickEvent(this)" />
    </div>
    <div class="divInvisible divAdminOption" id="divAct">
        <h2>Activités</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Libellé</th>
                    <th>Description</th>
                    <th>Réservation</th>
                    <th>Actif</th>
                    <th>Modifier</th>
                    <th>Activer/</br>Désactiver</th>
                </tr>
            </thead>
            <tbody>
                <?php $ControllerAdmin->printActivityLines(); ?>
            </tbody>
        </table>
        <h2>Ajouter une activité</h2>
        <form method="post" action="index.php?action=adminRedirection&step=addActivity">
        <input type="hidden" name="action" value="adminRedirection">
        <input type="hidden" name="step" value="addActivity">
            <div class="colDiv">
                <div class="vDiv divAlignRight">
                    <label for="activityname">* Nom de l'activité</label>
                    <label for="description">* Description</label>
                </div>
                <div class="vDiv divAlignLeft">
                    <input type="text" name="activityname" required>
                    <input class="txtDescription" type="text" name="description" required>
                    <label class="lblChkbox"><input type="checkbox" name="booking" value="1">Réservation nécessaire</label>
                    <label class="lblChkbox"><input type="checkbox" name="active" value="1" checked>Activité disponible</label>
                    <input type="submit" value="Ajouter l'activité"></input>
                </div>
            </div>
        </form>
    </div>

    <div class="divInvisible divAdminOption" id="divSit">
        <h2>Situations</h2>
        <table>
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Actif</th>
                    <th>ID</th>
                    <th>Modifier</th>
                    <th>Activer/</br>Désactiver</th>
                </tr>
            </thead>
            <tbody>
                <?php $ControllerAdmin->printSituationLines(); ?>
            </tbody>
        </table>
        <h2>Ajouter une situation</h2>
        <form method="post" action="index.php">
        <input type="hidden" name="action" value="adminRedirection">
        <input type="hidden" name="step" value="addSituation">
            <div class="colDiv">
                <div class="vDiv divAlignRight">
                    <label for="situationname">* Nom de la situation</label>
                </div>
                <div class="vDiv divAlignLeft">
                    <input type="text" name="situationname" required>
                    <label class="lblChkbox"><input type="checkbox" name="active" value="1" checked>Situation disponible</label>
                    <input type="submit" value="Ajouter la situation"></input>
                </div>
            </div>
        </form>
    </div>

    <div class="divInvisible divAdminOption" id="divOff">
        <h2>Formules</h2>
    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>