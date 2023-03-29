<!-- Admin orders -->

<?php

    class orders extends controller{

        function default(){

            $model = $this->adminModel("admin_orders_model");

            $view = $this->adminView("admin_view", [
                "dtb"=>$model->dtb(),
                "view"=> "admin_orders_view"
            ]);


        }

    }
?>