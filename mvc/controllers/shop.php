<!-- Shop -->

<?php


    class shop extends controller{

        function default(){

            $model = $this->model("shop_model");

            $view = $this->view("view", [
                "dtb"=>$model->dtb(),
                "product"=>$model->getSP(),
                "view"=> "shop_view"
            ]);


        }
    }
?>