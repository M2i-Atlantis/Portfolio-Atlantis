<form method="POST">
    Etes-vous sur de vouloir supprimer <?= $experience->getName() ?> ?
    <button name="delete">Confirmer</button>
    <a href="/experience/<?= $experience->getCvId() ?>">Annuler</a>
</form>