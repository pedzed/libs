<?php

namespace pedzed\libs {
    
    use Exception;
    
    class TextException extends Exception {}
    
    class Text {
        
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
         * @return pedzed\libs\Text   Current object for method chaining.
         */
        public function __call($methodCall, $args){
            $method = '_'.$methodCall;
            
            if(method_exists($this, $method)){
                return call_user_func_array([$this, $method], $args);
            } else {
                throw new TextException('Method '.$methodCall.' does not exist.');
            }
        }
        
        /**
         * Checks if a method is available and calls it as an object.
         * 
         * @param  string $methodCall The called method.
         * @param  array $args        The arguments.
         * 
         * @return pedzed\libs\Text   Current object for method chaining.
         */
        public static function __callStatic($methodCall, $args){
            $method = '_'.$methodCall;
            
            if(isset($args[0])){
                $class = new static($args[0]);
                
                if(method_exists($class, $method)){
                    unset($args[0]);
                    return call_user_func_array([$class, $method], $args);
                } else {
                    throw new TextException('Method '.$methodCall.' does not exist.');
                }
            } else {
                throw new TextException('At least one argument must be supplied to the first call.');
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
         * Uppercases every word's first character.
         * 
         * @return pedzed\libs\Text Current object for method chaining.
         */
        protected function _uppercaseWords(){
            $this->_str = ucwords($this->_str);
            
            return $this;
        }
        
        /**
         * Limits the characters in the string.
         * 
         * @param  int    $limit  The character limit.
         * @param  string $ending The end replacement.
         * 
         * @return pedzed\libs\Text Current object for method chaining.
         */
        protected function _limitChars($limit = 200, $ending = '&hellip;'){
            if(strlen($this->_str) > $limit){
                $this->_str = substr_replace($this->_str, $ending, $limit);
            }
            
            return $this;
        }
        
    }
    
}
