<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Libraries;

class Filter{
    
    static function value($var){
        $value =  strip_tags($var);
        return trim($value);
    }

    static function textarea($var){
        $pattern = "=^\"\s<p>(.*)</p>\s\"$=i";
        if(preg_match($pattern, $var, $matches) == true){
            $var = $matches[1];
        }
        return $var;
    }
}