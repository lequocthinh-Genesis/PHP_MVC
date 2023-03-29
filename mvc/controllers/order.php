<!-- Order -->

<?php


    class order extends controller{

        function default(){

            $model = $this->model("order_model");

            $view = $this->view("view", [
                "dtb"=>$model->dtb(),
                "view"=> "order_view"
            ]);


        }
    }
?>