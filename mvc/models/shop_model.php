<!-- Trả về Database của trang shop -->


<?php
    class shop_model extends db{

        public function dtb(){
            return $this->conn;
        }

        public function getSP(){
            $select_products = mysqli_query($this->conn, "SELECT * FROM `products`") or die('query failed');;
            return $select_products;
        }
    
    }


?>
