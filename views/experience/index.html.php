<h1>Liste des articles</h1>
<?php foreach ($experiences as $exp) : ?>
    <article>
        <h2><?= $exp->getName() ?></h2>
        <span><?= $exp->getStartDate() ?></span>
        <span><?= $exp->getEndDate() ?></span>
        <p><?= $exp->getLocation() ?></p>
        <p><?= nl2br($exp->getDescription()) ?></p>
        <p><?= $exp->getContractType() ?></p>
        <p><?= $exp->getCvId() ?></p>
        <a href="<?= sprintf('/experience/%d/show', $exp->getId()) ?>">Voir l'expérience</a>
    </article>
<?php endforeach; ?>