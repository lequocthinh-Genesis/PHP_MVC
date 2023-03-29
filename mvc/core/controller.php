<?php
    class controller{

        public function model($model){
            require_once "./mvc/models/".$model.".php";
            // $a = new home_model;
            // return a;
            return new $model;
        }

        public function view($view, $data=[]){
            require_once "./mvc/views/".$view.".php";
        }

        public function adminModel($model){
            require_once "./mvc/models/admin/".$model.".php";
            return new $model;
        }

        public function adminView($view, $data=[]){
            require_once "./mvc/views/admin/".$view.".php";
        }

    }
?>