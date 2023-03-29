<!-- Checkout -->

<?php


    class checkout extends controller{

        function default(){

            $model = $this->model("checkout_model");

            $view = $this->view("view", [
                "dtb"=>$model->dtb(),
                "view"=> "checkout_view"
            ]);


        }
    }
?>