<!-- Trả về Database của trang order -->


<?php
    class order_model extends db{

        public function dtb(){
            return $this->conn;
        }

    
    }


?>
