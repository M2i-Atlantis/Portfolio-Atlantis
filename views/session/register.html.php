<div class="container my-4">
    <h2>S'inscrire</h2>

    <?php if(isset($errorMessage)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $errorMessage ?>
        </div>
    <?php elseif(isset($successMessage)): ?>
        <div class="alert alert-success" role="alert">
            <?= $successMessage ?>
        </div>
    <?php endif; ?>
    
    <form action="" method="POST" class="mt-5">
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="username" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="lastname" class="form-label">Nom</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
            </div>
            <div class="col-md-6">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
            </div>
        </div>
        <div class="mb-3">
            <label for="adress" class="form-label">Adresse</label>
            <input type="username" class="form-control" id="adress" name="adress" placeholder="00 nom de la rue, 00000 ville">
        </div>
        <button type="submit" class="btn btn-primary float-end">S'inscrire</button>
    </form>
</div>