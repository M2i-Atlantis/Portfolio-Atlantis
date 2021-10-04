<div class="container my-4">
    <h2>Modifier mes informations</h2>

    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($errors as $currentError) : ?>
                <div><?= $currentError ?></div>
            <?php endforeach ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST" class="mt-5">
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input
                type="text"
                class="form-control"
                id="username"
                name="username"
                value="<?= $inputContent->getUsername() ?>"
            >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                class="form-control"
                id="email" name="email"
                placeholder="name@example.com"
                value="<?= $inputContent->getEmailAdress() ?>"
            >
            <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Remplissez ce champ si vous voulez modifier le mot de passe.">
            <div id="passwordHelp" class="form-text">Dois contenir entre 8 et 15 caractères dont une majuscule, un chiffre et un caractère non-alphanumérique.</div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="lastname" class="form-label">Nom</label>
                <input
                    type="text"
                    class="form-control"
                    id="lastname"
                    name="lastname"
                    value="<?= $inputContent->getLastname() ?>"
                >
            </div>
            <div class="col-md-6">
                <label for="firstname" class="form-label">Prénom</label>
                <input
                    type="text"
                    class="form-control"
                    id="firstname"
                    name="firstname"
                    value="<?= $inputContent->getFirstname() ?>"
                >
            </div>
        </div>
        <div class="mb-3">
            <label for="adress" class="form-label">Adresse</label>
            <input
                type="text"
                class="form-control"
                id="adress"
                name="adress"
                placeholder="Exemple : 00 nom de la rue, 00000 ville"
                value="<?= $inputContent->getHomeAdress() ?>"
            >
        </div>
        <button type="submit" class="btn btn-primary float-end">Modifier</button>
    </form>
</div>