<!-- Admin update -->

<?php

    class update extends controller{

        function default(){

            $model = $this->adminModel("admin_update_model");

            $view = $this->adminView("admin_view", [
                "dtb"=>$model->dtb(),
                "view"=> "admin_update_view"
            ]);


        }
    }
?>