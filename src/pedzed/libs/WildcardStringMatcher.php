<?php

namespace pedzed\libs {
    
    /*
    |--------------------------------------------------------------------------
    | String matcher
    |--------------------------------------------------------------------------
    | 
    | Checks if two strings match each other.
    | 
    */
    class WildcardStringMatcher {
        
        /**
         * Checks if two strings match each other.
         * 
         * @param  string $str1 The string to match.
         * @param  string $str2 The string to match.
         * 
         * @return bool
         */
        public static function match($str1, $str2, $caseSensitive = false){
            if(self::_hasWildcard($str1) || self::_hasWildcard($str2)){
                if(self::_hasWildcard($str1)){
                    $wildcardStr = $str1;
                    $normalStr = $str2;
                } else if(self::_hasWildcard($str2)){
                    $wildcardStr = $str2;
                    $normalStr = $str1;
                }
                
                $pattern = preg_quote($wildcardStr, '#');
                $pattern = str_replace('\*', '.*?', $pattern);
                $pattern = '#^'.$pattern.'$#';
                
                return (preg_match($pattern, $normalStr) == true);
            } else if(!$caseSensitive){
                return strtolower($str1) === strtolower($str2);
            } else {
                return $str1 === $str2;
            }
        }
        
        /**
         * Tells whether the string has the wildcard character or not.
         * 
         * @param  string $str The string to check.
         * @return bool
         */
        protected static function _hasWildcard($str){
            return (strpos($str, '*') !== false);
        }
        
    }
    
}
