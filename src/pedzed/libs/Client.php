<?php

namespace pedzed\libs {
    
    /*
    |--------------------------------------------------------------------------
    | Client
    |--------------------------------------------------------------------------
    | 
    | Allows you to retrieve client information.
    | 
    */
    class Client {
        
        /**
         * Gets the client's IP address.
         * 
         * @return string
         */
        public static function getIP(){
            return $_SERVER['REMOTE_ADDR'];
        }
        
    }
    
}
