<!-- Trả về Database của trang about -->


<?php
    class about_model extends db{

        public function dtb(){

            return $this->conn;

        }
    
    }


?>
