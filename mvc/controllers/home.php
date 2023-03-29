<!-- Home -->

<?php

    class home extends controller{
        function default(){

            $model = $this->model("home_model");

            $view = $this->view("view", [
                "dtb"=>$model->dtb(),
                "product"=> $model->getSP(),
                "view"=> "home_view"
            ]);

        }
    }
?>