<!-- Search -->

<?php


    class search extends controller{

        function default(){

            $model = $this->model("search_model");

            $view = $this->view("view", [
                "dtb"=> $model->dtb(),
                "view"=> "search_view"
            ]);


        }
    }
?>