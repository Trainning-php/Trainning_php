<?php 
class controller
{
    // public function model($model) {
    //     require_once "./model/".$model.".php";
    //     require_once "./model/biz/".$model.".php";
    //     return new $model;
    // }

    public function models($files,$model){
        require_once "./model/".$files."/".$model.".php";
        return new $model;
    }

    // public function views( $views , $data = []) {
    //     require_once "./views/".$views.".php";
        //require_once './views/pages/template/'.$views.'.php';
    // }

    public function view($page,$views,$data = []){

    	require_once './views/'.$page.'/'.$views.'.php';
    }
}
?>