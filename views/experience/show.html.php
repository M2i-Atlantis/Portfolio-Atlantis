<article>
    <div class="card mb-2 mx-auto" style="width: 45vw" ;>
        <div class="card-body">
            <h3 class="card-title text-center mb-4"><?= $experience->getName() ?></h3>
            <div class="row align-items-center">
                <p>De <?= $experience->getStartDate() ?>
                    à <?= $experience->getEndDate() ?>
                    à <?= $experience->getLocation() ?>
                    • <?= $experience->getContractType() ?></p>
            </div>
            <p class="text-justify"><?= nl2br($experience->getDescription()) ?></p>
        </div>
    </div>

    <a href="<?= sprintf('/experience/%d/edit', $experience->getId()) ?>">Editer l'expérience</a>
    <a href="<?= sprintf('/experience/%d/delete', $experience->getId()) ?>">Supprimer l'expérience</a>
</article>