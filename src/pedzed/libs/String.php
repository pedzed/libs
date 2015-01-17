<?php

namespace pedzed\libs {
    
    use Exception;
    
    class StringException extends Exception {}
    
    class String {
        
        /**
         * The string to work with.
         * 
         * @var string
         */
        protected $_str = '';
        
        /**
         * Sets the string.
         * 
         * @param string $str
         */
        public function __construct($str){
            $this->_str = $str;
        }
        
        /**
         * Checks if a method is available and calls it.
         * 
         * @param  string $methodCall The called method.
         * @param  array  $args       The arguments.
         * 
         * @return pedzed\libs\String   Current object for method chaining.
         */
        public function __call($methodCall, $args){
            $method = '_'.$methodCall;
            
            if(method_exists($this, $method)){
                return call_user_func_array([$this, $method], $args);
            } else {
                throw new StringException('Method '.$methodCall.' does not exist.');
            }
        }
        
        /**
         * Checks if a method is available and calls it as an object.
         * 
         * @param  string $methodCall The called method.
         * @param  array $args        The arguments.
         * 
         * @return pedzed\libs\String   Current object for method chaining.
         */
        public static function __callStatic($methodCall, $args){
            $method = '_'.$methodCall;
            
            if(isset($args[0])){
                $class = new static($args[0]);
                
                if(method_exists($class, $method)){
                    unset($args[0]);
                    return call_user_func_array([$class, $method], $args);
                } else {
                    throw new StringException('Method '.$methodCall.' does not exist.');
                }
            } else {
                throw new StringException('At least one argument must be supplied to the first call.');
            }
        }
        
        /**
         * Returns the string.
         * 
         * @return string
         */
        public function __toString(){
            return $this->_str;
        }
        
        /**
         * Lowercases the string.
         * 
         * @return pedzed\libs\String Current object for method chaining.
         */
        protected function _lowercase($strict = false){
            $this->_str = strtolower($this->_str);
            
            return $this;
        }
        
        /**
         * Uppercases the string.
         * 
         * @return pedzed\libs\String Current object for method chaining.
         */
        protected function _uppercase($strict = false){
            $this->_str = strtoupper($this->_str);
            
            return $this;
        }
        
        /**
         * Uppercases the first character.
         * 
         * @param  bool $strict     Whether to lowercase the rest or not.
         * @return pedzed\libs\String Current object for method chaining.
         */
        protected function _uppercaseFirst($strict = false){
            if($strict){
                $this->_lowercase();
            }
            
            $this->_str = ucfirst($this->_str);
            
            return $this;
        }
        
        /**
         * Uppercases every word's first character.
         * 
         * @param  bool $strict     Whether to lowercase the rest or not.
         * @return pedzed\libs\String Current object for method chaining.
         */
        protected function _uppercaseWords($strict = false){
            if($strict){
                $this->_lowercase();
            }
            
            $this->_str = ucwords($this->_str);
            
            return $this;
        }
        
        /**
         * Limits the characters in the string.
         * 
         * @param  int    $limit  The character limit.
         * @param  string $ending The end replacement.
         * 
         * @return pedzed\libs\String Current object for method chaining.
         */
        protected function _limitChars($limit = 200, $ending = '&hellip;'){
            if(strlen($this->_str) > $limit){
                $this->_str = substr_replace($this->_str, $ending, $limit);
            }
            
            return $this;
        }
        
    }
    
}
