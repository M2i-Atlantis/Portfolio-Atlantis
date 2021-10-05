<?php 
use App\models\Project;
?>


<form action ='' method = 'post'>
    <label for='title'>Titre :</label>
    <input type='text' name='title' id='title' value='<?= $projectDao->getTitle() ?>'>

    <label for='description'>Votre description</label>
    <input type='text' name='description' id='description' value='<?= $projectDao->getDescription() ?>'>

    <label for='beginning'>Date de début du projet</label>
    <input type='text' name='beginning' id='beginning' value='<?= $projectDao->getBeginningDate() ?>'>

    <label for='ending'>Date de fin du projet</label>
    <input type='text' name='ending' id='ending' value='<?= $projectDao->getEndingDate() ?> '>

    <input type='submit' value='OK!'>
</form>

