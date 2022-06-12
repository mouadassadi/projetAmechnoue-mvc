<?php 

class UsersController {

	public function auth(){
		if(isset($_POST['submit'])){
			$data['username'] = $_POST['username'];
            echo $data['username'];
			$result = User::login($data);
			if($result->username === $_POST['username'] && $_POST['pass']===$result->password){

				$_SESSION['logged'] = true;
				$_SESSION['username'] = $result->username;
				Redirect::to('home');

			}else{
				Session::set('error','Pseudo ou mot de passe est incorrect');
				Redirect::to('login');
			}
		}
	}

	public function register(){
		if(isset($_POST['submit'])){
			$options = [
				'cost' => 12
			];
			$password=$_POST['pass'];
			$data = array(
				'fullname' => $_POST['fullname'],
				'username' => $_POST['username'],
				'pass' => $password,
			);
			$result = User::createUser($data);
			if($result === 'ok'){
				Session::set('success','Compte crée');
				Redirect::to('login');
			}else{
				echo $result;
			}
		}
	}

	static public function logout(){
		session_destroy();
	}


}
