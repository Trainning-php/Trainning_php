<?php 


class app 
{
	protected $controller="Home";
    protected $action="Show";
    protected $params=[];
	function __construct()
	{
		
	
	$arr = $this->UrlProcess();
	
	if (file_exists("./mvc/controllers/".$arr[0].".php")) {
		// nếu có tồn tại thằng controller nào thì require  vào 
		$this->controller=$arr[0];
		unset($arr[0]);
		}
		require_once "./mvc/controllers/".$this->controller.".php";
		$this->controller = new $this->controller;	
		
	// xu li Action
	if (isset($arr[1])) {
		//method_eists kiem tra function co ton tai hay khong
		if (method_exists($this->controller, $arr[1])) {
			$this->action=$arr[1];
			}
			unset($arr[1]);	
		}
	//xu li Params
		$this->params=$arr?array_values($arr):[];
		call_user_func_array([$this->controller,$this->action], $this->params);
	}

	
	function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
            // trim ::loại bỏ khảng trắng || filter_var::check theo dấu "/" 
            // explode lọa bỏ dấu "/"
        }
    }
  
}
 ?>