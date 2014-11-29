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
         * The locales.
         * 
         * @var array
         */
        protected $_locales = [
            
            'en_US' => [
                'ordinals' => [
                    '1' => 'st',
                    '2' => 'nd',
                    '3' => 'rd',
                    'default' => 'th'
                ]
            ],
            
            'nl_NL' => [
                'ordinals' => [
                    'default' => 'e'
                ]
            ],
            
            'de_DE' => [
                'ordinals' => [
                    'default' => '.'
                ]
            ]
            
        ];
        
        /**
         * The default locale to use.
         */
        const DEFAULT_LOCALE = 'en_US';
        
        /**
         * Sets the locale.
         * 
         * @param mixed $locale Optional locale.
         */
        public function __construct($locale = null){
            if(isset($locale) && isset($this->_locales['locale'])){
                $this->_locale = $locale;
            } else {
                $this->_locale = self::DEFAULT_LOCALE;
            }
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
            
            if(isset($this->_locales[$this->_locale]['ordinals'])){
                $ordinals = $this->_locales[$this->_locale]['ordinals'];
            }
            
            foreach($ordinals as $k => $ordinal){
                if($num == $k){
                    $suffix = $ordinal;
                    break;
                } else if($lastChar == $k){
                    $suffix = $ordinal;
                    break;
                }
            }
            
            return (isset($suffix)) ? $num.$suffix : $num.$ordinals['default'];
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
