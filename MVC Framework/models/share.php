<?php

class ShareModel extends Model{
	public function Index(){
		$this->query('SELECT * FROM shares ORDER BY create_date DESC');
		$rows = $this->resultset();
		return $rows;
	}
	public function add(){
		//Sanitize POSOT
		$post = filter_input_array(INPUT_POST ,FILTER_SANITIZE_STRING);
		
		if($post['submit']){
			if($post['title'] == '' || $post['bdoy'] == '' || $post['link'] == ''){
			Messages::setMsg('Fill in all fields', 'error');
			}
			//Insert data to database;
			$this->query('INSERT INTO shares (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
			$this->bind(':title',$post['title']);
			$this->bind(':body',$post['body']);
			$this->bind(':link',$post['link']);
			$this->bind(':user_id',1);
			$this->execute();
			if($this->lastInsertID()){
				header('Location: '. ROOT_URL. 'shares');
			}

		}
		return;
	}
}