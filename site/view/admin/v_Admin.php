<?php require_once('controllers/admin/c_Admin.php') ?>
<?php $title = "Piscines municipales de Rennes - Page administrateur"; ?>

<?php ob_start(); ?>

<?php $ControllerAdmin = new Admin ?>

<main>
    <h1>Gestion des options</h1>
    <div class="alignRight">
        <div class="dispColumn">
            <?php $ControllerAdmin->printInfoConnection(); ?>
            <form method="post" action="index.php?action=adminRedirection&step=disconnect">
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
                    <th>Libellé</th>
                    <th>Description</th>
                    <th>Réservation</th>
                    <th>Actif</th>
                    <th>ID</th>
                    <th>Modifier</th>
                    <th>Désactiver</th>
                </tr>
            </thead>
            <tbody>
                <?php $ControllerAdmin->printActivityLines(); ?>
            </tbody>
        </table>
        <form method="post" action="index.php?action=adminRedirection&step=addActivity">
            <input type="text" name="activityname" placeholder="Libellé de l'activité" required>
            <input type="text" name="description" placeholder="Description de l'activité" required>
            <label><input type="checkbox" name="booking" value="1">Réservation disponible</label>
            <label><input type="checkbox" name="active" value="1" checked>Activité disponible</label>
            <br>
            <button type="submit">Ajouter une activité</button>
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
                    <th>Désactiver</th>
                </tr>
            </thead>
            <tbody>
                <?php $ControllerAdmin->printSituationLines(); ?>
            </tbody>
        </table>
        <form method="post" action="index.php?action=adminRedirection&step=addSituation">
            <input type="text" name="situationname" placeholder="Libellé de la situation" required>
            <label><input type="checkbox" name="active" value="1" checked>Activité disponible</label>
            <br>
            <button type="submit">Ajouter une situation</button>
        </form>
    </div>

    <div class="divInvisible divAdminOption" id="divOff">
        <h2>Formules</h2>
    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('view/layout.php') ?>