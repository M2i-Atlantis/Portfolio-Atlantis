<h1 class="text-center mt-2">Liste des expériences</h1>

<a href="<?= sprintf('/experience/create/%d', $idCv) ?>">Ajouter une expérience</a>

<?php foreach ($experiences as $exp) : ?>
    <div class="card mb-2 mx-auto" style="width: 45vw" ;>
        <div class="card-body">
            <!-- <article> -->
            <h3 class="card-title text-center mb-4"><?= $exp->getName() ?></h3>
            <div class="row align-items-center">
                <p>De <?= $exp->getStartDate() ?>
                    à <?= $exp->getEndDate() ?>
                    à <?= $exp->getLocation() ?>
                    • <?= $exp->getContractType() ?></p>
            </div>
            <p class="text-justify"><?= nl2br($exp->getDescription()) ?></p>
            <a href="<?= sprintf('/experience/%d/show', $exp->getId()) ?>">Voir l'expérience</a>
            <!-- </article> -->
        </div>
    </div>

<?php endforeach; ?>
