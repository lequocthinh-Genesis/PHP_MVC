<!-- Trả về Database của trang login -->


<?php
    class login_model extends db{

        public function dtb(){
            return $this->conn;
        }
    
    }


?>
