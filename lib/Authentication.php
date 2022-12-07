<?php
    include_once 'lib/Session.php';
    Session::start_session();
    include 'lib/Database.php';

    class Authentication{

        public $time;

        public function __construct(){
            $this->db = new Database();
            $this->time = date('d-m-y h:i:s');
        }

        public function select_product(){
            $sql = "SELECT * FROM product_store";
            $result = $this->db->select($sql);
            return $result;
        }

        public function sing_up($u_name, $u_email, $u_pass){
            $sql = "INSERT INTO `tbl_sign_up`(`u_name`, `u_email`, `u_pass`, `u_sign_up_time`, `u_last_login_time`, `u_last_logout_time`, `u_active_status`) VALUES ('$u_name','$u_email','$u_pass','$this->time','$this->time','$this->time','active')";
            
            $result = $this->db->insert($sql);

            if ($result) {
                header("Location: index.php");
            }
        }
    }
