<!-- Admin -->

<?php

    class admin extends controller{

        function default(){

            $model = $this->adminModel("admin_model");

            $view = $this->adminView("admin_view", [
                "dtb"=>$model->dtb(),
                "view"=> "admin_home_view",
                "pending"=>$model->getPending(),
                "totalCompletes"=>$model->getTotalCompletes(),
                "orders"=>$model->getOders(),
                "product"=>$model->getProduct(),
                "user"=>$model->getUser(),
                "admin"=>$model->getAdmin(),
                "account"=>$model->getAccount(),
                "message"=>$model->getMessages()
            ]);


        }

    }
?>