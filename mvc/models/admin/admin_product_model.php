<!-- Trả về Database của trang admin product -->

<?php
    class admin_product_model extends db{

        public function dtb(){
            return $this->conn;
        }

    
    }

?>
