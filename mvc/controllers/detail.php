<!-- detail -->

<?php

    class detail extends controller{

        function default(){

            $model = $this->model("detail_model");

            $view = $this->view("view", [
                "dtb"=>$model->dtb(),
                "view"=> "detail_view"
            ]);


        }
    }
?>