<!-- Admin users -->

<?php

    class users extends controller{

        function default(){

            $model = $this->adminModel("admin_users_model");

            $view = $this->adminView("admin_view", [
                "dtb"=>$model->dtb(),
                "view"=> "admin_users_view"
            ]);


        }

    }
?>