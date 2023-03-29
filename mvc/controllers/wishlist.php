<!-- Wishlist -->

<?php

    class wishlist extends controller{

        function default(){

            $model = $this->model("wishlist_model");

            $view = $this->view("view", [
                "dtb"=>$model->dtb(),
                "view"=> "wishlist_view"
            ]);


        }
    }
?>