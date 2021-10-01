<div class="container my-4">
    <h2 class="text-center">Mon CV</h2>

    <?php if(!empty($_SESSION['successMessage'])): ?>
        <div class="alert alert-success" role="alert" id="alertBox">
            <?= $_SESSION['successMessage'] ?>
        </div>
    <?php endif; ?>

    <p>Futur contenu...</p>

</div>