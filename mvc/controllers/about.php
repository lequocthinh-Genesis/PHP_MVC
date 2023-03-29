<!-- About -->

<?php

    class about extends controller{

        function default(){

            $model = $this->model("about_model");

            $view = $this->view("view", [
                "dtb"=>$model->dtb(),
                "view"=> "about_view"
            ]);


        }
    }
?>


