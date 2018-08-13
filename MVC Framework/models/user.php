<?php

class UserModel extends Model{
	
	public function register(){
		//Sanitize POSOT
		$post = filter_input_array(INPUT_POST ,FILTER_SANITIZE_STRING);
		
		$password = md5($post['password']);
		
		if($post['submit']){
			if($post['name'] == '' || $post['email'] == '' || $post['password'] == ''){
				Messages::setMsg('Fill in all fields', 'error');
				return;
			}
			$this->query('SELECT email, password FROM users WHERE email = :email AND password = :password');
		$this->bind(':email',$post['email']);
		$this->bind(':password',$password);
		$this->execute();
		if($this->resultset()){
			Messages::setMsg('E-mail and password', 'error');
			return ;
		} 
			//Insert data to database;
			$this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
			$this->bind(':name',$post['name']);
			$this->bind(':email',$post['email']);
			$this->bind(':password',$password);
			$this->execute();
			if($this->lastInsertID()){
				header('Location: '. ROOT_URL. 'users/login');
			}

		}
		return;
	}
	
	public function emailExist(){
		
		$this->query('SELECT email, password FROM users WHERE email = :email AND password = :password');
		$this->bind(':email',$post['email']);
		$this->bind(':password',$password);
		$this->execute();
		if($this->resultset()){
			Messages::setMsg('E-mail and password', 'error');
			return true;
		} else {
			return false;
		}
		
	}
	
	public function login(){
		$post = filter_input_array(INPUT_POST ,FILTER_SANITIZE_STRING);
		
		$password = md5($post['password']);
		
		if($post['submit']){
			//COMPARE LOGIN
			$this->query('SELECT * FROM users WHERE email = :email and password = :password');
			$this->bind(':email',$post['email']);
			$this->bind(':password',$password);
			$this->execute();
			$row = $this->single();
			
			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"id" => $row['id'],
					"name" => $row['name'],
					"email" => $row['email']
				);
				header('Location: '. ROOT_URL. 'shares');
			} else {
				Messages::setMsg('Incorrect Login', 'error');
			}

		}
		return;
	}
}