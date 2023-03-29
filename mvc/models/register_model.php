<!-- Trả về Database của trang register -->


<?php
    class register_model extends db{

        public function dtb(){
            return $this->conn;
        }

    
    }


?>
