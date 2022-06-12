<?php
	if(isset($_POST['find'])){
		$data = new etudiantController();
		$etudiants = $data->findEtudiant();
	}else{
		$data = new etudiantController();
		$etudiants = $data->getAllEtudiant();
	}
     ?>
    <div class="container">
        <div class="row my-4">
            <div class ="col-md-15 mx-auto">
                <div class ="card">
                    <div class ="card-bod bg-light">
                    <a href="<?php echo base_url;?>add" class="btn btn-sm btn-primary mr-2 mb-2 mt-2 ml-2">
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="<?php echo base_url;?>" class="btn btn-sm btn-secondary mr-2 mb-2 mt-2 ml-2">
						<i class="fas fa-home"></i>
					</a>
                    <a href="<?php echo base_url;?>home" title="home" class="btn btn-sm btn-primary mr-2 mb-2 mt-2">
						<i class="fas fa-user mr-2 ml-2">  <?php echo ($_SESSION['username']);?></i>
					</a>
					<a href="<?php echo base_url;?>logout" title="Déconnexion" class="btn btn-sm btn-secondary mr-2 mb-2 mt-2 ml-2">
						<i > <b> <?php echo "Déconnexion";?></b></i>
					</a>
                    <form method="post" class="float-right mb-2 mt-2 mr-2 d-flex flex-row">
						<input type="text" class="form-control" name="search" placeholder="Recherche">
						<button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></i></button>
					</form>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Nom </th>
                            <th scope="col">Prénom</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Niveau</th>
                            <th scope="col">Date de naissance</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($etudiants as $student):?>
                            <tr>
                            <td scope="row"><?php echo $student['nom']  ?></td>
                            <td> <?php echo $student['prenom']  ?></td>
                            <td> <?php echo $student['email']  ?></td>
                            <td><?php echo $student['adresse']  ?></td>
                            <td><?php echo $student['niveau']  ?></td> 
                            <td><?php echo $student['date_naissance']  ?></td>
                           
                            <td><?php echo $student['etat']? '<span class="badge badge-success" > Inscrit(e)</span>':
                             '<span class="badge badge-danger"> non inscrit(e) </span>'; ?></td>
                            <td class="d-flex flex-row">
                                <form action="update" class="mr-1" method="post">
                                    <input type="hidden" name="id" value="<?php echo $student['code_etudiant'] ?>">
                                    <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                </form>
                                <form action="delete" class="mr-1" method="post">
                                    <input type="hidden" name="id" value="<?php echo $student['code_etudiant'] ?>">
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>