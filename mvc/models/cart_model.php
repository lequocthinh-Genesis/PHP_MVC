<!-- Trả về Database của trang Cart -->


<?php
    class cart_model extends db{

        public function dtb(){
            return $this->conn;
        }

    
    }


?>
