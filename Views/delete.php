<?php 
	if(isset($_POST['id'])){
		$exitEmploye = new etudiantController();
		$exitEmploye->deleteEtudiant();
	}
?>