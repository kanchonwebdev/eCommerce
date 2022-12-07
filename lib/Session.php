<?php
    Class Session{
        public static function start_session(){
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        }

        public static function set_value($key, $val){
            $_SESSION[$key] = $val;
        }

        public static function show_value($key){
            return $_SESSION[$key];
        }

        public static function remove_value($key){
            $_SESSION[$key] = null;
        }

        public static function end_session(){
            if (session_status() == PHP_SESSION_ACTIVE) {
                session_destroy();
            }
        }
    }
?>