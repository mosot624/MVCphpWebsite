<?php
class Bootstrap{
	private $controller;
	private $action;
	private $request;
	
	public function __construct($request){
		$this->request = $request;
		if($this->request['controller']==""){
			$this->controller = 'home';
		} else {
			$this->controller= $this->request['controller'];
		}
		if($this->request['action'] == ""){
			$this->action = 'index';
		} else {
			$this->action= $this->request['action'];
		}
	}
	
	public function createController(){
		//checkclass
		if (class_exists($this->controller)){
			$parents = class_parents($this->controller);
			
			//check if it is extended 
			if(in_array("Controller",$parents)){
				if(method_exists($this->controller, $this->action)){
					return new $this->controller($this->action, $this->request);
				} else {
					//method doesnt exist
					echo '<h1>Method does not exist</h1>';
					return;
				}
			} else {
				//Base controller not found
				echo '<h1>Base controller can not be found</h1>';
				return;
			}
		} else {
			//controller doesnt exist
			echo '<h1>Conroller class does not exist</h1>';
			return;
		}
	}
	
}