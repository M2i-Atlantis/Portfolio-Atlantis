<div class="container my-4">
    <h1 class="text-center my-4">CV</h1>

    <div class="list-group">
        <?php if (!empty($allCv)): ?>
            <?php foreach ($allCv as $cv): ?>
                <a href="<?= sprintf('/cv/%d', $cv->getId()) ?>" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">
                            <?= $cv->lastname ?> <?= $cv->firstname ?>
                        </h5>
                        <small>Mise à jour le <?= date("d/m/Y", strtotime($cv->getUpdatedAt())) ?></small>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>