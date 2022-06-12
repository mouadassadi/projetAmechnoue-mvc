<?php

class etudiant{
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM etudiant');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }
    static public function searchEtudiant($data){
		$search = $data['search'];
		try{
			$query = 'SELECT * FROM etudiant WHERE nom LIKE ? OR prenom LIKE ?';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%','%'.$search.'%'));
			$etudiant = $stmt->fetchAll();
			return $etudiant;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
   
    static public function getEtudiant($data){
        $id = $data['id'];
        try {
            $query = 'SELECT * FROM etudiant WHERE code_etudiant=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id"=> $id));
            $etudiant = $stmt->fetch(PDO::FETCH_OBJ);
          
            return $etudiant; 
        } catch (PDOException $ex) {
           echo 'Erreur, '.$ex->getMessage();
        }
    }
    static public function update($data){
		$stmt = DB::connect()->prepare('UPDATE etudiant SET nom = :nom,prenom =:prenom,email =:email,adresse =:adresse,niveau=:niveau,date_naissance=:date_naissance,etat=:etat WHERE code_etudiant=:id');
		$stmt->bindParam(':id',$data['id']);
		$stmt->bindParam(':nom',$data['nom']);
		$stmt->bindParam(':prenom',$data['prenom']);
		$stmt->bindParam(':email',$data['email']);
		$stmt->bindParam(':adresse',$data['adresse']);
		$stmt->bindParam(':niveau',$data['niveau']);
		$stmt->bindParam(':date_naissance',$data['date_naissance']);
		$stmt->bindParam(':etat',$data['etat']);
		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}
    
    static public function add($data){
        $stmt = DB::connect()->prepare('INSERT INTO etudiant(code_etudiant,nom,prenom,email,niveau,adresse,date_naissance,etat) values(:code_etudiant,:nom,:prenom,:email,:niveau,:adresse,:date_naissance,:etat)');
        $stmt->bindParam(':code_etudiant',$data['code_etudiant']);
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':prenom',$data['prenom']);
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':niveau',$data['niveau']);
        $stmt->bindParam(':adresse',$data['adresse']);
        $stmt->bindParam(':date_naissance',$data['date_naissance']);
        $stmt->bindParam(':etat',$data['etat']);
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt=null;
    }
    static public function delete($data){
		$id = $data['id'];
		try{
			$query = 'DELETE FROM etudiant WHERE code_etudiant=:id';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":id" => $id));
			if($stmt->execute()){
				return 'ok';
			}
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
}
?>