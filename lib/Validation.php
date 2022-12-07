<?php 
    include_once 'lib/Session.php';
    Session::start_session();

    //Session::set_value("textOk", true);
    //Session::set_value("numberOk", true);
    //Session::set_value("emailOk", true);
    //Session::set_value("selectOk", true);

    class Validation {
        public static $textOk = true;
        public static $numberOk = true;
        public static $passOk = true;
        public static $emailOk = true;
        public static $selectOk = true;
        public static $emailNext = true;
        public static $textNext = true;
        public static $numberNext = true;
        public $empty_err_msg = "";

        public static function data_validation($data, $name, $type){
            if ($type == "text") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This field should not be empty";
                    Session::set_value($name, $empty_err_msg);
                    //Session::set_value("textOk", false);
                    Self::$textOk = false;
                }
            }
            
            if ($type == "pass") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This field should not be empty";
                    Session::set_value($name, $empty_err_msg);
                    //Session::set_value("passOk", true);
                    Self::$passOk = false;
                }
            }

            if ($type == "number") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This field should not be empty";
                    Session::set_value($name, $empty_err_msg);
                    //Session::set_value("numberOk", true);
                    Self::$numberOk = false;
                }
            }

            if ($type == "select") {
                if ($data == "none") {
                    $empty_err_msg = "<b>Error!</b> This field should not be empty";
                    Session::set_value($name, $empty_err_msg);
                    //Session::set_value("selectOk", true);
                    Self::$selectOk = false;
                }
            }

            self::filter_data($data);
            self::other_validation($data, $name, $type);
            return $data;
        }

        public static function filter_data($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public static function other_validation($data, $name, $type){
            if ($type == "text") {
                if (!preg_match("/^[a-zA-Z-' ]*$/",$data)) {
                    $empty_err_msg = "<b>Error!</b> Only letters and white space allowed";
                    Session::set_value($name, $empty_err_msg);
                    //Session::set_value("textOk", true);
                    Self::$textOk = false;
                }
            }

            if ($type == "number") {
                if (!preg_match("/^[0-9]*$/",$data)) {
                    $empty_err_msg = "<b>Error!</b> Only number allowed";
                    Session::set_value($name, $empty_err_msg);
                    //Session::set_value("numberOk", true);
                    Self::$numberOk = false;
                }
            }

            return $data;
        }

        public static function email_validation($data, $name){

            if (empty($data)) {
                $empty_err_msg = "<b>Error!</b> This field should not be empty";
                Session::set_value($name, $empty_err_msg);
                //Session::set_value("emailOk", true);
                self::$emailNext = false;
                Self::$emailOk = false;
            }
        
            if (self::$emailNext == true) {
                $data = filter_var($data, FILTER_SANITIZE_EMAIL);
                $data = filter_var($data, FILTER_VALIDATE_EMAIL);

                if (!$data) {
                    $empty_err_msg = "<b>Error!</b> email is not valid";
                    Session::set_value($name, $empty_err_msg);
                    //Session::set_value("emailOk", true);
                    Self::$emailOk = false;
                }
            }
            
            return $data;
        }
    }
?>