<!-- Product -->

<?php

    class product extends controller{

        function default(){

            $model = $this->adminModel("admin_product_model");

            $view = $this->adminView("admin_view", [
                "dtb"=>$model->dtb(),
                "view"=> "admin_product_view"
            ]);


        }

    }
?>