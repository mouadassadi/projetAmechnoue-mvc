<?php
class etudiantController{
    public function getAlletudiant(){
        $etudinats = etudiant::getAll();
        return $etudinats; 
    }
    public function getOneEtudiant(){
        if(isset($_POST['id'])){
            $data = array(
                'id' => $_POST['id']
            );
            $etudiant = etudiant::getEtudiant($data);
            
            return $etudiant;
        } 
    }
    public function updateEtudiant(){
		if(isset($_POST['submit'])){
			$data = array(
                'id'=> $_POST['id'],
				'nom' => $_POST['nom'],
				'prenom' => $_POST['prenom'],
				'email' => $_POST['email'],
				'adresse' => $_POST['adresse'],
				'niveau' => $_POST['niveau'],
				'date_naissance' => $_POST['naiss'],
				'etat' => $_POST['etat'],
			);
			$result = etudiant::update($data);
			if($result === 'ok'){
				Session::set('success','Etudiant(e) modifié(e) avec succès');
				Redirect::to('home');
			}else{
				echo $result;
			}
		}
	}
    public function addEtudiant(){
        if(isset($_POST['submit'])){
            $data = array(
                'code_etudiant'=>$_POST['code_etudiant'],
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'email'=> $_POST['email'],
                'adresse'=>$_POST['adresse'],
                'niveau'=>$_POST['niveau'],
                'date_naissance'=>$_POST['naiss'],
                'etat'=>$_POST['etat'],
            );
            $resultat = etudiant::add($data);
            if($resultat === 'ok'){
				Session::set('success','Etudiant(e) ajouté(e) avec succès');
				Redirect::to('home');
			}else{
				echo $resultat;
			}
        }
    }
    public function findEtudiant(){
		if(isset($_POST['search'])){
			$data = array('search' => $_POST['search']);
		}
		$etudiants = etudiant::searchEtudiant($data);
		return $etudiants;
	} 

    public function deleteEtudiant(){
		if(isset($_POST['id'])){
			$data['id'] = $_POST['id'];
			$result = etudiant::delete($data);
			if($result === 'ok'){
				Session::set('success','Etudiant(e) supprimé(e) avec succès');
				Redirect::to('home');
			}else{
				echo $result;
			}
		}
	}
}

?>