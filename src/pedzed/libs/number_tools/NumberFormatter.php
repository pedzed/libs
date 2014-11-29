<?php

namespace pedzed\libs\number_tools {
    
    /**
     * Allows you to format numbers in a certain way.
     */
    class NumberFormatter {
        
        /**
         * The locale.
         * 
         * @var string
         */
        protected $_locale = '';
        
        /**
         * Sets the locale.
         * 
         * @param mixed $nums The numbers.
         */
        public function __construct($locale = 'en_US'){
            $this->_locale = $locale;
        }
        
        /**
         * Gets the ordinal number from a cardinal number.
         * 
         * @param  int    $nums The cardinal number to get the ordinal from.
         * @return string
         */
        public function getOrdinal($num){
            $num = abs($num);
            $lastChar = substr($num, -1, 1);
            
            switch($lastChar){
                case 1:
                    $suffix = ($num == 11) ? 'th' : 'st';
                break;
                
                case 2:
                    $suffix = ($num == 12) ? 'th' : 'nd';
                break;
                
                case 3:
                    $suffix = ($num == 13) ? 'th' : 'rd';
                break;
                
                default:
                    $suffix = 'th';
                break;
            }
            
            return $num.$suffix;
        }
        
        /**
         * Gets a list of ordinal numbers.
         * 
         * @param  array  $nums The cardial numbers.
         * @return string       The ordinal numbers.
         */
        public function getOrdinals(array $nums){
            $results = [];
            
            foreach($nums as $num){
                $results[] = $this->getOrdinal($num);
            }
            
            return $results;
        }
        
    }
    
}
