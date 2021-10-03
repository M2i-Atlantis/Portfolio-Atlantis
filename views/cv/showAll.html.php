<div class="container my-4">
    <h1 class="text-center my-4">CV</h1>

    <?php if (!empty($allCv)): ?>
        <?php foreach ($allCv as $cv): ?>
            <div class="list-group">
                <a href="<?= sprintf('/cv/%d', $cv->getIdUser()) ?>" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">
                            <?= $cv->lastname ?> <?= $cv->firstname ?>
                        </h5>
                        <small>Mise à jour le <?= date("d/m/Y", strtotime($cv->getUpdatedAt())) ?></small>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>