<!-- Trả về Database của trang admin orders -->


<?php
    class admin_orders_model extends db{

        public function dtb(){
            return $this->conn;
        }

    
    }


?>
