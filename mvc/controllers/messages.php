<!-- Admin message -->

<?php


    class messages extends controller{

        function default(){

            $model = $this->adminModel("admin_messages_model");

            $view = $this->adminView("admin_view", [
                "dtb"=>$model->dtb(),
                "view"=> "admin_messages_view"
            ]);


        }

    }
?>