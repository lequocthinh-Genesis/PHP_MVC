<?php
    class app {

        protected $controller="home";

        protected $action="default";

        protected $params=[];
        
        function __construct(){
            
            $arr = $this->urlProcess();

            if(empty($arr)){

                $arr[0] = 'home';

            }
     
            // Controller
            // Nếu có tồn tại file $arr[0].php thì cho controller = $arr[0] và xóa nó khỏi chuỗi
            if( file_exists("./mvc/controllers/".$arr[0].".php") ){
                // Đang ở home nhưng thùa hưởng của Controller => this cũng là Controller
                $this->controller = $arr[0];
                unset($arr[0]);
            }
            else {
                $this->controller = "notpage";
            }
            // Nếu không thì mặt định trả về Home
            require_once "./mvc/controllers/". $this->controller .".php";
            // tạo new tên của controller để nó chạy hàm
            $this->controller = new $this->controller;
    
            // Action
            if(isset($arr[1])){
                // do hàm phía trên đã require về controller rồi nên ta chỉ việc kiểm tra action có tồn tại hay không
                // Hàm method_exists("Home","abc") kiểm tra trong lớp HOME CÓ HÀM abc Không  

                if( method_exists( $this->controller , $arr[1]) ){
                    $this->action = $arr[1];
                }
                // nếu thỏa điều kiện thì gán action còn không thì hủy nó
                unset($arr[1]);
            }
    
            // Params
            // Nếu mảng arr có tồn tại thì gán param = arr tại vì phía trên ta đã xóa arr[0] và arr[1]
            $this->params = $arr?array_values($arr):[];
    

            // Tham số thứ nhất là tên lớp + hàm sẽ chạy , tham số thứ hai là tham số truyền vào cho hàm chạy
            call_user_func_array([$this->controller, $this->action], $this->params );
    
        }

        function urlProcess(){
            if( isset($_GET["url"]) ){

                // loại bỏ ký tự trống và cắt dấu /
                return explode("/", filter_var(trim($_GET["url"], "/")));
            }
        }
    }


?>