<div class="container my-4">
    <div class="card mb-2 mx-auto" style="width: 50vw;margin: auto" ;>
        <h1 class="text-center">Modifier la formation</h1>
        <form method="POST" enctype="multipart/form-data">

            <input type="hidden" name="idCv" value="<?=$idCv?>">
            <input type="hidden" name="id" value="<?=(isset($training)) ? $training->getId() : "";?>">
            <!-- Nom de l'école -->
            <div class="form-group">
                <label for="title">Ecole</label>
                <input type="text" name="school_name" class="form-control" id="School_name" value="<?=(isset($training)) ? $training->getSchool_name() : "";?>">
            </div>

            <!-- Intitulé de formation -->
            <div>
                <label for="date">Intitulé de formation</label>
                <input type="text" name="training_name" class="form-control" id="Training_name" value="<?=(isset($training)) ? $training->getTraining_name() : "";?>">
            </div>

            <!-- Diplome obtenu -->
            <div>
                <label for="date">Diplome obtenu</label>
                <input type="text" name="diploma" class="form-control" id="Training_name" value="<?=(isset($training)) ? $training->getDiploma() : "";?>">
            </div>

            <!-- Date de début de l'expérience -->
            <div class="form-group">
                <label for="date">Date de début</label>
                <input type="date" name="starting_date" class="form-control" id="Starting_date" value="<?=(isset($training)) ? $training->getStarting_date() : "";?>">
            </div>

            <!-- Date de fin de l'expérience -->
            <div class="form-group">
                <label for="date">Date de fin</label>
                <input type="date" name="ending_date" class="form-control" id="Ending_date" value="<?=(isset($training)) ? $training->getEnding_date() : "";?>">
            </div>

            <!-- Details de la formation -->
            <div class="form-group">
                <label for="content">Description</label><textarea name="description" id="description" cols="30" rows="10"><?=(isset($training)) ? $training->getDescription() : "";?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div>