<div class="card mb-2 mt-2 mx-auto" style="width: 80vw" ;>
<div class="card-header bg-dark text-white">
<h1 class="card-title text-center">Ajouter une Expérience</h1>
</div>

<form method="post" enctype="multipart/form-data">
    <div>
        <!-- A METTRE EN FORME ! -->
        <?= isset($errors) ? implode("<br/>", $errors): "" ?>
    </div>

    <input type="hidden" name="idCv" value="<?=$idCv?>">
    <!-- Intitulé de l'expérience -->
    <div class="form-group">
        <div class="card-header mt-2 bg-dark text-white">
        <label for="title">Intitulé</label>
        </div>
        <input type="text" name="title" class="form-control" id="title" value="<?= (isset($experience)) ? $experience->getName() : ""; ?>">
    </div>

    <!-- Date de début de l'expérience -->
    <div class="form-group">
    <div class="card-header bg-dark text-white">
        <label for="date">Date de début</label>
    </div>
        <input type="date" name="startDate" class="form-control" id="startDate" value="<?= (isset($experience)) ? $experience->getStartDate() : ""; ?>">
    <!-- </div> -->

    <!-- Date de fin de l'expérience -->
    <!-- <div class="form-group"> -->
    <div class="card-header bg-dark text-white">
        <label for="date">Date de fin</label>
    </div>
        <input type="date" name="endDate" class="form-control" id="endDate" value="<?= (isset($experience)) ? $experience->getEndDate() : ""; ?>">
        <div class="card-header bg-dark text-white">
        <label for="date">Lieu</label>
        </div>
        <input type="text" name="location" class="form-control" id="location" value="<?= (isset($experience)) ? $experience->getLocation() : ""; ?>">
    </div>
    
    <div class="form-group">
    <div class="card-header bg-dark text-white">
        <label for="city">Type de Contrat</label>
    </div>
        <select class='form-control' name='typeOfContract' id='typeOfContract value="<?= (isset($experience)) ? $experience->getContractType() : ""; ?>">
            <option value='null'>Sélectionner un type de contrat</option>
            <?php
            foreach ($contracts as $contract) {
                echo "<option value=\"{$contract['id']}\">{$contract['name']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
    <div class="card-header bg-dark text-white">
    <label for="content">Description</label>
    </div>
    <textarea name="description" id="description"><?= (isset($article)) ? $article->getDescription() : ""; ?></textarea>
    </div>
    
<input type="submit" value="Envoyer">
</form>

</div>


