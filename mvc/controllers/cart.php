<!-- Cart -->

<?php

    class cart extends controller{

        function default(){

            $model = $this->model("cart_model");


            $view = $this->view("view", [
                "dtb"=>$model->dtb(),
                "view"=> "cart_view"
            ]);

        }
    }
?>
