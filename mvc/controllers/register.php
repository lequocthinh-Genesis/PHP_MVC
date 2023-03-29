<!-- register -->

<?php


    class register extends controller{

        function default(){

            $model = $this->model("register_model");

            $view = $this->view("view", [
                "dtb"=>$model->dtb(),
                "view"=> "register_view"
            ]);


        }
    }
?>