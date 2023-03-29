<!-- login -->

<?php


    class login extends controller{

        function default(){

            $model = $this->model("login_model");

            $view = $this->view("view", [
                "dtb"=>$model->dtb(),
                "view"=> "login_view"
            ]);


        }
    }
?>