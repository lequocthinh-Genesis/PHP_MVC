<!-- contact -->

<?php

    class contact extends controller{

        function default(){

            $model = $this->model("contact_model");

            $view = $this->view("view", [
                "dtb"=>$model->dtb(),
                "view"=> "contact_view"
            ]);


        }
    }
?>