<!-- Trả về Database của trang home -->


<?php
    class home_model extends db{

        public function dtb(){
            return $this->conn;
        }
        
        public function getSP(){
            $select_products = mysqli_query($this->conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
            return $select_products;
        }
    
    }


?>
