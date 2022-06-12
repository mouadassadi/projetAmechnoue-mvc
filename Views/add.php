<?php
if(isset($_POST['submit'])){
    $newetudiant = new etudiantController();
    $newetudiant->addEtudiant();
}
    //print_r($etudinat); ?>
    <div class="container">
        <div class="row my-4">
            <div class ="col-md-8 mx-auto">
                <div class ="card">
                    <div class="card-header"><b><i>Ajout d'un étudiant</i></b></div>
                    <div class ="card-body bg-light">
                    <a href="<?php echo base_url;?>"class="btn btn-sm btn-secondary mr-2 mb-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <form action="" method="post">
                        <div class="form-group ">
                            <label for="code_etudiant">Code élève</label>
                            <input type="text" name="code_etudiant" class="form-control" placeholder="Code élève">
                       </div>
                       <div class="form-group ">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" class="form-control" placeholder="Nom">
                       </div>
                       <div class="form-group ">
                            <label for="prenom">Prenom</label>
                            <input type="text" name="prenom" class="form-control" placeholder="Prenom">
                       </div>
                       <div class="form-group ">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="E-mail">
                       </div>
                       <div class="form-group ">
                            <label for="adresse">Adresse</label>
                            <input type="text" name="adresse" class="form-control" placeholder="Adresse">
                       </div>
                       <div class="form-group ">
                            <label for="niveau">Niveau</label>
                            <input type="text" name="niveau" class="form-control" placeholder="Niveau">
                       </div>
                       <div class="form-group ">
                            <label for="naiss">Date de naissance</label>
                            <input type="date" name="naiss" class="form-control" placeholder="Date de naissance">
                       </div>
                       <div class="form-group ">
                            <label for="etat">Etat</label>
                            <input type="text" name="etat" class="form-control" placeholder="Etat">
                       </div>
                       <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="submit">Valider</button>
                       </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>