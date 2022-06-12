<?php 

class User{

	static public function login($data){
		$username = $data['username'];
		try{
			$query = 'SELECT * FROM users WHERE username=:username';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":username" => $username));
			$user = $stmt->fetch(PDO::FETCH_OBJ);
			return $user;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
	static public function searchEtudiant($data){
		$search = $data['search'];
		try{
			$query = 'SELECT * FROM etudiant WHERE nom LIKE ? OR prenom LIKE ?';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array('%'.$search.'%','%'.$search.'%'));
			$etudiants = $stmt->fetchAll();
			return $etudiants;
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
	static public function createUser($data){
		$stmt = DB::connect()->prepare('INSERT INTO users (fullname,username,pass)
			VALUES (:fullname,:username,:pass)');
		$stmt->bindParam(':fullname',$data['fullname']);
		$stmt->bindParam(':username',$data['username']);
		$stmt->bindParam(':pass',$data['pass']);

		if($stmt->execute()){
			return 'ok';
		}else{
			return 'error';
		}
		$stmt->close();
		$stmt = null;
	}

}

 ?>