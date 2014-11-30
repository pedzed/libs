<?php

namespace pedzed\libs {
    
    /**
     * Information about the client.
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
