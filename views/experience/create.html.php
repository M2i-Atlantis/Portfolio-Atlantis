<div class="card mb-2 mx-auto" style="width: 80vw" ;>
<h1 class="text-center">Ajouter une Expérience</h1>
<form method="post" enctype="multipart/form-data">
    <div>
        <!-- A METTRE EN FORME ! -->
        <?= isset($errors) ? implode("<br/>", $errors): "" ?>
    </div>

    <input type="hidden" name="idCv" value="<?=$idCv?>">
    <!-- Intitulé de l'expérience -->
    <div class="form-group">
        <label for="title">Intitulé</label>
        <input type="text" name="title" class="form-control" id="title" value="<?= (isset($experience)) ? $experience->getName() : ""; ?>">
    </div>

    <!-- Date de début de l'expérience -->
    <div class="form-group">
        <label for="date">Date de début</label>
        <input type="date" name="startDate" class="form-control" id="startDate" value="<?= (isset($experience)) ? $experience->getStartDate() : ""; ?>">
    <!-- </div> -->

    <!-- Date de fin de l'expérience -->
    <!-- <div class="form-group"> -->
        <label for="date">Date de fin</label>
        <input type="date" name="endDate" class="form-control" id="endDate" value="<?= (isset($experience)) ? $experience->getEndDate() : ""; ?>">

        <label for="date">Lieu</label>
        <input type="text" name="location" class="form-control" id="location" value="<?= (isset($experience)) ? $experience->getLocation() : ""; ?>">
    </div>
    
    <div class="form-group">
        <label for="city">Type de Contrat</label>
        <select class='form-control' name='typeOfContract' id='typeOfContract value="<?= (isset($experience)) ? $experience->getContractType() : ""; ?>">
            <option value='null'>Sélectionner un type de contrat</option>
            <?php
            foreach ($contracts as $contract) {
                echo "<option value=\"{$contract['id']}\">{$contract['name']}</option>";
            }
            ?>
        </select>
    </div>

    <label for="content">Description</label><textarea name="description" id="description" cols="30" rows="10"><?= (isset($article)) ? $article->getDescription() : ""; ?></textarea>
    <input type="submit" value="Envoyer">

</form>
</div>


