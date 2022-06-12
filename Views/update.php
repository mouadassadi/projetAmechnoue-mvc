<?php
if(isset($_POST['id'])){
    $existEtudiant = new etudiantController();
    $etudinat=$existEtudiant->getOneEtudiant();
}else{
    Redirect::to('home');
}
if(isset($_POST['submit'])){
    $existEtudiant = new etudiantController();
	$existEtudiant->updateEtudiant();
}
    //print_r($etudinat); ?>
    <div class="container">
        <div class="row my-4">
            <div class ="col-md-8 mx-auto">
                <div class ="card">
                    <div class="card-header"><b><i>Modifier un étudiant</i></b></div>
                    <div class ="card-body bg-light">
                    <a href="<?php echo base_url;?>"class="btn btn-sm btn-secondary mr-2 mb-2">
                        <i class="fas fa-home"></i>
                    </a>
                    <form action="" method="post">
                    <div class="form-group ">
                            <label for="nom">Code etudiant</label>
                            <input type="text" name="id" value="<?php echo $etudinat->code_etudiant; ?>" class="form-control" placeholder="Nom">
                       </div>
                       <div class="form-group ">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" value="<?php echo $etudinat->nom; ?>" class="form-control" placeholder="Nom">
                       </div>
                       <div class="form-group ">
                            <label for="prenom">Prenom</label>
                            <input type="text" name="prenom" value="<?php echo $etudinat->prenom; ?>" class="form-control" placeholder="Prenom">
                       </div>
                       <div class="form-group ">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?php echo $etudinat->email; ?>" class="form-control" placeholder="E-mail">
                       </div>
                       <div class="form-group ">
                            <label for="adresse">Adresse</label>
                            <input type="text" name="adresse" value="<?php echo $etudinat->adresse; ?>" class="form-control" placeholder="Adresse">
                       </div>
                       <div class="form-group ">
                            <label for="niveau">Niveau</label>
                            <input type="text" name="niveau" value="<?php echo $etudinat->niveau; ?>" class="form-control" placeholder="Niveau">
                       </div>
                       <div class="form-group ">
                            <label for="naiss">Date de naissance</label>
                            <input type="date" name="naiss" value="<?php echo $etudinat->date_naissance; ?>" class="form-control" placeholder="Date de naissance">
                       </div>
                       <div class="form-group ">
                            <label for="etat">Etat</label>
                            <input type="text" value="<?php echo $etudinat->etat; ?>" name="etat" class="form-control" placeholder="Etat">
                       </div>
                       <div class="form-group">
                            <button type="submit"  class="btn btn-primary" name="submit">Valider</button>
                       </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>