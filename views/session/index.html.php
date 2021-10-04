<div class="container my-4">
    <h2>Se connecter</h2>

    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($errors as $currentError) : ?>
                <div><?= $currentError ?></div>
            <?php endforeach ?>
        </div>
    <?php endif; ?>
    
    <form action="" method="POST" class="mt-5">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary float-end">Connexion</button>
    </form>
    <p class="small mt-3">
        Pas de compte ? <a href="/register" class="link-danger">S'incrire</a>
    </p>
</div>