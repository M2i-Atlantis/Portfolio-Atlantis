<div class="container my-4">
    <h1 class="text-center mb-3">
        <?= $cv->lastname ?> <?= $cv->firstname ?>
    </h1>

    <!-- About -->
    <div class="card my-4">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title">
                A propos

                <?php

                                use App\models\Contract;

if (isset($_SESSION['currentUser']) && $_SESSION['currentUser']->getId() === $cv->getIduser()) : ?>
                    <!-- Icon edit -->
                    <a href="#" class="link-light float-end">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                        </svg>
                    </a>
                <?php endif; ?>
            </h4>
        </div>
        <div class="card-body">
            <?= $cv->getAboutme() ?>
        </div>
    </div>

    <!------------------------------------------------------------ Experiences -------------------------------------------------------------->




    <div class="card my-4">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title">
                Expériences

                <?php if (isset($_SESSION['currentUser']) && $_SESSION['currentUser']->getId() === $cv->getIduser()) : ?>
                    <!-- Icon add -->

                    <a href="<?= sprintf('%d/experience/create', $cv->getId()) ?>" class="link-light float-end">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z" />
                        </svg>
                    </a>
                <?php endif; ?>
            </h4>
        </div>
        <div class="card-body">
            <div class="card mb-3">

                <?php foreach ($experiences as $exp) : ?>

                    <div class="card-header">

                        <?php if (isset($_SESSION['currentUser']) && $_SESSION['currentUser']->getId() === $cv->getIduser()) : ?>
                            <!-- Icon delete -->
                            <a href="<?= sprintf('experience/%d/delete', $exp->getId()) ?>" class="link-dark float-end ms-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </a>

                            <!-- Icon edit -->
                            <a href="<?= sprintf('experience/%d/edit', $exp->getId()) ?>" class="link-dark float-end">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                        <?php endif; ?>

                        <h3 class="card-title text-center mb-4"><?= $exp->getName() ?></h3>
                        <span>Du <?= $exp->getStartDate() ?>
                            au <?= $exp->getEndDate() ?>
                            à <?= $exp->getLocation() ?></span>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?= nl2br($exp->getDescription()) ?></p>
                    </div>
                    <div class="card-footer">
                        <span class="badge bg-primary"><?= current(array_filter($contracts, fn($contract) => $contract["id"] == $exp->getContractType()))["name"] ?></span>
                    </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>




    <!------------------------------------------------------------ Experiences -------------------------------------------------------------->

    <!-- Projects -->
    <div class="card my-4">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title">
                Projets

                <?php if (isset($_SESSION['currentUser']) && $_SESSION['currentUser']->getId() === $cv->getIduser()) : ?>
                    <!-- Icon add -->
                    <a href="#" class="link-light float-end">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z" />
                        </svg>
                    </a>
                <?php endif; ?>
            </h4>
        </div>
        <div class="card-body">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">
                        Portfolio

                        <?php if (isset($_SESSION['currentUser']) && $_SESSION['currentUser']->getId() === $cv->getIduser()) : ?>
                            <!-- Icon delete -->
                            <a href="#" class="link-dark float-end ms-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </a>

                            <!-- Icon edit -->
                            <a href="#" class="link-dark float-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </h5>
                    <span>Du 10/05/2019 au ...</span>
                </div>
                <div class="card-body">
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer text-muted">
                    <span class="badge bg-primary">PHP</span>
                    <span class="badge bg-primary">MVC</span>
                    <span class="badge bg-primary">Windows</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Trainings -->
    <div class="card my-4">
        <div class="card-header bg-dark text-white">
            <h4 class="card-title">
                Formations

                <?php if (isset($_SESSION['currentUser']) && $_SESSION['currentUser']->getId() === $cv->getIduser()) : ?>
                    <!-- Icon add -->
                    <a href="#" class="link-light float-end">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z" />
                        </svg>
                    </a>
                <?php endif; ?>
            </h4>
        </div>
        <div class="card-body">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">
                        O'clock

                        <?php if (isset($_SESSION['currentUser']) && $_SESSION['currentUser']->getId() === $cv->getIduser()) : ?>
                            <!-- Icon delete -->
                            <a href="#" class="link-dark float-end ms-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg>
                            </a>

                            <!-- Icon edit -->
                            <a href="#" class="link-dark float-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </h5>
                    <span>Du 10/05/2019 au 20/01/2021</span>
                </div>
                <div class="card-body">
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
    </div>
</div>